@extends('layouts.app')

@section('title', 'Step #2 - Date of Birth')

@section('content')
  <section class="step-section container">
    <div class="step-panel mx-auto">
        <h2 class="section-title">Step #2:<em> Select the date you were born</em></h2>
        <p class="section-desc">Your FREE Personalised Cosmic Life Path Reading Reveals Hidden Gifts, Talents…<br>And Your Unique Divine Purpose In Life</p>

        <p class="step-copy">You selected <strong>{{ $sign['label'] }}</strong>. Enter your birth date to continue your cosmic path.</p>

        @if ($errors->any())
            <div class="birth-error-box mb-3">
            {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('birthdate.submit') }}" id="birthForm" class="birth-form">
            @csrf
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
                    <p id="birthDayHelp" class="birth-help"></p>
                </div>
                <div class="col-md-4">
                    <select id="birthYear" name="year" class="form-select cosmic-select" required>
                    <option value="">Year</option>
                    </select>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="hero-cta btn step-next-btn mt-4">Next</button>
            </div>
        </form>

    </div>
  </section>
@endsection

@push('scripts')
  <script>
    window.COSMIC_FORM_RULE = @json($sign['months']);
    window.COSMIC_FORM_STATE = {
      month: @json(old('month')),
      day: @json(old('day')),
      year: @json(old('year')),
    };

        window.COSMIC_SOCIAL_PROOF = {
            enabled: true,
            mode: 'quiz',
            visibleMs: 5000,
            minDelayMs: 5000,
            maxDelayMs: 30000,
        };
  </script>
@endpush
