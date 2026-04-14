@extends('layouts.app')

@section('title', 'Your Reading Summary')

@section('content')
  <section class="step-section container">
    <div class="step-panel mx-auto text-center">
      <p class="section-label">Your Reading Is Ready</p>
      <h1 class="section-title step-title">{{ $name }}, your cosmic path has been revealed</h1>
      <p class="step-copy">Your personalized report has been prepared and can now continue using the details below.</p>

      <div class="row g-3 mt-4 text-start">
        <div class="col-md-6">
          <div class="proof-card h-100">
            <p class="proof-name">Name</p>
            <p class="proof-quote mb-0">{{ $name }}</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="proof-card h-100">
            <p class="proof-name">Email</p>
            <p class="proof-quote mb-0">{{ $email }}</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="proof-card h-100">
            <p class="proof-name">Star Sign</p>
            <p class="proof-quote mb-0">{{ $sign['label'] }}</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="proof-card h-100">
            <p class="proof-name">Birth Date</p>
            <p class="proof-quote mb-0">{{ $formattedDate }}</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="proof-card h-100">
            <p class="proof-name">Birth Time</p>
            <p class="proof-quote mb-0">{{ $formattedTime }}</p>
          </div>
        </div>
        <div class="col-12">
          <div class="proof-card h-100">
            <p class="proof-name">Place of Birth</p>
            <p class="proof-quote mb-0">{{ $birthPlace }}</p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
