@extends('layouts.app')

@section('title', 'Cosmic Life Path Reading')

@php
  $signSvgs = [
    'Aries' => <<<'SVG'
    <svg viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
      <defs>
        <filter id="gA" x="-60%" y="-60%" width="220%" height="220%">
          <feGaussianBlur in="SourceGraphic" stdDeviation="2.8" result="b"/>
          <feMerge><feMergeNode in="b"/><feMergeNode in="SourceGraphic"/></feMerge>
        </filter>
        <radialGradient id="blA" cx="50%" cy="50%" r="50%">
          <stop offset="0%" stop-color="rgba(210,220,255,0.18)"/>
          <stop offset="100%" stop-color="transparent"/>
        </radialGradient>
      </defs>
      <ellipse cx="40" cy="40" rx="32" ry="32" fill="url(#blA)"/>
      <g filter="url(#gA)">
        <line x1="40" y1="55" x2="40" y2="36" stroke="white" stroke-width="2" stroke-linecap="round"/>
        <path d="M40 36 Q32 24 26 30 Q20 38 28 42" stroke="white" stroke-width="2.2" stroke-linecap="round" fill="none"/>
        <path d="M40 36 Q48 24 54 30 Q60 38 52 42" stroke="white" stroke-width="2.2" stroke-linecap="round" fill="none"/>
      </g>
    </svg>
    SVG,
    'Taurus' => <<<'SVG'
    <svg viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
      <defs>
        <filter id="gT" x="-60%" y="-60%" width="220%" height="220%">
          <feGaussianBlur in="SourceGraphic" stdDeviation="2.8" result="b"/>
          <feMerge><feMergeNode in="b"/><feMergeNode in="SourceGraphic"/></feMerge>
        </filter>
        <radialGradient id="blT" cx="50%" cy="55%" r="45%">
          <stop offset="0%" stop-color="rgba(210,220,255,0.18)"/>
          <stop offset="100%" stop-color="transparent"/>
        </radialGradient>
      </defs>
      <ellipse cx="40" cy="44" rx="30" ry="30" fill="url(#blT)"/>
      <g filter="url(#gT)">
        <circle cx="40" cy="46" r="16" stroke="white" stroke-width="2.2" fill="none"/>
        <path d="M24 38 Q24 28 32 26 Q40 24 40 30" stroke="white" stroke-width="2.2" stroke-linecap="round" fill="none"/>
        <path d="M56 38 Q56 28 48 26 Q40 24 40 30" stroke="white" stroke-width="2.2" stroke-linecap="round" fill="none"/>
      </g>
    </svg>
    SVG,
    'Gemini' => <<<'SVG'
    <svg viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
      <defs>
        <filter id="gG" x="-60%" y="-60%" width="220%" height="220%">
          <feGaussianBlur in="SourceGraphic" stdDeviation="2.8" result="b"/>
          <feMerge><feMergeNode in="b"/><feMergeNode in="SourceGraphic"/></feMerge>
        </filter>
        <radialGradient id="blG" cx="50%" cy="50%" r="45%">
          <stop offset="0%" stop-color="rgba(210,220,255,0.18)"/>
          <stop offset="100%" stop-color="transparent"/>
        </radialGradient>
      </defs>
      <ellipse cx="40" cy="40" rx="30" ry="30" fill="url(#blG)"/>
      <g filter="url(#gG)">
        <line x1="30" y1="20" x2="30" y2="60" stroke="white" stroke-width="2.2" stroke-linecap="round"/>
        <line x1="50" y1="20" x2="50" y2="60" stroke="white" stroke-width="2.2" stroke-linecap="round"/>
        <path d="M24 20 Q32 26 40 20 Q48 14 56 20" stroke="white" stroke-width="2" stroke-linecap="round" fill="none"/>
        <path d="M24 60 Q32 54 40 60 Q48 66 56 60" stroke="white" stroke-width="2" stroke-linecap="round" fill="none"/>
      </g>
    </svg>
    SVG,
    'Cancer' => <<<'SVG'
    <svg viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
      <defs>
        <filter id="gC" x="-60%" y="-60%" width="220%" height="220%">
          <feGaussianBlur in="SourceGraphic" stdDeviation="2.8" result="b"/>
          <feMerge><feMergeNode in="b"/><feMergeNode in="SourceGraphic"/></feMerge>
        </filter>
        <radialGradient id="blC" cx="50%" cy="50%" r="45%">
          <stop offset="0%" stop-color="rgba(210,220,255,0.18)"/>
          <stop offset="100%" stop-color="transparent"/>
        </radialGradient>
      </defs>
      <ellipse cx="40" cy="40" rx="30" ry="30" fill="url(#blC)"/>
      <g filter="url(#gC)">
        <path d="M46 28 Q56 28 58 36 Q60 46 50 46 Q44 46 44 40" stroke="white" stroke-width="2.2" stroke-linecap="round" fill="none"/>
        <path d="M34 52 Q24 52 22 44 Q20 34 30 34 Q36 34 36 40" stroke="white" stroke-width="2.2" stroke-linecap="round" fill="none"/>
        <circle cx="46" cy="26" r="3.5" stroke="white" stroke-width="2" fill="none"/>
        <circle cx="34" cy="54" r="3.5" stroke="white" stroke-width="2" fill="none"/>
      </g>
    </svg>
    SVG,
    'Leo' => <<<'SVG'
    <svg viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
      <defs>
        <filter id="gL" x="-60%" y="-60%" width="220%" height="220%">
          <feGaussianBlur in="SourceGraphic" stdDeviation="2.8" result="b"/>
          <feMerge><feMergeNode in="b"/><feMergeNode in="SourceGraphic"/></feMerge>
        </filter>
        <radialGradient id="blL" cx="50%" cy="50%" r="45%">
          <stop offset="0%" stop-color="rgba(210,220,255,0.18)"/>
          <stop offset="100%" stop-color="transparent"/>
        </radialGradient>
      </defs>
      <ellipse cx="40" cy="40" rx="30" ry="30" fill="url(#blL)"/>
      <g filter="url(#gL)">
        <circle cx="32" cy="34" r="10" stroke="white" stroke-width="2.2" fill="none"/>
        <path d="M42 34 Q50 34 52 44 Q54 52 50 56 Q46 60 44 56" stroke="white" stroke-width="2.2" stroke-linecap="round" fill="none"/>
        <path d="M44 56 Q42 62 46 64" stroke="white" stroke-width="2" stroke-linecap="round" fill="none"/>
      </g>
    </svg>
    SVG,
    'Virgo' => <<<'SVG'
    <svg viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
      <defs>
        <filter id="gV" x="-60%" y="-60%" width="220%" height="220%">
          <feGaussianBlur in="SourceGraphic" stdDeviation="2.8" result="b"/>
          <feMerge><feMergeNode in="b"/><feMergeNode in="SourceGraphic"/></feMerge>
        </filter>
        <radialGradient id="blV" cx="50%" cy="50%" r="45%">
          <stop offset="0%" stop-color="rgba(210,220,255,0.18)"/>
          <stop offset="100%" stop-color="transparent"/>
        </radialGradient>
      </defs>
      <ellipse cx="40" cy="40" rx="30" ry="30" fill="url(#blV)"/>
      <g filter="url(#gV)">
        <line x1="20" y1="28" x2="20" y2="56" stroke="white" stroke-width="2.2" stroke-linecap="round"/>
        <path d="M20 28 Q20 18 28 18 Q36 18 36 28 L36 56" stroke="white" stroke-width="2.2" fill="none" stroke-linecap="round"/>
        <path d="M36 28 Q36 18 44 18 Q52 18 52 28 L52 48 Q52 58 60 58 Q63 58 63 55" stroke="white" stroke-width="2.2" fill="none" stroke-linecap="round"/>
      </g>
    </svg>
    SVG,
    'Libra' => <<<'SVG'
    <svg viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
      <defs>
        <filter id="gLi" x="-60%" y="-60%" width="220%" height="220%">
          <feGaussianBlur in="SourceGraphic" stdDeviation="2.8" result="b"/>
          <feMerge><feMergeNode in="b"/><feMergeNode in="SourceGraphic"/></feMerge>
        </filter>
        <radialGradient id="blLi" cx="50%" cy="50%" r="45%">
          <stop offset="0%" stop-color="rgba(210,220,255,0.18)"/>
          <stop offset="100%" stop-color="transparent"/>
        </radialGradient>
      </defs>
      <ellipse cx="40" cy="40" rx="30" ry="30" fill="url(#blLi)"/>
      <g filter="url(#gLi)">
        <line x1="18" y1="52" x2="62" y2="52" stroke="white" stroke-width="2.2" stroke-linecap="round"/>
        <line x1="18" y1="62" x2="62" y2="62" stroke="white" stroke-width="2" stroke-linecap="round" opacity="0.6"/>
        <path d="M22 52 Q40 36 58 52" stroke="white" stroke-width="2.2" stroke-linecap="round" fill="none"/>
      </g>
    </svg>
    SVG,
    'Scorpio' => <<<'SVG'
    <svg viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
      <defs>
        <filter id="gSc" x="-60%" y="-60%" width="220%" height="220%">
          <feGaussianBlur in="SourceGraphic" stdDeviation="2.8" result="b"/>
          <feMerge><feMergeNode in="b"/><feMergeNode in="SourceGraphic"/></feMerge>
        </filter>
        <radialGradient id="blSc" cx="50%" cy="50%" r="45%">
          <stop offset="0%" stop-color="rgba(210,220,255,0.18)"/>
          <stop offset="100%" stop-color="transparent"/>
        </radialGradient>
      </defs>
      <ellipse cx="40" cy="40" rx="30" ry="30" fill="url(#blSc)"/>
      <g filter="url(#gSc)">
        <line x1="18" y1="28" x2="18" y2="52" stroke="white" stroke-width="2.2" stroke-linecap="round"/>
        <path d="M18 28 Q18 18 26 18 Q34 18 34 28 L34 52" stroke="white" stroke-width="2.2" fill="none" stroke-linecap="round"/>
        <path d="M34 28 Q34 18 42 18 Q50 18 50 28 L50 50" stroke="white" stroke-width="2.2" fill="none" stroke-linecap="round"/>
        <path d="M50 50 Q56 50 58 44 L62 39" stroke="white" stroke-width="2.2" fill="none" stroke-linecap="round"/>
        <path d="M62 39 L56 37" stroke="white" stroke-width="2.2" stroke-linecap="round"/>
        <path d="M62 39 L60 45" stroke="white" stroke-width="2.2" stroke-linecap="round"/>
      </g>
    </svg>
    SVG,
    'Sagittarius' => <<<'SVG'
    <svg viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
      <defs>
        <filter id="gSa" x="-60%" y="-60%" width="220%" height="220%">
          <feGaussianBlur in="SourceGraphic" stdDeviation="2.8" result="b"/>
          <feMerge><feMergeNode in="b"/><feMergeNode in="SourceGraphic"/></feMerge>
        </filter>
        <radialGradient id="blSa" cx="50%" cy="50%" r="45%">
          <stop offset="0%" stop-color="rgba(210,220,255,0.18)"/>
          <stop offset="100%" stop-color="transparent"/>
        </radialGradient>
      </defs>
      <ellipse cx="40" cy="40" rx="30" ry="30" fill="url(#blSa)"/>
      <g filter="url(#gSa)">
        <line x1="40" y1="62" x2="40" y2="18" stroke="white" stroke-width="2.2" stroke-linecap="round"/>
        <path d="M40 18 L28 30" stroke="white" stroke-width="2.2" stroke-linecap="round"/>
        <path d="M40 18 L52 30" stroke="white" stroke-width="2.2" stroke-linecap="round"/>
        <line x1="26" y1="40" x2="54" y2="40" stroke="white" stroke-width="2" stroke-linecap="round"/>
      </g>
    </svg>
    SVG,
    'Capricorn' => <<<'SVG'
    <svg viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
      <defs>
        <filter id="gCp" x="-60%" y="-60%" width="220%" height="220%">
          <feGaussianBlur in="SourceGraphic" stdDeviation="2.8" result="b"/>
          <feMerge><feMergeNode in="b"/><feMergeNode in="SourceGraphic"/></feMerge>
        </filter>
        <radialGradient id="blCp" cx="50%" cy="50%" r="45%">
          <stop offset="0%" stop-color="rgba(210,220,255,0.18)"/>
          <stop offset="100%" stop-color="transparent"/>
        </radialGradient>
      </defs>
      <ellipse cx="40" cy="40" rx="30" ry="30" fill="url(#blCp)"/>
      <g filter="url(#gCp)">
        <path d="M22 22 Q22 14 30 14 Q38 14 38 24 L38 44" stroke="white" stroke-width="2.2" fill="none" stroke-linecap="round"/>
        <line x1="22" y1="22" x2="22" y2="50" stroke="white" stroke-width="2.2" stroke-linecap="round"/>
        <path d="M38 44 Q46 44 50 38 Q56 30 53 48 Q51 58 46 56 Q40 54 38 58" stroke="white" stroke-width="2.2" fill="none" stroke-linecap="round"/>
      </g>
    </svg>
    SVG,
    'Aquarius' => <<<'SVG'
    <svg viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
      <defs>
        <filter id="gAq" x="-60%" y="-60%" width="220%" height="220%">
          <feGaussianBlur in="SourceGraphic" stdDeviation="2.8" result="b"/>
          <feMerge><feMergeNode in="b"/><feMergeNode in="SourceGraphic"/></feMerge>
        </filter>
        <radialGradient id="blAq" cx="50%" cy="50%" r="45%">
          <stop offset="0%" stop-color="rgba(210,220,255,0.18)"/>
          <stop offset="100%" stop-color="transparent"/>
        </radialGradient>
      </defs>
      <ellipse cx="40" cy="40" rx="30" ry="30" fill="url(#blAq)"/>
      <g filter="url(#gAq)">
        <path d="M16 34 Q22 26 28 34 Q34 42 40 34 Q46 26 52 34 Q58 42 64 34" stroke="white" stroke-width="2.2" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M16 48 Q22 40 28 48 Q34 56 40 48 Q46 40 52 48 Q58 56 64 48" stroke="white" stroke-width="2.2" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
      </g>
    </svg>
    SVG,
    'Pisces' => <<<'SVG'
    <svg viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
      <defs>
        <filter id="gPs" x="-60%" y="-60%" width="220%" height="220%">
          <feGaussianBlur in="SourceGraphic" stdDeviation="2.8" result="b"/>
          <feMerge><feMergeNode in="b"/><feMergeNode in="SourceGraphic"/></feMerge>
        </filter>
        <radialGradient id="blPs" cx="50%" cy="50%" r="45%">
          <stop offset="0%" stop-color="rgba(210,220,255,0.18)"/>
          <stop offset="100%" stop-color="transparent"/>
        </radialGradient>
      </defs>
      <ellipse cx="40" cy="40" rx="30" ry="30" fill="url(#blPs)"/>
      <g filter="url(#gPs)">
        <path d="M28 18 Q14 26 14 40 Q14 54 28 62" stroke="white" stroke-width="2.2" fill="none" stroke-linecap="round"/>
        <path d="M52 18 Q66 26 66 40 Q66 54 52 62" stroke="white" stroke-width="2.2" fill="none" stroke-linecap="round"/>
        <line x1="18" y1="40" x2="62" y2="40" stroke="white" stroke-width="2" stroke-linecap="round"/>
      </g>
    </svg>
    SVG,
  ];
