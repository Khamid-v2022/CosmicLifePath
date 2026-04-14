@extends('layouts.app')

@section('title', 'Generating Your Reading')

@section('content')
  <section class="step-section container">
    <div class="step-panel mx-auto text-center loading-panel">
      <div class="cosmic-loader mx-auto mb-4"></div>
      <p class="section-label">Analyzing your report...</p>
      <h1 class="section-title step-title">Please wait while your cosmic life path reading is generated</h1>
      <p class="step-copy">We are aligning your sign, birth date, and personal details to prepare your personalized reading.</p>
    </div>
  </section>
@endsection

@push('scripts')
  <script>
    window.setTimeout(function () {
      window.location.href = @json(route('reading.summary'));
    }, 5000);
  </script>
@endpush
