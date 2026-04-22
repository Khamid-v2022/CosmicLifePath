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

        // abort_unless(in_array($day, $sign['months'][$month] ?? [], true), 404);
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

        return redirect()->route('reading.contact');
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

        return redirect()->route('reading.loading');
    }

    public function loading(Request $request): View|RedirectResponse
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

        return view('sales-page', [
            'name' => $contact['name'],
            'email' => $contact['email'],
            'sign' => $birth['sign'],
            'formattedDate' => $birth['formatted_date'],
            'birth' => $birth,
            'contact' => $contact,
        ]);
    }

    private function findSignOrFail(string $slug): array
    {
        $signs = $this->signs();

        abort_unless(isset($signs[$slug]), 404);

        return $signs[$slug] + ['slug' => $slug];
    }

    private function signs(): array
    {
        return [
            'aries' => ['label' => 'Aries', 'months' => [3 => range(21, 31), 4 => range(1, 19)]],
            'taurus' => ['label' => 'Taurus', 'months' => [4 => range(20, 30), 5 => range(1, 20)]],
            'gemini' => ['label' => 'Gemini', 'months' => [5 => range(21, 31), 6 => range(1, 20)]],
            'cancer' => ['label' => 'Cancer', 'months' => [6 => range(21, 30), 7 => range(1, 22)]],
            'leo' => ['label' => 'Leo', 'months' => [7 => range(23, 31), 8 => range(1, 22)]],
            'virgo' => ['label' => 'Virgo', 'months' => [8 => range(22, 31), 9 => range(1, 22)]],
            'libra' => ['label' => 'Libra', 'months' => [9 => range(23, 30), 10 => range(1, 22)]],
            'scorpio' => ['label' => 'Scorpio', 'months' => [10 => range(23, 31), 11 => range(1, 21)]],
            'sagittarius' => ['label' => 'Sagittarius', 'months' => [11 => range(22, 30), 12 => range(1, 21)]],
            'capricorn' => ['label' => 'Capricorn', 'months' => [12 => range(22, 31), 1 => range(1, 19)]],
            'aquarius' => ['label' => 'Aquarius', 'months' => [1 => range(20, 31), 2 => range(1, 18)]],
            'pisces' => ['label' => 'Pisces', 'months' => [2 => range(19, 29), 3 => range(1, 20)]],
        ];
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
    public function downloadVipAries(): View { return view('download.vip-aries'); }
    /**
     * Download VIP Taurus
     * Route: /download/vip-taurus
     */
    public function downloadVipTaurus(): View { return view('download.vip-taurus'); }
    /**
     * Download VIP Gemini
     * Route: /download/vip-gemini
     */
    public function downloadVipGemini(): View { return view('download.vip-gemini'); }
    /**
     * Download VIP Cancer
     * Route: /download/vip-cancer
     */
    public function downloadVipCancer(): View { return view('download.vip-cancer'); }
    /**
     * Download VIP Leo
     * Route: /download/vip-leo
     */
    public function downloadVipLeo(): View { return view('download.vip-leo'); }
    /**
     * Download VIP Virgo
     * Route: /download/vip-virgo
     */
    public function downloadVipVirgo(): View { return view('download.vip-virgo'); }
    /**
     * Download VIP Libra
     * Route: /download/vip-libra
     */
    public function downloadVipLibra(): View { return view('download.vip-libra'); }
    /**
     * Download VIP Scorpio
     * Route: /download/vip-scorpio
     */
    public function downloadVipScorpio(): View { return view('download.vip-scorpio'); }
    /**
     * Download VIP Sagittarius
     * Route: /download/vip-sagittarius
     */
    public function downloadVipSagittarius(): View { return view('download.vip-sagittarius'); }
    /**
     * Download VIP Capricorn
     * Route: /download/vip-capricorn
     */
    public function downloadVipCapricorn(): View { return view('download.vip-capricorn'); }
    /**
     * Download VIP Aquarius
     * Route: /download/vip-aquarius
     */
    public function downloadVipAquarius(): View { return view('download.vip-aquarius'); }
    /**
     * Download VIP Pisces
     * Route: /download/vip-pisces
     */
    public function downloadVipPisces(): View { return view('download.vip-pisces'); }

    /**
     * Download Standard Aries
     * Route: /download/standard-aries
     */
    public function downloadStandardAries(): View { return view('download.standard-aries'); }
    /**
     * Download Standard Taurus
     * Route: /download/standard-taurus
     */
    public function downloadStandardTaurus(): View { return view('download.standard-taurus'); }
    /**
     * Download Standard Gemini
     * Route: /download/standard-gemini
     */
    public function downloadStandardGemini(): View { return view('download.standard-gemini'); }
    /**
     * Download Standard Cancer
     * Route: /download/standard-cancer
     */
    public function downloadStandardCancer(): View { return view('download.standard-cancer'); }
    /**
     * Download Standard Leo
     * Route: /download/standard-leo
     */
    public function downloadStandardLeo(): View { return view('download.standard-leo'); }
    /**
     * Download Standard Virgo
     * Route: /download/standard-virgo
     */
    public function downloadStandardVirgo(): View { return view('download.standard-virgo'); }
    /**
     * Download Standard Libra
     * Route: /download/standard-libra
     */
    public function downloadStandardLibra(): View { return view('download.standard-libra'); }
    /**
     * Download Standard Scorpio
     * Route: /download/standard-scorpio
     */
    public function downloadStandardScorpio(): View { return view('download.standard-scorpio'); }
    /**
     * Download Standard Sagittarius
     * Route: /download/standard-sagittarius
     */
    public function downloadStandardSagittarius(): View { return view('download.standard-sagittarius'); }
    /**
     * Download Standard Capricorn
     * Route: /download/standard-capricorn
     */
    public function downloadStandardCapricorn(): View { return view('download.standard-capricorn'); }
    /**
     * Download Standard Aquarius
     * Route: /download/standard-aquarius
     */
    public function downloadStandardAquarius(): View { return view('download.standard-aquarius'); }
    /**
     * Download Standard Pisces
     * Route: /download/standard-pisces
     */
    public function downloadStandardPisces(): View { return view('download.standard-pisces'); }


    /**
     * Download Full Report (All 12 Signs)
     * Route: /download/fullreport
     */
    public function downloadFullReport(): View { return view('download.fullreport'); }
}
