@extends('layouts.app')

@section('title', 'Generating Your Reading')

@section('content')
  <section class="small-gap-start step-section container">
    
    <div id="loadingStage" class="reading-stage reading-stage-active text-center">
      <h2 class="section-title step-title mb-3">Please Don't Close This Page, {{ $name }}...</h2>
      <p class="step-copy mb-0">Your Cosmic Life Path Reading Is Being Generated Right Now.</p>

      <div class="spinner-image-wrap my-4">
        <img src="{{ asset('imgs/spinner.png') }}" alt="Generating your cosmic reading" class="spinner-image mx-auto">
      </div>

      <p class="loading-subtext">Mapping your cosmic energy patterns...</p>
    </div>

    <div id="videoStage" class="step-panel reading-stage video-stage-panel mx-auto text-center loading-panel" aria-hidden="true">
      <div class="">
        <div class="result-intro-copy">
          <h2 class="mb-2 section-title">Your reading is almost ready, {{ $name }}...</h2>
          <p class="step-copy mb-0">What she's uncovered about you is extraordinary — knowing who she is will make every word of it more powerful.</p>
        </div>

        <div class="video-intro-wrap mt-4">
          <p class="section-label mb-2">Meet Celestra Vonn</p>

          <div class="cosmic-video-frame video-thumbnail-frame position-relative mt-3">
            @if ($videoUrl)
              <div id="videoThumbnailOverlay" class="video-thumbnail-overlay">
                <img src="{{ asset('imgs/thumnail.jpg') }}" alt="Celestra Vonn video thumbnail" class="video-thumbnail-img">
                <button type="button" id="playVideoButton" class="video-play-button" aria-label="Play video">
                  <span class="video-play-triangle"></span>
                </button>
              </div>
              <div id="videoEmbedWrap" class="ratio ratio-16x9 d-none">
                <iframe id="celestraVideoFrame" src="" data-src="{{ $videoUrl }}" title="Celestra Vonn Introduction Video" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
              </div>
            @else
              <div class="video-thumbnail-overlay">
                <img src="{{ asset('imgs/thumnail.jpg') }}" alt="Celestra Vonn video thumbnail" class="video-thumbnail-img">
                <button type="button" id="playVideoButton" class="video-play-button" aria-label="Play video">
                  <span class="video-play-triangle"></span>
                </button>
              </div>
            @endif
          </div>

          <!-- <p class="loading-subtext mt-3">Watch this before viewing your results — and discover how Celestra can help you.</p> -->

          <div class="text-center mt-4">
            <a href="{{ route('reading.summary') }}" id="showReadingButton" class="hero-cta btn d-none">Show Me My Cosmic Life Path Reading</a>
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
      mode: 'purchase',
      visibleMs: 5000,
      minDelayMs: 5000,
      maxDelayMs: 30000,
    };

    const loadingStage = document.getElementById('loadingStage');
    const videoStage = document.getElementById('videoStage');
    const playButton = document.getElementById('playVideoButton');
    const thumbnailOverlay = document.getElementById('videoThumbnailOverlay');
    const videoEmbedWrap = document.getElementById('videoEmbedWrap');
    const videoFrame = document.getElementById('celestraVideoFrame');
    const showReadingButton = document.getElementById('showReadingButton');
    const targetUrl = @json(route('reading.summary'));
    let transitionStarted = false;

    function redirectToResults() {
      if (transitionStarted || !videoStage) {
        return;
      }

      transitionStarted = true;
      videoStage.classList.remove('reading-stage-active');
      videoStage.classList.add('reading-stage-fade-out');

      window.setTimeout(function () {
        window.location.href = targetUrl;
      }, 650);
    }

    function beginVideoSequence() {
      if (showReadingButton) {
        window.setTimeout(function () {
          showReadingButton.classList.remove('d-none');
        }, 90000);
      }

      window.setTimeout(function () {
        redirectToResults();
      }, 300000);
    }

    window.setTimeout(function () {
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
          beginVideoSequence();
        });
      }, 650);
    }, 5000);

    if (showReadingButton) {
      showReadingButton.addEventListener('click', function (event) {
        event.preventDefault();
        redirectToResults();
      });
    }

    if (playButton && thumbnailOverlay && videoEmbedWrap && videoFrame) {
      playButton.addEventListener('click', function () {
        const src = videoFrame.dataset.src;
        if (src) {
          videoFrame.src = src;
        }
        thumbnailOverlay.classList.add('d-none');
        videoEmbedWrap.classList.remove('d-none');
      });
    }
  </script>
@endpush
