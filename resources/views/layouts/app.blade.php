<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Cosmic Life Path Reading')</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Cinzel:wght@400;600&family=Lato:wght@300;400&family=Cinzel+Decorative:wght@400;700&family=Cinzel:wght@400;500;600;700&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
  <link rel="icon" href="{{ asset('imgs/favicon.png') }}" type="image/x-icon">
  
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}?v={{ filemtime(public_path('css/custom.css')) }}">

  <script>
    window.clickbank = {
      vendor: "clifepath"
    }
  </script>
  <script src="https://scripts.clickbank.net/hop.min.js" defer></script>

  <link rel="stylesheet" href="{{ asset('css/cookie-consent.css') }}?v={{ filemtime(public_path('css/cookie-consent.css')) }}">

  {{-- Consent Mode v2 defaults. Nothing is granted until the visitor chooses. --}}
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('consent', 'default', {
      ad_storage: 'denied',
      ad_user_data: 'denied',
      ad_personalization: 'denied',
      analytics_storage: 'denied',
      functionality_storage: 'granted',
      security_storage: 'granted',
      wait_for_update: 500
    });
  </script>

  {{--
    GA4, Microsoft Clarity and the Meta Pixel are loaded by this script, and
    only after the matching consent. Meta is requested on the homepage only.
  --}}
  <script>
    window.CLP_CONSENT_CONFIG = {
      ga4Id: @json(config('app.ga4_id')),
      clarityId: @json(config('app.clarity_id')),
      metaPixelId: @json(config('app.meta_pixel_id')),
      metaPixelEnabled: @json(request()->routeIs('landing'))
    };
  </script>
  <script src="{{ asset('js/cookie-consent.js') }}?v={{ filemtime(public_path('js/cookie-consent.js')) }}"></script>

  @stack('head')
</head>
<body class="cosmic-body">
  <canvas id="starCanvas"></canvas>

  @unless (View::hasSection('hideHeader'))
    @include('layouts.partials.header')
  @endunless

  @php
    $flowProgress = trim($__env->yieldContent('flowProgress'));
  @endphp
  @if($flowProgress !== '')
    <div class="cosmic-flow-progress" aria-hidden="true">
      <div class="cosmic-flow-progress__track">
        <div
          id="cosmicFlowProgressBar"
          class="cosmic-flow-progress__fill"
          style="width: {{ (float) $flowProgress }}%"
           aria-valuenow="25"
        ></div>
      </div>
    </div>
    <script>
      window.COSMIC_FLOW_PROGRESS_INITIAL = {{ (float) $flowProgress }};
    </script>
  @endif

  <main>
    @yield('content')
  </main>

  @unless (View::hasSection('hideFooter'))
    @include('layouts.partials.footer')
  @endunless

  @include('layouts.partials.cookie-consent')

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  @stack('scripts')
  <script src="{{ asset('js/landing.js') }}"></script>
</body>
</html>
