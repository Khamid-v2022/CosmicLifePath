@extends('layouts.app')

@section('title', 'Step #4 - Reading Summary')

@section('content')
  <section class="step-section container">
    <div class="step-panel mx-auto text-center">
      <p class="section-label">Step #4</p>
      <h1 class="section-title step-title">Your cosmic details have been captured</h1>
      <p class="step-copy">Star sign: <strong>{{ $sign['label'] }}</strong></p>
      <p class="step-copy">Date of birth: <strong>{{ $formattedDate }}</strong></p>
      <p class="step-copy">Time of birth: <strong>{{ $formattedTime }}</strong></p>
      <p class="step-copy">Place of birth: <strong>{{ $birthPlace }}</strong></p>

      <div class="proof-card summary-card mt-4">
        <p class="proof-quote">Your next reading step is now ready to be expanded with deeper personality and destiny insights.</p>
      </div>

      <div class="d-flex justify-content-center gap-3 flex-wrap mt-4">
        <a href="{{ route('landing') }}" class="hero-cta btn">Back to Start</a>
      </div>
    </div>
  </section>
@endsection
