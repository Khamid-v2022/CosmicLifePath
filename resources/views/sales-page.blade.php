@extends('layouts.app')

@section('title', 'Special Offer')

@section('content')
  <section class="step-section container">
    <div class="step-panel mx-auto">
      <p class="section-label text-center">Special Offer</p>
      <h1 class="section-title step-title text-center">{{ $name }}, your {{ $sign['label'] }} sun sign points to a rare window of clarity</h1>
      <p class="step-copy">This page is designed to help you go beyond the teaser and access a fuller interpretation of your path, gifts, and timing. Your current classification as <strong>{{ $sign['label'] }}</strong> already shapes the way this reading is being personalized for you.</p>

      <div class="row g-4 align-items-center mt-4">
        <div class="col-lg-6">
          <img src="{{ asset('imgs/sample-2.png') }}" alt="Cosmic sales illustration" class="img-fluid cosmic-result-image">
        </div>
        <div class="col-lg-6">
          <div class="proof-card h-100">
            <p class="proof-name">What the full product can help reveal</p>
            <ul class="cosmic-benefits mb-0">
              <li>A deeper interpretation of your {{ $sign['label'] }} strengths and hidden gifts</li>
              <li>Personal insights connected to your birth timing and direction in life</li>
              <li>Guidance on how to move through blocks and step into greater abundance</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="social-proof-wrap mt-5 text-center">
        <div class="trust-pill">Someone just purchased their full report</div>
        <div class="row g-3 mt-2">
          <div class="col-md-4">
            <div class="proof-card h-100">
              <p class="proof-quote">“The full report helped me make sense of a major turning point.”</p>
              <p class="proof-name">— Grace N.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="proof-card h-100">
              <p class="proof-quote">“I loved how personal it felt to my sign and life story.”</p>
              <p class="proof-name">— Ethan W.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="proof-card h-100">
              <p class="proof-quote">“This felt far more thoughtful than the usual astrology content online.”</p>
              <p class="proof-name">— Olivia K.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="text-center mt-5">
        <a href="https://www.google.com" target="_blank" rel="noopener noreferrer" class="hero-cta btn step-next-btn">Continue to Checkout</a>
      </div>
    </div>
  </section>
@endsection
