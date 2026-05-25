<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CosmicFlowController extends Controller {

    public function landing(): View
    {
        return view('landing');
    }

    public function birthdate(string $sign)
    {
        return view('birthdate', [
            'signSlug' => $sign,
            'sign' => $this->findSignOrFail($sign),
        ]);
    }

    public function storeBirthDetails(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'sign' => ['required', 'string'],
            'month' => ['required', 'integer', 'between:1,12'],
            'day' => ['required', 'integer', 'between:1,31'],
            'year' => ['required', 'integer', 'between:1900,2008'],
            'hour' => ['nullable', 'integer', 'between:1,12'],
            'minute' => ['nullable', 'numeric', 'between:0,59'],
            'meridiem' => ['nullable', 'in:AM,PM'],
            'birth_place' => ['nullable', 'string', 'max:255'],
            'time_unknown' => ['nullable', 'boolean'],
            'place_unknown' => ['nullable', 'boolean'],
        ]);

        $sign = $this->findSignOrFail($validated['sign']);
        $month = (int) $validated['month'];
        $day = (int) $validated['day'];
        $year = (int) $validated['year'];

        if (!in_array($day, $sign['months'][$month] ?? [], true)) {
            return redirect()->route('landing');
        }

        $timeUnknown = (bool) ($validated['time_unknown'] ?? false);
        $placeUnknown = (bool) ($validated['place_unknown'] ?? false);

        $hour = $timeUnknown ? 12 : (int) ($validated['hour'] ?? 12);
        $minute = $timeUnknown ? 0 : (int) ($validated['minute'] ?? 0);
        $meridiem = $timeUnknown ? 'AM' : (string) ($validated['meridiem'] ?? 'AM');
        $birthPlace = trim((string) ($validated['birth_place'] ?? ''));

        if (! $placeUnknown && $birthPlace === '') {
            return back()
                ->withErrors(['birth_place' => 'Please enter your place of birth.'])
                ->withInput();
        }

        $birth = [
            'sign' => $sign,
            'sign_slug' => $validated['sign'],
            'month' => $month,
            'day' => $day,
            'year' => $year,
            'formatted_date' => sprintf('%02d / %02d / %04d', $month, $day, $year),
            'hour' => $hour,
            'minute' => $minute,
            'meridiem' => $meridiem,
            'time_unknown' => $timeUnknown,
            'birth_place' => $birthPlace,
            'place_unknown' => $placeUnknown,
        ];

        // Store in session
        $request->session()->put('cosmic.reading.birth', $birth);

        return redirect()->route('reading.contact', $sign['slug']);
    }

    public function contact(Request $request): View|RedirectResponse
    {
        // Try to get birth data from form submission first, then fall back to session
        $birth = null;

        if ($request->has('birth_sign_slug')) {
            // Reconstruct birth data from hidden fields
            $birth = [
                'sign_slug' => $request->input('birth_sign_slug'),
                'sign' => $this->findSignOrFail($request->input('birth_sign_slug')),
                'month' => (int) $request->input('birth_month'),
                'day' => (int) $request->input('birth_day'),
                'year' => (int) $request->input('birth_year'),
                'formatted_date' => $request->input('birth_formatted_date'),
                'hour' => (int) $request->input('birth_hour'),
                'minute' => (int) $request->input('birth_minute'),
                'meridiem' => $request->input('birth_meridiem'),
                'time_unknown' => (bool) $request->input('birth_time_unknown', false),
                'birth_place' => $request->input('birth_place'),
                'place_unknown' => (bool) $request->input('birth_place_unknown', false),
            ];
        } else {
            // Fall back to session
            $birth = $request->session()->get('cosmic.reading.birth');
        }

        // abort_unless(is_array($birth), 404);
        if (!is_array($birth)) {
            return redirect()->route('landing');
        }

        return view('contact-details', ['birth' => $birth]);
    }

    public function storeContact(Request $request): RedirectResponse
    {
        // Get birth data from form submission
        $birth = null;

        if ($request->has('birth_sign_slug')) {
            $birth = [
                'sign_slug' => $request->input('birth_sign_slug'),
                'sign' => $this->findSignOrFail($request->input('birth_sign_slug')),
                'month' => (int) $request->input('birth_month'),
                'day' => (int) $request->input('birth_day'),
                'year' => (int) $request->input('birth_year'),
                'formatted_date' => $request->input('birth_formatted_date'),
                'hour' => (int) $request->input('birth_hour'),
                'minute' => (int) $request->input('birth_minute'),
                'meridiem' => $request->input('birth_meridiem'),
                'time_unknown' => (bool) $request->input('birth_time_unknown', false),
                'birth_place' => $request->input('birth_place'),
                'place_unknown' => (bool) $request->input('birth_place_unknown', false),
            ];
        } else {
            $birth = $request->session()->get('cosmic.reading.birth');
        }

        // abort_unless(is_array($birth), 404);
        if (!is_array($birth)) {
            return redirect()->route('landing');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:190'],
        ]);

        $contact = [
            'name' => trim($validated['name']),
            'email' => trim($validated['email']),
        ];

        // Store in session
        $request->session()->put('cosmic.reading.contact', $contact);
        $request->session()->put('cosmic.reading.birth', $birth);
        
        return redirect()->route('reading.loading', $birth['sign_slug']);
    }

    public function readingRoading(Request $request): View|RedirectResponse
    {
        // Try to get data from form submission first, then fall back to session
        $birth = null;
        $contact = null;

        if ($request->has('birth_sign_slug')) {
            $birth = [
                'sign_slug' => $request->input('birth_sign_slug'),
                'sign' => $this->findSignOrFail($request->input('birth_sign_slug')),
                'month' => (int) $request->input('birth_month'),
                'day' => (int) $request->input('birth_day'),
                'year' => (int) $request->input('birth_year'),
                'formatted_date' => $request->input('birth_formatted_date'),
                'hour' => (int) $request->input('birth_hour'),
                'minute' => (int) $request->input('birth_minute'),
                'meridiem' => $request->input('birth_meridiem'),
                'time_unknown' => (bool) $request->input('birth_time_unknown', false),
                'birth_place' => $request->input('birth_place'),
                'place_unknown' => (bool) $request->input('birth_place_unknown', false),
            ];

            $contact = [
                'name' => $request->input('contact_name'),
                'email' => $request->input('contact_email'),
            ];
        } else {
            // Fall back to session
            $birth = $request->session()->get('cosmic.reading.birth');
            $contact = $request->session()->get('cosmic.reading.contact');
        }

        // abort_unless(is_array($birth) && is_array($contact), 404);
        if (!is_array($birth) || !is_array($contact)) {
            return redirect()->route('landing');
        }

        return view('reading-loading', [
            'name' => $contact['name'],
            'sign' => $birth['sign'],
            'formattedDate' => $birth['formatted_date'],
            'formattedTime' => $birth['time_unknown']
                ? 'Time not provided'
                : sprintf('%02d:%02d %s', $birth['hour'], $birth['minute'], $birth['meridiem']),
            'birthPlace' => $birth['place_unknown']
                ? 'Place not provided'
                : $birth['birth_place'],
            'videoUrl' => config('services.cosmic.video_url'),
            'birth' => $birth,
            'contact' => $contact,
        ]);
    }

    public function summary(Request $request): View|RedirectResponse
    {
        $birth = null;
        $contact = null;

        if ($request->has('birth_sign_slug')) {
            $birth = [
                'sign_slug' => $request->input('birth_sign_slug'),
                'sign' => $this->findSignOrFail($request->input('birth_sign_slug')),
                'month' => (int) $request->input('birth_month'),
                'day' => (int) $request->input('birth_day'),
                'year' => (int) $request->input('birth_year'),
                'formatted_date' => $request->input('birth_formatted_date'),
                'hour' => (int) $request->input('birth_hour'),
                'minute' => (int) $request->input('birth_minute'),
                'meridiem' => $request->input('birth_meridiem'),
                'time_unknown' => (bool) $request->input('birth_time_unknown', false),
                'birth_place' => $request->input('birth_place'),
                'place_unknown' => (bool) $request->input('birth_place_unknown', false),
            ];

            $contact = [
                'name' => $request->input('contact_name'),
                'email' => $request->input('contact_email'),
            ];
        } else {
            // Fall back to session
            $birth = $request->session()->get('cosmic.reading.birth');
            $contact = $request->session()->get('cosmic.reading.contact');
        }

        // abort_unless(is_array($birth) && is_array($contact), 404);
        if (!is_array($birth) || !is_array($contact)) {
            return redirect()->route('landing');
        }

        return view('reading-result', [
            'name' => $contact['name'],
            'email' => $contact['email'],
            'sign' => $birth['sign'],
            'formattedDate' => $birth['formatted_date'],
            'formattedTime' => $birth['time_unknown']
                ? 'Time not provided'
                : sprintf('%02d:%02d %s', $birth['hour'], $birth['minute'], $birth['meridiem']),
            'birthPlace' => $birth['place_unknown']
                ? 'Place not provided'
                : $birth['birth_place'],
            'birth' => $birth,
            'contact' => $contact,
        ]);
    }

    public function sales(Request $request): View|RedirectResponse
    {
        // Try to get data from form submission first, then fall back to session
        $birth = null;
        $contact = null;
        $sign_info = null;

        if ($request->has('birth_sign_slug')) {
            $birth = [
                'sign_slug' => $request->input('birth_sign_slug'),
                'sign' => $this->findSignOrFail($request->input('birth_sign_slug')),
                'month' => (int) $request->input('birth_month'),
                'day' => (int) $request->input('birth_day'),
                'year' => (int) $request->input('birth_year'),
                'formatted_date' => $request->input('birth_formatted_date'),
                'hour' => (int) $request->input('birth_hour'),
                'minute' => (int) $request->input('birth_minute'),
                'meridiem' => $request->input('birth_meridiem'),
                'time_unknown' => (bool) $request->input('birth_time_unknown', false),
                'birth_place' => $request->input('birth_place'),
                'place_unknown' => (bool) $request->input('birth_place_unknown', false),
            ];

            $contact = [
                'name' => $request->input('contact_name'),
                'email' => $request->input('contact_email'),
            ];
        } else {
            // Fall back to session
            $birth = $request->session()->get('cosmic.reading.birth');
            $contact = $request->session()->get('cosmic.reading.contact');
        }

        // abort_unless(is_array($birth) && is_array($contact), 404);
        if (!is_array($birth) || !is_array($contact)) {
            return redirect()->route('landing');
        }

        $signSlug = $birth['sign_slug'] ?? ($birth['sign']['slug'] ?? null);
        $signInfo = $signSlug ? config("variables.signs.$signSlug") : null;

        abort_unless(is_array($signInfo), 404);

        return view('sales-page', [
            'name' => $contact['name'],
            'email' => $contact['email'],
            'sign' => $birth['sign'],
            'sign_info' => $signInfo,
            'formattedDate' => $birth['formatted_date'],
            'birth' => $birth,
            'contact' => $contact,
        ]);
    }

    public function sales_dummy(Request $request): View|RedirectResponse
    {
        // Try to get data from form submission first, then fall back to session
        return view('sales-page-dummy');
    }

    private function findSignOrFail(string $slug): array
    {
        $signInfo = config("variables.signs.$slug");

        abort_unless(is_array($signInfo), 404);

        return $signInfo + ['slug' => $slug];
    }

    public function privacyPolicy(): View
    {
        return view('privacy-policy');
    }

    public function termsService(): View
    {
        return view('terms-service');
    }

    public function disclaimer(): View
    {
        return view('disclaimer');
    }

    public function contactUs(): View
    {
        return view('contact-us');
    }

    public function aboutUs(): View
    {
        return view('about-us');
    }


    /**
     * Download VIP Aries
     * Route: /download/vip-aries
     */
    public function downloadVIP(Request $request): View {
        $signSlug = $request->route('sign');
        $sign = config("variables.signs.$signSlug");

        abort_unless(is_array($sign), 404);

        return view('download.vip', compact('sign'));
    }

    /**
     * Download Standard Aries
     * Route: /download/standard-aries
     */
    public function downloadStandard(Request $request): View {
        $signSlug = $request->route('sign');
        $sign = config("variables.signs.$signSlug");

        abort_unless(is_array($sign), 404);

        return view('download.standard', compact('sign'));
    }


    /**
     * Download Full Report (All 12 Signs)
     * Route: /download/fullreport
     */
    public function downloadFullReport(): View { return view('download.fullreport'); }

    // Upsell1 page
    public function upsell1(Request $request): View {
        $signSlug = $request->route('sign');
        $sign = config("variables.signs.$signSlug");

        abort_unless(is_array($sign), 404);

        return view('upsell.upsell1', compact('sign'));
    }

    // Upsell2 page
    public function upsell2(Request $request): View {
        $signSlug = $request->route('sign');
        $sign = config("variables.signs.$signSlug");

        abort_unless(is_array($sign), 404);

        return view('upsell.upsell2', compact('sign'));
    }

    /**
     * Upsell3 (single page)
     * Route: /upsell3
     */
    public function upsell3(): View {
        return view('upsell.upsell3');
    }

    public function upsell3Dummy(): View {
        return view('upsell.upsell3-dummy');
    }

     /**
     * Download Upsell1
     */
    public function downloadUpsell1(Request $request): View {
        $signSlug = $request->route('sign');
        $sign = config("variables.signs.$signSlug");

        abort_unless(is_array($sign), 404);

        return view('download.upsell1', compact('sign'));
    }

    public function downloadUpsell2(Request $request): View {
        $signSlug = $request->route('sign');
        $sign = config("variables.signs.$signSlug");

        abort_unless(is_array($sign), 404);

        return view('download.upsell2', compact('sign'));
    }

     /**
     * Download Upsell3 (single page)
     */
    public function downloadUpsell3(): View {
        return view('download.upsell3');
    }
}
