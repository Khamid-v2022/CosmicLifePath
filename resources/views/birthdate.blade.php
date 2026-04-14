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

        <div class="social-proof-wrap mt-5">
            <div class="trust-pill">★★★★★ Rated 4.9/5 by 12,000+ cosmic seekers</div>
            <div class="row g-3 mt-2">
            <div class="col-md-4">
                <div class="proof-card">
                <p class="proof-quote">“I felt seen in a way no generic horoscope ever delivered.”</p>
                <p class="proof-name">— Mina K.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="proof-card">
                <p class="proof-quote">“The reading highlighted gifts I had ignored for years.”</p>
                <p class="proof-name">— Daniel R.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="proof-card">
                <p class="proof-quote">“Beautiful, accurate, and surprisingly personal from the very first step.”</p>
                <p class="proof-name">— Yuna P.</p>
                </div>
            </div>
            </div>
        </div>
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
  </script>
@endpush
