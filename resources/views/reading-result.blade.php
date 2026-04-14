@extends('layouts.app')

@section('title', 'Your Generic Results')

@section('content')
  <section class="step-section container">
    <div class="step-panel mx-auto">
      <p class="section-label text-center">Generic Results Page</p>
      <h1 class="section-title step-title text-center">{{ $name }}, your first cosmic patterns are starting to reveal themselves</h1>
      <p class="step-copy">Your chart suggests that powerful themes around identity, timing, and purpose are beginning to surface. These first signals are only the surface of what your full Cosmic Life Path Reading can show you.</p>
      <p class="step-copy">The more deeply you explore this path, the more clearly you may understand the talents, blocks, and opportunities that have been shaping your life.</p>

      <div class="row g-4 align-items-center mt-4">
        <div class="col-lg-6">
          <img src="{{ asset('imgs/GIIVg.jpg') }}" alt="Cosmic illustration" class="img-fluid cosmic-result-image">
        </div>
        <div class="col-lg-6">
          <div class="proof-card h-100">
            <p class="proof-name">What this may mean for you</p>
            <p class="proof-quote">Your {{ $sign['label'] }} energy points toward a life path shaped by intuition, timing, and personal transformation.</p>
            <ul class="cosmic-benefits mb-0">
              <li>A stronger understanding of your inner wiring</li>
              <li>Clarity around the talents you may be underusing</li>
              <li>A deeper sense of the purpose that has been guiding you all along</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="social-proof-wrap mt-5 text-center">
        <div class="trust-pill">Someone just purchased their full report</div>
        <div class="row g-3 mt-2">
          <div class="col-md-4">
            <div class="proof-card h-100">
              <p class="proof-quote">“This gave me a clearer direction than any generic horoscope ever could.”</p>
              <p class="proof-name">— Emma R.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="proof-card h-100">
              <p class="proof-quote">“I ended up buying the full report because the insight felt so precise.”</p>
              <p class="proof-name">— Liam P.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="proof-card h-100">
              <p class="proof-quote">“Beautifully explained and genuinely intriguing from start to finish.”</p>
              <p class="proof-name">— Chloe S.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="text-center mt-5">
        <a href="{{ route('sales.page') }}" class="hero-cta btn step-next-btn">Continue to My Offer</a>
      </div>
    </div>
  </section>
@endsection
