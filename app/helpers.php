<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Funnel step naming (GA4)
|--------------------------------------------------------------------------
*/

if (! function_exists('funnel_step_name')) {
    function funnel_step_name(string $base, ?string $ext = null): string
    {
        return $ext === 'no' ? "{$base}_ext_no" : $base;
    }
}

if (! function_exists('funnel_ext_from_request')) {
    /**
     * Resolve the "no opt-in" funnel variant.
     *
     * Meta campaign visitors (vtid=meta_clp_us_launch) must always walk the
     * opt-in funnel, so the ext=no shortcut is ignored for them. All other
     * traffic keeps the existing behaviour untouched.
     */
    function funnel_ext_from_request(?Request $request = null): ?string
    {
        $request ??= request();

        if (cosmic_is_meta_campaign($request)) {
            return null;
        }

        $ext = $request->query('ext') ?? $request->input('ext') ?? $request->session()->get('cosmic.reading.ext');

        return $ext === 'no' ? 'no' : null;
    }
}

if (! function_exists('remember_funnel_ext')) {
    function remember_funnel_ext(Request $request, ?string $ext): void
    {
        // Never pin a Meta campaign visitor to the no-opt-in path.
        if (cosmic_is_meta_campaign($request)) {
            return;
        }

        if ($ext === 'no') {
            $request->session()->put('cosmic.reading.ext', 'no');
        }
    }
}

/*
|--------------------------------------------------------------------------
| Ad campaign tracking (Meta)
|--------------------------------------------------------------------------
|
| Click parameters are captured once, on the first request of a visit that
| carries any of them, and stored in that visitor's own Laravel session.
| They are never merged with birth details, zodiac sign, quiz answers, the
| generated reading, or any contact detail.
|
*/

if (! defined('COSMIC_TRACKING_SESSION_KEY')) {
    define('COSMIC_TRACKING_SESSION_KEY', 'cosmic.tracking');
}

if (! defined('COSMIC_META_VTID')) {
    define('COSMIC_META_VTID', 'meta_clp_us_launch');
}

if (! defined('COSMIC_TRACKING_TTL')) {
    // Hard cap of 7 days, matching Meta's default click attribution window.
    // In practice the Laravel session (SESSION_LIFETIME, 120 idle minutes)
    // expires long before this; the cap only guards unusually long sessions.
    define('COSMIC_TRACKING_TTL', 7 * 24 * 60 * 60);
}

if (! function_exists('cosmic_tracking_keys')) {
    /** @return list<string> */
    function cosmic_tracking_keys(): array
    {
        return ['fbclid', 'vtid', 'utm_source', 'utm_medium', 'utm_campaign', 'utm_content', 'utm_term'];
    }
}

if (! function_exists('cosmic_clean_tracking_value')) {
    /**
     * Accept only plain, short, single-line strings.
     *
     * Rejects arrays, non-strings, control characters and anything carrying
     * HTML/script punctuation (< > " ' ` & ; \ { } = ? #).
     */
    function cosmic_clean_tracking_value(mixed $value): ?string
    {
        if (! is_string($value)) {
            return null;
        }

        if (strlen($value) > 512) {
            return null;
        }

        $value = trim($value);

        if ($value === '' || preg_match('/[\x00-\x1F\x7F]/', $value)) {
            return null;
        }

        if (! preg_match('/^[A-Za-z0-9 ._\-+%:~\/|()\[\]]{1,255}$/', $value)) {
            return null;
        }

        return $value;
    }
}

if (! function_exists('cosmic_capture_tracking')) {
    /**
     * Store the campaign parameters of the very first request that carries any
     * of them. Later requests never overwrite what is already stored.
     */
    function cosmic_capture_tracking(Request $request): void
    {
        if (! $request->hasSession()) {
            return;
        }

        // First values win - nothing is replaced on later pages.
        if (cosmic_tracking($request) !== []) {
            return;
        }

        $captured = [];

        foreach (cosmic_tracking_keys() as $key) {
            $clean = cosmic_clean_tracking_value($request->query($key));

            if ($clean !== null) {
                $captured[$key] = $clean;
            }
        }

        if ($captured === []) {
            return;
        }

        $request->session()->put(COSMIC_TRACKING_SESSION_KEY, [
            'params' => $captured,
            'captured_at' => time(),
        ]);
    }
}

if (! function_exists('cosmic_tracking')) {
    /**
     * The campaign parameters held for this visitor, or [] when absent/expired.
     *
     * @return array<string, string>
     */
    function cosmic_tracking(?Request $request = null): array
    {
        $request ??= request();

        if (! $request->hasSession()) {
            return [];
        }

        $stored = $request->session()->get(COSMIC_TRACKING_SESSION_KEY);

        if (! is_array($stored) || ! is_array($stored['params'] ?? null)) {
            return [];
        }

        $capturedAt = (int) ($stored['captured_at'] ?? 0);

        if ($capturedAt <= 0 || (time() - $capturedAt) > COSMIC_TRACKING_TTL) {
            $request->session()->forget(COSMIC_TRACKING_SESSION_KEY);

            return [];
        }

        return array_filter(
            $stored['params'],
            static fn ($value, $key) => is_string($value) && in_array($key, cosmic_tracking_keys(), true),
            ARRAY_FILTER_USE_BOTH
        );
    }
}

if (! function_exists('cosmic_is_meta_campaign')) {
    /**
     * True only when this visitor arrived carrying vtid=meta_clp_us_launch.
     * Direct traffic and unrelated affiliate traffic never match.
     */
    function cosmic_is_meta_campaign(?Request $request = null): bool
    {
        return (cosmic_tracking($request)['vtid'] ?? null) === COSMIC_META_VTID;
    }
}

if (! function_exists('cosmic_clickbank_url')) {
    /**
     * Return the existing ClickBank checkout URL, adding the Meta campaign
     * VTID and the original fbclid for Meta campaign visitors only.
     *
     * Product (cbitems), template, cbfid, cbur and every other existing
     * parameter are preserved untouched. Non-Meta traffic gets the URL back
     * byte-for-byte unchanged.
     */
    function cosmic_clickbank_url(?string $url, ?Request $request = null): string
    {
        $url = (string) $url;

        if ($url === '' || $url === '#' || ! cosmic_is_meta_campaign($request)) {
            return $url;
        }

        $parts = parse_url($url);

        if ($parts === false || empty($parts['scheme']) || empty($parts['host'])) {
            return $url;
        }

        parse_str($parts['query'] ?? '', $query);

        $tracking = cosmic_tracking($request);

        // ClickBank accepts a single vtid, so the Meta campaign code replaces
        // the static one for this traffic instead of being appended twice.
        $query['vtid'] = COSMIC_META_VTID;

        if (($tracking['fbclid'] ?? '') !== '') {
            $query['fbclid'] = $tracking['fbclid'];
        }

        $rebuilt = $parts['scheme'].'://'.$parts['host']
            .(isset($parts['port']) ? ':'.$parts['port'] : '')
            .($parts['path'] ?? '/');

        if ($query !== []) {
            $rebuilt .= '?'.http_build_query($query, '', '&', PHP_QUERY_RFC3986);
        }

        if (! empty($parts['fragment'])) {
            $rebuilt .= '#'.$parts['fragment'];
        }

        return $rebuilt;
    }
}
