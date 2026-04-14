@extends('layouts.app')

@section('title', 'Final Step - Contact Details')

@section('content')
  <section class="step-section container">
    <div class="step-panel mx-auto">
      <h2 class="section-title">Final Step:<em> Where should we send your reading to?</em></h2>
      <p class="section-desc">Your FREE Personalised Cosmic Life Path Reading Reveals Hidden Gifts, Talents…<br>And Your Unique Divine Purpose In Life</p>

      <div class="row g-4 align-items-start">
        <div class="col-lg-6">
          <div class="birth-card h-100">
            <p class="birth-label">Your FREE Cosmic Life Path Reading With Psychic Celestra Vonn Will Help You...</p>
            <ul class="cosmic-benefits mb-0">
              <li>Unlock secrets of who you really are at the core of your being</li>
              <li>Receive empowering insights on your hidden talents and how to overcome hidden locks to your abundance</li>
              <li>Discover how to fulfill your particular divine mission, or cosmic plan for your life, from the time you were born.</li>
            </ul>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="birth-card h-100">
            <form method="POST" action="{{ route('reading.contact.submit') }}" id="contactDetailsForm" class="contact-form">
              @csrf

              <label class="birth-label" for="contactName">Name</label>
              <input type="text" id="contactName" name="name" class="form-control cosmic-input mb-3" value="{{ old('name') }}" required>

              <label class="birth-label" for="contactEmail">Email address</label>
              <input type="email" id="contactEmail" name="email" class="form-control cosmic-input" value="{{ old('email') }}" required>

              @if ($errors->any())
                <div class="birth-error-box mt-3">
                  {{ $errors->first() }}
                </div>
              @endif

              <button type="submit" class="hero-cta btn step-next-btn mt-4 w-100">Get My FREE Cosmic Life Path Reading...</button>
            </form>
          </div>
        </div>
      </div>

      <div class="social-proof-wrap mt-5 text-center">
        <div class="trust-pill">★★★★★ Loved by 12,000+ readers worldwide</div>
        <div class="row g-3 mt-2">
          <div class="col-md-4">
            <div class="proof-card">
              <p class="proof-quote">“The reading felt uncannily personal from the first screen.”</p>
              <p class="proof-name">— Elise T.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="proof-card">
              <p class="proof-quote">“I discovered strengths I had never fully recognized in myself.”</p>
              <p class="proof-name">— Noah V.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="proof-card">
              <p class="proof-quote">“Elegant, clear, and surprisingly insightful.”</p>
              <p class="proof-name">— Mia L.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
