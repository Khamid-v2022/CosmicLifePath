@extends('layouts.app')

@section('title', 'Step #2 - Date of Birth')

@section('content')
    @php
        $oldMonth = old('month');
        $oldDay = old('day');
        $oldYear = old('year');

        $selectedHour = (string) old('hour', '12');
        $selectedMinute = str_pad((string) old('minute', '00'), 2, '0', STR_PAD_LEFT);
        $selectedMeridiem = old('meridiem', 'AM');

        $hasTimePlaceInput = old('hour') !== null
            || old('minute') !== null
            || old('meridiem') !== null
            || old('birth_place') !== null
            || old('time_unknown') !== null
            || old('place_unknown') !== null
            || $errors->has('birth_place');

        $initialStage = $hasTimePlaceInput ? 'details' : 'date';

        $formattedDate = 'Not selected';
        if ($oldMonth && $oldDay && $oldYear) {
            $formattedDate = sprintf('%02d / %02d / %04d', (int) $oldMonth, (int) $oldDay, (int) $oldYear);
        }
    @endphp

  <section class="step-section container">
    <div class="step-panel mx-auto">
            <div id="birthStageDate" class="birth-stage @if($initialStage === 'date') is-active @else d-none @endif">
                <h2 class="section-title">Step #2:<em> Enter Your Date of Birth</em></h2>

                <p class="step-copy mb-0">You selected <strong>{{ $sign['label'] }}</strong>.</p>
                <p class="step-copy">Now enter your birth date to continue your cosmic path.</p>

                @if ($errors->has('day') || $errors->has('month') || $errors->has('year'))
                    <div class="birth-error-box mb-3">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form id="birthForm" class="birth-form" novalidate>
                    <input type="hidden" name="sign" value="{{ $signSlug }}">

                    <label class="birth-label" for="birthMonth">Date of birth</label>

                    <div class="row g-3 birth-select-row">
                        <div class="col-md-4">
                            <select id="birthMonth" name="month" class="form-select cosmic-select" required>
                                <option value="">Month</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select id="birthDay" name="day" class="form-select cosmic-select" required>
                                <option value="">Day</option>
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <select id="birthYear" name="year" class="form-select cosmic-select" required>
                                <option value="">Year</option>
                            </select>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="button" id="birthStageNext" class="hero-cta btn step-next-btn mt-4">Next</button>
                        <p id="birthDayHelp" class="birth-help"></p>
                    </div>
                </form>
            </div>

            <div id="birthStageDetails" class="birth-stage @if($initialStage === 'details') is-active @else d-none @endif">
                <h2 class="section-title">Step #3:<em> Enter Your Time & Place of Birth</em></h2>

                <p class="step-copy mb-0">You selected <strong>{{ $sign['label'] }}</strong>.</p>
                <p class="step-copy">Your birth date is <strong id="stage2BirthDateDisplay">{{ $formattedDate }}</strong>.</p>

                <form method="POST" action="{{ route('birth.details.submit') }}" id="birthDetailsForm" class="birth-form mt-4">
                    @csrf
                    <input type="hidden" name="sign" value="{{ $signSlug }}">
                    <input type="hidden" name="month" id="hiddenBirthMonth" value="{{ $oldMonth }}">
                    <input type="hidden" name="day" id="hiddenBirthDay" value="{{ $oldDay }}">
                    <input type="hidden" name="year" id="hiddenBirthYear" value="{{ $oldYear }}">

                    <div class="row g-4 align-items-start birth-grid">
                        <div class="col-lg-6">
                            <div class="birth-card">
                                <label class="birth-label" for="birthHour">Time of birth</label>
                                <div class="row g-2 birth-inline-selects">
                                    <div class="col-4">
                                        <select id="birthHour" name="hour" class="form-select cosmic-select">
                                            @for ($hour = 1; $hour <= 12; $hour++)
                                                <option value="{{ $hour }}" @selected($selectedHour === (string) $hour)>{{ str_pad((string) $hour, 2, '0', STR_PAD_LEFT) }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select id="birthMinute" name="minute" class="form-select cosmic-select">
                                            @for ($minute = 0; $minute <= 59; $minute++)
                                                @php $minuteValue = str_pad((string) $minute, 2, '0', STR_PAD_LEFT); @endphp
                                                <option value="{{ $minuteValue }}" @selected($selectedMinute === $minuteValue)>{{ $minuteValue }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select id="birthMeridiem" name="meridiem" class="form-select cosmic-select">
                                            <option value="AM" @selected($selectedMeridiem === 'AM')>AM</option>
                                            <option value="PM" @selected($selectedMeridiem === 'PM')>PM</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-check birth-check mt-3">
                                    <input class="form-check-input" type="checkbox" value="1" id="timeUnknown" name="time_unknown" @checked(old('time_unknown'))>
                                    <label class="form-check-label" for="timeUnknown">I am not sure</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="birth-card">
                                <label class="birth-label" for="birthPlace">My place of birth</label>
                                <input type="text" id="birthPlace" name="birth_place" class="form-control cosmic-input" placeholder="Start typing your country or city" value="{{ old('birth_place') }}" autocomplete="off">

                                <div class="form-check birth-check mt-3">
                                    <input class="form-check-input" type="checkbox" value="1" id="placeUnknown" name="place_unknown" @checked(old('place_unknown'))>
                                    <label class="form-check-label" for="placeUnknown">I am not sure</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="hero-cta btn step-next-btn">Next</button>
                    </div>

                    <p id="birthPlacePageError" class="birth-help text-center mt-3 @if($errors->has('birth_place')) is-visible @endif">{{ $errors->first('birth_place') }}</p>
                </form>
            </div>
    </div>
  </section>
@endsection

@push('scripts')
    <script>
        window.COSMIC_FORM_RULE = @json($sign['months']);
        window.COSMIC_FORM_STATE = {
                month: @json($oldMonth),
                day: @json($oldDay),
                year: @json($oldYear),
                stage: @json($initialStage),
        };

        window.COSMIC_BIRTH_DETAILS_STATE = {
            hour: @json(old('hour')),
            minute: @json(old('minute')),
            meridiem: @json(old('meridiem', 'AM')),
            birthPlace: @json(old('birth_place')),
            timeUnknown: @json((bool) old('time_unknown')),
            placeUnknown: @json((bool) old('place_unknown')),
        };

        window.COSMIC_SOCIAL_PROOF = {
            enabled: true,
            mode: 'quiz',
            visibleMs: 5000,
            minDelayMs: 5000,
            maxDelayMs: 30000,
        };
  </script>

    @if (config('services.google_maps.key'))
        <script>
            window.initCosmicPlaces = function () {
                window.dispatchEvent(new Event('cosmicGoogleReady'));
            };
        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.key') }}&libraries=places&callback=initCosmicPlaces"></script>
    @endif
@endpush