@endphp

@section('content')
<div class="landing-page">
  <section class="hero container">
    <div class="orrery">
      <div class="ring ring-1"><div class="ring-dot"></div></div>
      <div class="ring ring-2"><div class="ring-dot ring-dot-sm"></div></div>
      <div class="ring ring-3"><div class="ring-dot ring-dot-sm ring-dot-bottom"></div></div>
      <div class="ring ring-4"></div>
    </div>

    <p class="hero-eyebrow"><strong class="text-white"><i>Free</i></strong> Cosmic Life Path Reading</p>
    <h1 class="hero-title">Your Personalized <em>Cosmic Life Path Reading</em> Reveals Hidden Gifts, Talents... And Your Unique Divine Purpose In Life</h1>
    <!-- <p class="hero-sub">Reveals Hidden Gifts, Talents... And Your Unique Divine Purpose In Life</p> -->
    <!-- <a href="#zodiac" class="hero-cta btn">REVEAL MY COSMIC PATH →</a> -->
  </section>


  <section class="zodiac-section container" id="zodiac">
    <!-- <p class="section-label">THE TWELVE COSMIC SIGNS</p> -->
    <h2 class="section-title mb-4">Step #1: Select Your Star Sign Below for your <strong>FREE</strong><em> Cosmic Life Path</em> Reading</h2>
    

    <div class="row g-2 zodiac-grid">
      @php($signs = config('variables.signs'))
      @foreach ($signs as $sign)
        <div class="col-6 col-md-3 col-xl-2">
          <a href="{{ route('birthdate', ['sign' => strtolower($sign['name'])]) }}{{ $ext ? '?ext=' . $ext : '' }}" class="zodiac-card js-open-sign w-100 d-block text-decoration-none" data-sign-slug="{{ strtolower($sign['name']) }}">
            <div class="zodiac-icon" aria-hidden="true">{!! $signSvgs[$sign['name']] !!}</div>
            <p class="zodiac-dates">{{ $sign['dates'] }}</p>
            <h3 class="zodiac-name">{{ $sign['name'] }}</h3>
          </a>
        </div>
      @endforeach
    </div>
    <p class="section-desc mt-4"><span class="text-warning">⚠</span> Due to high demand, availability is limited. Select your sign now to secure your FREE reading.</p>
  </section>
</div>
@endsection


@push('scripts')
  <script>
    gtag('event', 'funnel_step_view', {
      funnel_name: 'horoscope_sales',
      step: 1,
      step_name: 'horoscope_select'
    });
  </script>
@endpush
