@extends('layouts.app')

@section('title', 'Final Step - Contact Details')

@section('content')
  <section class="small-gap-start step-section container">
    <div class="step-panel mx-auto">
      <h2 class="section-title mb-4">Final Step:<em> Where should we send your reading to?</em></h2>
      
      <div class="row g-4 align-items-start">
        <div class="col-lg-6  order-2 order-lg-1">
          <div class="birth-card h-100">
            <p class="birth-label mb-4"><strong>YOUR READING IS BEING PREPARED BY</strong> <em>Psychic Celestra Vonn</em></p>
            <ul class="cosmic-benefits mb-0">
              <li>Discover the hidden gifts and talents unique to you alone</li>
              <li>Uncover the personal blocks quietly holding you back from abundance</li>
              <li>See your unique Cosmic Life Path clearly — perhaps for the first time ever</li>
            </ul>
          </div>
        </div>

        <div class="col-lg-6  order-1 order-lg-2">
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
      

      <div class="social-proof-wrap mt-3 mt-md-5 text-center">
        <div class="trust-pill">★★★★★ Loved by 12,000+ readers worldwide</div>
        <div class="row mt-3">
          <div class="col-md-4 mb-3">
            <div class="proof-card">
              <div class="proof-image-wrapper">
                <img src="{{ asset('imgs/avatar/elise.png') }}" alt="Cosmic reading testimonial" class="proof-image mb-3">
              </div>
              <p class="proof-quote">“I almost didn't enter my details. I'm so glad I did. What came next genuinely stopped me in my tracks.”</p>
              <p class="proof-name">— Elise T., London</p>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="proof-card">
              <div class="proof-image-wrapper">
                <img src="{{ asset('imgs/avatar/noah.png') }}" alt="Cosmic reading testimonial" class="proof-image mb-3">
              </div>
              <p class="proof-quote">“I've never felt so accurately described by anything in my life. It was like someone finally saw me.”</p>
              <p class="proof-name">— Noah V., Melbourne</p>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="proof-card">
              <div class="proof-image-wrapper">
                <img src="{{ asset('imgs/avatar/mia.png') }}" alt="Cosmic reading testimonial" class="proof-image mb-3">
              </div>
              <p class="proof-quote">“I was sceptical but curious. The reading knew things about me I had never told anyone.”</p>
              <p class="proof-name">— Mia L., Toronto</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push('scripts')
  <script>
    window.COSMIC_SOCIAL_PROOF = {
      enabled: true,
      mode: 'quiz',
      visibleMs: 5000,
      minDelayMs: 5000,
      maxDelayMs: 30000,
    };
  </script>
@endpush
