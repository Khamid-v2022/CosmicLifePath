@extends('layouts.app')

@section('title', 'Generating Your Reading')

@section('content')
  <section class="small-gap-start step-section container">
    
    <div id="loadingStage" class="reading-stage reading-stage-active text-center">
      <h2 class="section-title step-title mb-3">Please Don't Close This Page{{ $name ? ", " . $name : '' }}...</h2>
      <p class="step-copy mb-0">Your Cosmic Life Path Reading Is Being Generated Right Now.</p>

      <div class="spinner-image-wrap my-4">
        <img src="{{ asset('imgs/spinner.png') }}" alt="Generating your cosmic reading" class="spinner-image mx-auto">
      </div>

      <p class="loading-subtext">Mapping your cosmic energy patterns...</p>
    </div>

    <div id="videoStage" class="step-panel reading-stage video-stage-panel mx-auto text-center loading-panel" aria-hidden="true">
      <div class="">
        <div class="result-intro-copy">
          <h2 class="mb-2 section-title">Your reading is almost ready{{ $name ? ", " . $name : '' }}...</h2>
          <p class="step-copy mb-0">What she's uncovered about you is extraordinary — knowing who she is will make every word of it more powerful.</p>
        </div>

        <div class="video-intro-wrap mt-4">
          <p class="section-label mb-2">Meet Celestra Vonn</p>

          <div class="cosmic-video-frame video-thumbnail-frame position-relative mt-3">
            <div id="vidalytics_embed_wJVfmwAQT5Xg8A1J" style="width: 100%; position:relative; padding-top: 56.25%;"></div>
          </div>

          <!-- <p class="loading-subtext mt-3">Watch this before viewing your results — and discover how Celestra can help you.</p> -->

          <div class="text-center mt-4">
            <form id="summaryForm" method="POST" action="{{ route('reading.summary', ['sign' => strtolower($birth['sign_slug'])]) }}" style="display: none;">
              @csrf
              <!-- Hidden fields to persist birth data -->
              <input type="hidden" name="birth_sign_slug" value="{{ $birth['sign_slug'] }}">
              <input type="hidden" name="birth_month" value="{{ $birth['month'] }}">
              <input type="hidden" name="birth_day" value="{{ $birth['day'] }}">
              <input type="hidden" name="birth_year" value="{{ $birth['year'] }}">
              <input type="hidden" name="birth_formatted_date" value="{{ $birth['formatted_date'] }}">
              <input type="hidden" name="birth_hour" value="{{ $birth['hour'] }}">
              <input type="hidden" name="birth_minute" value="{{ $birth['minute'] }}">
              <input type="hidden" name="birth_meridiem" value="{{ $birth['meridiem'] }}">
              <input type="hidden" name="birth_time_unknown" value="{{ $birth['time_unknown'] ? '1' : '0' }}">
              <input type="hidden" name="birth_place" value="{{ $birth['birth_place'] }}">
              <input type="hidden" name="birth_place_unknown" value="{{ $birth['place_unknown'] ? '1' : '0' }}">
              <!-- Hidden fields to persist contact data -->
              <input type="hidden" name="contact_name" value="{{ $name ?? null }}">
              <input type="hidden" name="ext" value="{{ $ext }}">
            </form>
            <div class="text-center d-flex justify-content-center">
              <a href="#" id="showReadingButton" class="hero-cta btn d-none d-flex align-items-center justify-content-center"><span class="d-flex">✨</span>Show Me My Cosmic Life Path Reading<span class="d-flex">✨</span></a>
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
      mode: 'purchase',
      visibleMs: 5000,
      minDelayMs: 5000,
      maxDelayMs: 20000,
    };

    (function (v, i, d, a, l, y, t, c, s) {
        y='_'+d.toLowerCase();c=d+'L';if(!v[d]){v[d]={};}if(!v[c]){v[c]={};}if(!v[y]){v[y]={};}var vl='Loader',vli=v[y][vl],vsl=v[c][vl + 'Script'],vlf=v[c][vl + 'Loaded'],ve='Embed';
        if (!vsl){vsl=function(u,cb){
            if(t){cb();return;}s=i.createElement("script");s.type="text/javascript";s.async=1;s.src=u;
            if(s.readyState){s.onreadystatechange=function(){if(s.readyState==="loaded"||s.readyState=="complete"){s.onreadystatechange=null;vlf=1;cb();}};}else{s.onload=function(){vlf=1;cb();};}
            i.getElementsByTagName("head")[0].appendChild(s);
        };}
        vsl(l+'loader.min.js',function(){if(!vli){var vlc=v[c][vl];vli=new vlc();}vli.loadScript(l+'player.min.js',function(){var vec=v[d][ve];t=new vec();t.run(a);});});
    })(window, document, 'Vidalytics', 'vidalytics_embed_wJVfmwAQT5Xg8A1J', 'https://fast.vidalytics.com/embeds/x4wjDf3w/wJVfmwAQT5Xg8A1J/');


    const loadingStage = document.getElementById('loadingStage');
    const videoStage = document.getElementById('videoStage');

    // const playButton = document.getElementById('playVideoButton');
    // const thumbnailOverlay = document.getElementById('videoThumbnailOverlay');
    // const videoEmbedWrap = document.getElementById('videoEmbedWrap');
    // const videoFrame = document.getElementById('celestraVideoFrame');

    const showReadingButton = document.getElementById('showReadingButton');
    const summaryForm = document.getElementById('summaryForm');
    let transitionStarted = false;

    function redirectToResults() {
      if (transitionStarted || !videoStage || !summaryForm) {
        return;
      }

      transitionStarted = true;
      videoStage.classList.remove('reading-stage-active');
      videoStage.classList.add('reading-stage-fade-out');

      window.setTimeout(function () {
        summaryForm.submit();
      }, 650);
    }

    function beginVideoSequence() {
      if (showReadingButton) {
        window.setTimeout(function () {
          showReadingButton.classList.remove('d-none');
        }, 20000);
      }

      // window.setTimeout(function () {
      //   redirectToResults();
      // }, 300000);
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

    // if (playButton && thumbnailOverlay && videoEmbedWrap && videoFrame) {
    //   playButton.addEventListener('click', function () {
    //     const src = videoFrame.dataset.src;
    //     if (src) {
    //       videoFrame.src = src;
    //     }
    //     thumbnailOverlay.classList.add('d-none');
    //     videoEmbedWrap.classList.remove('d-none');
    //   });
    // }
  </script>
@endpush
