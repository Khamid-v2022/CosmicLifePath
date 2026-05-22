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
    public function downloadVipAries(): View { 
        $sign = config('variables.signs.aries');
        return view('download.vip', compact('sign')); 
    }
    /**
     * Download VIP Taurus
     * Route: /download/vip-taurus
     */
    public function downloadVipTaurus(): View { 
        $sign = config('variables.signs.taurus');
        return view('download.vip', compact('sign')); 
    }
    /**
     * Download VIP Gemini
     * Route: /download/vip-gemini
     */
    public function downloadVipGemini(): View { 
        $sign = config('variables.signs.gemini');
        return view('download.vip', compact('sign')); 
    }
    /**
     * Download VIP Cancer
     * Route: /download/vip-cancer
     */
    public function downloadVipCancer(): View { 
        $sign = config('variables.signs.cancer');
        return view('download.vip', compact('sign')); 
    }
    /**
     * Download VIP Leo
     * Route: /download/vip-leo
     */
    public function downloadVipLeo(): View { 
        $sign = config('variables.signs.leo');
        return view('download.vip', compact('sign')); 
    }
    /**
     * Download VIP Virgo
     * Route: /download/vip-virgo
     */
    public function downloadVipVirgo(): View { 
        $sign = config('variables.signs.virgo');
        return view('download.vip', compact('sign')); 
    }
    /**
     * Download VIP Libra
     * Route: /download/vip-libra
     */
    public function downloadVipLibra(): View { 
        $sign = config('variables.signs.libra');
        return view('download.vip', compact('sign')); 
    }
    /**
     * Download VIP Scorpio
     * Route: /download/vip-scorpio
     */
    public function downloadVipScorpio(): View { 
        $sign = config('variables.signs.scorpio');
        return view('download.vip', compact('sign')); 
    }
    /**
     * Download VIP Sagittarius
     * Route: /download/vip-sagittarius
     */
    public function downloadVipSagittarius(): View { 
        $sign = config('variables.signs.sagittarius');
        return view('download.vip', compact('sign')); 
    }
    /**
     * Download VIP Capricorn
     * Route: /download/vip-capricorn
     */
    public function downloadVipCapricorn(): View { 
        $sign = config('variables.signs.capricorn');
        return view('download.vip', compact('sign')); 
    }
    /**
     * Download VIP Aquarius
     * Route: /download/vip-aquarius
     */
    public function downloadVipAquarius(): View { 
        $sign = config('variables.signs.aquarius');
        return view('download.vip', compact('sign')); 
    }
    /**
     * Download VIP Pisces
     * Route: /download/vip-pisces
     */
    public function downloadVipPisces(): View { 
        $sign = config('variables.signs.pisces');
        return view('download.vip', compact('sign')); 
    }

    /**
     * Download Standard Aries
     * Route: /download/standard-aries
     */
    public function downloadStandardAries(): View { 
        $sign = config('variables.signs.aries');
        return view('download.standard', compact('sign')); 
    }
    /**
     * Download Standard Taurus
     * Route: /download/standard-taurus
     */
    public function downloadStandardTaurus(): View { 
        $sign = config('variables.signs.taurus');
        return view('download.standard', compact('sign')); 
    }
    /**
     * Download Standard Gemini
     * Route: /download/standard-gemini
     */
    public function downloadStandardGemini(): View { 
        $sign = config('variables.signs.gemini');
        return view('download.standard', compact('sign')); 
    }
    /**
     * Download Standard Cancer
     * Route: /download/standard-cancer
     */
    public function downloadStandardCancer(): View { 
        $sign = config('variables.signs.cancer');
        return view('download.standard', compact('sign')); 
    }
    /**
     * Download Standard Leo
     * Route: /download/standard-leo
     */
    public function downloadStandardLeo(): View { 
        $sign = config('variables.signs.leo');
        return view('download.standard', compact('sign')); 
    }
    /**
     * Download Standard Virgo
     * Route: /download/standard-virgo
     */
    public function downloadStandardVirgo(): View { 
        $sign = config('variables.signs.virgo');
        return view('download.standard', compact('sign')); 
    }
    /**
     * Download Standard Libra
     * Route: /download/standard-libra
     */
    public function downloadStandardLibra(): View { 
        $sign = config('variables.signs.libra');
        return view('download.standard', compact('sign')); 
    }
    /**
     * Download Standard Scorpio
     * Route: /download/standard-scorpio
     */
    public function downloadStandardScorpio(): View { 
        $sign = config('variables.signs.scorpio');
        return view('download.standard', compact('sign')); 
    }
    /**
     * Download Standard Sagittarius
     * Route: /download/standard-sagittarius
     */
    public function downloadStandardSagittarius(): View { 
        $sign = config('variables.signs.sagittarius');
        return view('download.standard', compact('sign')); 
    }
    /**
     * Download Standard Capricorn
     * Route: /download/standard-capricorn
     */
    public function downloadStandardCapricorn(): View { 
        $sign = config('variables.signs.capricorn');
        return view('download.standard', compact('sign')); 
    }
    /**
     * Download Standard Aquarius
     * Route: /download/standard-aquarius
     */
    public function downloadStandardAquarius(): View { 
        $sign = config('variables.signs.aquarius');
        return view('download.standard', compact('sign')); 
    }
    /**
     * Download Standard Pisces
     * Route: /download/standard-pisces
     */
    public function downloadStandardPisces(): View { 
        $sign = config('variables.signs.pisces');
        return view('download.standard', compact('sign')); 
    }


    /**
     * Download Full Report (All 12 Signs)
     * Route: /download/fullreport
     */
    public function downloadFullReport(): View { return view('download.fullreport'); }

    /**
     * Download Upsell1 Aries
     * Route: /upsell1-aries
     */
    public function upsell1Aries(): View { 
        $sign = config('variables.signs.aries');
        return view('upsell.upsell1', compact('sign')); 
    }
    /**
     * Download Upsell1 Taurus
     * Route: /upsell1-taurus
     */
    public function upsell1Taurus(): View { 
        $sign = config('variables.signs.taurus');
        return view('upsell.upsell1', compact('sign')); 
    }
    /**
     * Download Upsell1 Gemini
     * Route: /upsell1-gemini
     */
    public function upsell1Gemini(): View { 
        $sign = config('variables.signs.gemini');
        return view('upsell.upsell1', compact('sign')); 
    }
    /**
     * Download Upsell1 Cancer
     * Route: /upsell1-cancer
     */
    public function upsell1Cancer(): View { 
        $sign = config('variables.signs.cancer');
        return view('upsell.upsell1', compact('sign')); 
    }
    /**
     * Download Upsell1 Leo
     * Route: /upsell1-leo
     */
    public function upsell1Leo(): View { 
        $sign = config('variables.signs.leo');
        return view('upsell.upsell1', compact('sign')); 
    }
    /**
     * Download Upsell1 Virgo
     * Route: /upsell1-virgo
     */
    public function upsell1Virgo(): View { 
        $sign = config('variables.signs.virgo');
        return view('upsell.upsell1', compact('sign')); 
    }
    /**
     * Download Upsell1 Libra
     * Route: /upsell1-libra
     */
    public function upsell1Libra(): View { 
        $sign = config('variables.signs.libra');
        return view('upsell.upsell1', compact('sign')); 
    }
    /**
     * Download Upsell1 Scorpio
     * Route: /upsell1-scorpio
     */
    public function upsell1Scorpio(): View { 
        $sign = config('variables.signs.scorpio');
        return view('upsell.upsell1', compact('sign')); 
    }
    /**
     * Download Upsell1 Sagittarius
     * Route: /upsell1-sagittarius
     */
    public function upsell1Sagittarius(): View { 
        $sign = config('variables.signs.sagittarius');
        return view('upsell.upsell1', compact('sign')); 
    }
    /**
     * Download Upsell1 Capricorn
     * Route: /upsell1-capricorn
     */
    public function upsell1Capricorn(): View { 
        $sign = config('variables.signs.capricorn');
        return view('upsell.upsell1', compact('sign')); 
    }
    /**
     * Download Upsell1 Aquarius
     * Route: /upsell1-aquarius
     */
    public function upsell1Aquarius(): View { 
        $sign = config('variables.signs.aquarius');
        return view('upsell.upsell1', compact('sign')); 
    }
    /**
     * Download Upsell1 Pisces
     * Route: /upsell1-pisces
     */
    public function upsell1Pisces(): View { 
        $sign = config('variables.signs.pisces');
        return view('upsell.upsell1', compact('sign')); 
    }

    
    /**
     * Download Upsell2 Aries
     * Route: /upsell2-aries
     */
    public function upsell2Aries(): View { 
        $sign = config('variables.signs.aries');
        return view('upsell.upsell2', compact('sign')); 
    }
    /**
     * Download Upsell2 Taurus
     * Route: /upsell2-taurus
     */
    public function upsell2Taurus(): View { 
        $sign = config('variables.signs.taurus');
        return view('upsell.upsell2', compact('sign')); 
    }
    /**
     * Download Upsell2 Gemini
     * Route: /upsell2-gemini
     */
    public function upsell2Gemini(): View { 
        $sign = config('variables.signs.gemini');
        return view('upsell.upsell2', compact('sign')); 
    }
    /**
     * Download Upsell2 Cancer
     * Route: /upsell2-cancer
     */
    public function upsell2Cancer(): View { 
        $sign = config('variables.signs.cancer');
        return view('upsell.upsell2', compact('sign')); 
    }
    /**
     * Download Upsell2 Leo
     * Route: /upsell2-leo
     */
    public function upsell2Leo(): View { 
        $sign = config('variables.signs.leo');
        return view('upsell.upsell2', compact('sign')); 
    }
    /**
     * Download Upsell2 Virgo
     * Route: /upsell2-virgo
     */
    public function upsell2Virgo(): View { 
        $sign = config('variables.signs.virgo');
        return view('upsell.upsell2', compact('sign')); 
    }
    /**
     * Download Upsell2 Libra
     * Route: /upsell2-libra
     */
    public function upsell2Libra(): View { 
        $sign = config('variables.signs.libra');
        return view('upsell.upsell2', compact('sign')); 
    }
    /**
     * Download Upsell2 Scorpio
     * Route: /upsell2-scorpio
     */
    public function upsell2Scorpio(): View { 
        $sign = config('variables.signs.scorpio');
        return view('upsell.upsell2', compact('sign')); 
    }
    /**
     * Download Upsell2 Sagittarius
     * Route: /upsell2-sagittarius
     */
    public function upsell2Sagittarius(): View { 
        $sign = config('variables.signs.sagittarius');
        return view('upsell.upsell2', compact('sign')); 
    }
    /**
     * Download Upsell2 Capricorn
     * Route: /upsell2-capricorn
     */
    public function upsell2Capricorn(): View { 
        $sign = config('variables.signs.capricorn');
        return view('upsell.upsell2', compact('sign')); 
    }
    /**
     * Download Upsell2 Aquarius
     * Route: /upsell2-aquarius
     */
    public function upsell2Aquarius(): View { 
        $sign = config('variables.signs.aquarius');
        return view('upsell.upsell2', compact('sign')); 
    }
    /**
     * Download Upsell2 Pisces
     * Route: /upsell2-pisces
     */
    public function upsell2Pisces(): View { 
        $sign = config('variables.signs.pisces');
        return view('upsell.upsell2', compact('sign')); 
    }
    /**
     * Upsell3 (single page)
     * Route: /upsell3
     */
    public function upsell3(): View {
        return view('upsell.upsell3');
    }
}
