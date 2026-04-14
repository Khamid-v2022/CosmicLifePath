@extends('layouts.app')

@section('title', 'Generating Your Reading')

@section('content')
  <section class="step-section container">
    <div class="step-panel mx-auto text-center loading-panel">
      <div id="loadingStage" class="reading-stage reading-stage-active">
        <h1 class="section-title step-title mb-3">Please Don't Close This Page, {{ $name }}...<br>Your Cosmic Life Path Reading Is Being Generated Right Now.</h1>

        <div class="spinner-image-wrap my-4">
          <img src="{{ asset('imgs/spinner.png') }}" alt="Generating your cosmic reading" class="spinner-image mx-auto">
        </div>

        <p class="loading-subtext">Mapping your cosmic energy patterns...</p>
      </div>

      <div id="videoStage" class="reading-stage video-stage-panel" aria-hidden="true">
        <p class="section-label">Your Reading Is Ready</p>
        <h2 class="section-title step-title mb-3">{{ $name }}, your personalized cosmic video is now ready</h2>
        <p class="step-copy">We have aligned your sign, birth date, time, and place into your reading.</p>

        <div class="ratio ratio-16x9 cosmic-video-frame mt-4">
          @if ($videoUrl)
            <iframe src="{{ $videoUrl }}" title="Cosmic Life Path Reading Video" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
          @else
            <div class="video-fallback d-flex flex-column justify-content-center align-items-center text-center">
              <h3 class="mb-2">Your video area is ready</h3>
              <p class="mb-0">Connect your final reading video URL to display the result video here.</p>
            </div>
          @endif
        </div>

        <div class="row g-3 mt-4 text-start">
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
    </div>
  </section>
@endsection

@push('scripts')
  <script>
    window.setTimeout(function () {
      const loadingStage = document.getElementById('loadingStage');
      const videoStage = document.getElementById('videoStage');

      if (!loadingStage || !videoStage) {
        return;
      }

      loadingStage.classList.remove('reading-stage-active');
      loadingStage.classList.add('reading-stage-fade-out');

      window.setTimeout(function () {
        loadingStage.style.display = 'none';
        videoStage.style.display = 'block';
        videoStage.setAttribute('aria-hidden', 'false');

        window.requestAnimationFrame(function () {
          videoStage.classList.add('reading-stage-active');
        });
      }, 650);
    }, 5000);
  </script>
@endpush
