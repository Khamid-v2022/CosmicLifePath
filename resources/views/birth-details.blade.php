@extends('layouts.app')

@section('title', 'Step #3 - Birth Time and Place')

@section('content')
  <section class="step-section container">
    <div class="step-panel mx-auto">
      <h2 class="section-title">Step #3:<em> Select the time and place of your birth</em></h2>
      <p class="section-desc">Your FREE Personalised Cosmic Life Path Reading Reveals Hidden Gifts, Talents…<br>And Your Unique Divine Purpose In Life</p>

      <p class="step-copy">You selected <strong>{{ $sign['label'] }}</strong> and your birth date is <strong>{{ $formattedDate }}</strong>.</p>

      @php
        $selectedHour = (string) old('hour', request('hour', '12'));
        $selectedMinute = str_pad((string) old('minute', request('minute', '00')), 2, '0', STR_PAD_LEFT);
        $selectedMeridiem = old('meridiem', request('meridiem', 'AM'));
      @endphp

      <form method="POST" action="{{ route('birth.details.submit') }}" id="birthDetailsForm" class="birth-form mt-4">
        @csrf
        <input type="hidden" name="sign" value="{{ $signSlug }}">
        <input type="hidden" name="month" value="{{ $month }}">
        <input type="hidden" name="day" value="{{ $day }}">
        <input type="hidden" name="year" value="{{ $year }}">

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
              <!-- <p class="place-note mt-2 mb-0">Google location suggestions will appear automatically when the API key is available.</p> -->

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
  </section>
@endsection

@push('scripts')
  <script>
    window.COSMIC_BIRTH_DETAILS_STATE = {
      hour: @json(old('hour', request('hour'))),
      minute: @json(old('minute', request('minute'))),
      meridiem: @json(old('meridiem', request('meridiem', 'AM'))),
      birthPlace: @json(old('birth_place', request('birth_place'))),
      timeUnknown: @json((bool) old('time_unknown', request()->boolean('time_unknown'))),
      placeUnknown: @json((bool) old('place_unknown', request()->boolean('place_unknown'))),
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
