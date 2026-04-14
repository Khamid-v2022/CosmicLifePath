<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CosmicFlowController extends Controller
{
    public function landing(): View
    {
        return view('landing');
    }

    public function birthdate(string $sign): View
    {
        return view('birthdate', [
            'signSlug' => $sign,
            'sign' => $this->findSignOrFail($sign),
        ]);
    }

    public function storeBirthdate(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'sign' => ['required', 'string'],
            'month' => ['required', 'integer', 'between:1,12'],
            'day' => ['required', 'integer', 'between:1,31'],
            'year' => ['required', 'integer', 'between:1900,2008'],
        ]);

        $sign = $this->findSignOrFail($validated['sign']);
        $month = (int) $validated['month'];
        $day = (int) $validated['day'];
        $year = (int) $validated['year'];
        $allowedDays = $sign['months'][$month] ?? [];

        if (! in_array($day, $allowedDays, true)) {
            return back()
                ->withErrors(['day' => 'Please select a valid birth date for your chosen sign.'])
                ->withInput();
        }

        return redirect()->route('birth.details', [
            'sign' => $validated['sign'],
            'month' => $month,
            'day' => $day,
            'year' => $year,
        ]);
    }

    public function birthDetails(Request $request): View
    {
        $details = $this->validatedBirthDateFromQuery($request);

        return view('birth-details', [
            'sign' => $details['sign'],
            'signSlug' => $details['sign']['slug'],
            'month' => $details['month'],
            'day' => $details['day'],
            'year' => $details['year'],
            'formattedDate' => sprintf('%02d / %02d / %04d', $details['month'], $details['day'], $details['year']),
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
            'minute' => ['nullable', 'integer', 'between:0,59'],
            'meridiem' => ['nullable', 'in:AM,PM'],
            'birth_place' => ['nullable', 'string', 'max:255'],
            'time_unknown' => ['nullable', 'boolean'],
            'place_unknown' => ['nullable', 'boolean'],
        ]);

        $sign = $this->findSignOrFail($validated['sign']);
        $month = (int) $validated['month'];
        $day = (int) $validated['day'];
        $year = (int) $validated['year'];

        abort_unless(in_array($day, $sign['months'][$month] ?? [], true), 404);

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

        $request->session()->put('cosmic.reading.birth', [
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
        ]);

        return redirect()->route('reading.contact');
    }

    public function contact(): View
    {
        $birth = session('cosmic.reading.birth');

        abort_unless(is_array($birth), 404);

        return view('contact-details', [
            'birth' => $birth,
        ]);
    }

    public function storeContact(Request $request): RedirectResponse
    {
        $birth = $request->session()->get('cosmic.reading.birth');

        abort_unless(is_array($birth), 404);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:190'],
        ]);

        $request->session()->put('cosmic.reading.contact', [
            'name' => trim($validated['name']),
            'email' => trim($validated['email']),
        ]);

        return redirect()->route('reading.loading');
    }

    public function loading(): View
    {
        $birth = session('cosmic.reading.birth');
        $contact = session('cosmic.reading.contact');

        abort_unless(is_array($birth) && is_array($contact), 404);

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
        ]);
    }

    public function summary(): View
    {
        $birth = session('cosmic.reading.birth');
        $contact = session('cosmic.reading.contact');

        abort_unless(is_array($birth) && is_array($contact), 404);

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
        ]);
    }

    public function sales(): View
    {
        $birth = session('cosmic.reading.birth');
        $contact = session('cosmic.reading.contact');

        abort_unless(is_array($birth) && is_array($contact), 404);

        return view('sales-page', [
            'name' => $contact['name'],
            'email' => $contact['email'],
            'sign' => $birth['sign'],
            'formattedDate' => $birth['formatted_date'],
        ]);
    }

    private function validatedBirthDateFromQuery(Request $request): array
    {
        $signSlug = (string) $request->query('sign');
        $sign = $this->findSignOrFail($signSlug);
        $month = (int) $request->query('month');
        $day = (int) $request->query('day');
        $year = (int) $request->query('year');

        abort_unless($year >= 1900 && $year <= 2008, 404);
        abort_unless(in_array($day, $sign['months'][$month] ?? [], true), 404);

        return [
            'sign' => $sign,
            'month' => $month,
            'day' => $day,
            'year' => $year,
        ];
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
}
