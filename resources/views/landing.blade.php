@extends('layouts.app')

@section('title', 'Cosmic Life Path Reading')

@php
  $signs = [
    ['name' => 'Aries', 'dates' => 'Mar 21 - Apr 19', 'element' => 'Fire · Cardinal', 'roman' => 'I', 'glyph' => '♈', 'desc' => 'The first sign of the zodiac, Aries embodies the primordial spark of creation. You are courageous and instinctual, driven to begin what others hesitate to start.'],
    ['name' => 'Taurus', 'dates' => 'Apr 20 - May 20', 'element' => 'Earth · Fixed', 'roman' => 'II', 'glyph' => '♉', 'desc' => 'Taurus transforms the material world into sanctuary. Patient and grounded, your path is cultivation, beauty, and steady growth.'],
    ['name' => 'Gemini', 'dates' => 'May 21 - Jun 20', 'element' => 'Air · Mutable', 'roman' => 'III', 'glyph' => '♊', 'desc' => 'Gemini is the cosmic connector. Curious and sharp, your life path unfolds through conversation, ideas, and meaningful exchange.'],
    ['name' => 'Cancer', 'dates' => 'Jun 21 - Jul 22', 'element' => 'Water · Cardinal', 'roman' => 'IV', 'glyph' => '♋', 'desc' => 'Cancer protects what is sacred. Guided by intuition and emotional intelligence, your strength is deep care and resilient tenderness.'],
    ['name' => 'Leo', 'dates' => 'Jul 23 - Aug 22', 'element' => 'Fire · Fixed', 'roman' => 'V', 'glyph' => '♌', 'desc' => 'Leo radiates creative fire. Your soul path invites bold self-expression, generous leadership, and heart-centered courage.'],
    ['name' => 'Virgo', 'dates' => 'Aug 23 - Sep 22', 'element' => 'Earth · Mutable', 'roman' => 'VI', 'glyph' => '♍', 'desc' => 'Virgo sees detail as devotion. Your path is refinement, service, and turning complexity into clarity.'],
    ['name' => 'Libra', 'dates' => 'Sep 23 - Oct 22', 'element' => 'Air · Cardinal', 'roman' => 'VII', 'glyph' => '♎', 'desc' => 'Libra pursues harmony with precision. You are drawn to balance, fairness, and relational wisdom.'],
    ['name' => 'Scorpio', 'dates' => 'Oct 23 - Nov 21', 'element' => 'Water · Fixed', 'roman' => 'VIII', 'glyph' => '♏', 'desc' => 'Scorpio is transformation incarnate. Your path moves through depth, truth, and powerful renewal.'],
    ['name' => 'Sagittarius', 'dates' => 'Nov 22 - Dec 21', 'element' => 'Fire · Mutable', 'roman' => 'IX', 'glyph' => '♐', 'desc' => 'Sagittarius seeks meaning beyond boundaries. Your life path is exploration, philosophy, and expansion.'],
    ['name' => 'Capricorn', 'dates' => 'Dec 22 - Jan 19', 'element' => 'Earth · Cardinal', 'roman' => 'X', 'glyph' => '♑', 'desc' => 'Capricorn builds what lasts. Your path is discipline, mastery, and purpose shaped over time.'],
    ['name' => 'Aquarius', 'dates' => 'Jan 20 - Feb 18', 'element' => 'Air · Fixed', 'roman' => 'XI', 'glyph' => '♒', 'desc' => 'Aquarius carries the future signal. Your path is innovation, community, and visionary thinking.'],
    ['name' => 'Pisces', 'dates' => 'Feb 19 - Mar 20', 'element' => 'Water · Mutable', 'roman' => 'XII', 'glyph' => '♓', 'desc' => 'Pisces dissolves the boundary between self and cosmos. Your path is compassion, imagination, and spiritual flow.'],
  ];

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
  <section class="hero container-fluid">
    <div class="orrery">
      <div class="ring ring-1"><div class="ring-dot"></div></div>
      <div class="ring ring-2"><div class="ring-dot ring-dot-sm"></div></div>
      <div class="ring ring-3"><div class="ring-dot ring-dot-sm ring-dot-bottom"></div></div>
      <div class="ring ring-4"></div>
    </div>

    <p class="hero-eyebrow">FREE PERSONALISED READING</p>
    <h1 class="hero-title">Discover Your<br><em>Cosmic Life Path</em></h1>
    <p class="hero-sub">Uncover the hidden gifts, secret talents, and divine purpose the cosmos encoded into you the moment you were born</p>
    <a href="#zodiac" class="hero-cta btn">REVEAL MY COSMIC PATH →</a>
  </section>

  <div class="divider container-fluid">
    <div class="divider-line"></div>
    <span class="divider-glyph">✦</span>
    <div class="divider-line"></div>
  </div>

  <section class="zodiac-section container" id="zodiac">
    <p class="section-label">THE TWELVE COSMIC SIGNS</p>
    <h2 class="section-title mb-5">Step #1:<em> Select Your Star Sign Below</em></h2>
    

    <div class="row g-2 zodiac-grid">
      @foreach ($signs as $sign)
        <div class="col-6 col-md-4 col-xl-3">
          <a href="{{ route('birthdate', ['sign' => strtolower($sign['name'])]) }}" class="zodiac-card js-open-sign w-100 d-block text-decoration-none" data-sign-slug="{{ strtolower($sign['name']) }}">
            <!-- <span class="bg-num">{{ $sign['roman'] }}</span> -->
            <div class="zodiac-icon" aria-hidden="true">{!! $signSvgs[$sign['name']] !!}</div>
            <p class="zodiac-dates">{{ $sign['dates'] }}</p>
            <h3 class="zodiac-name">{{ $sign['name'] }}</h3>
            <!-- <p class="zodiac-element">{{ $sign['element'] }}</p> -->
          </a>
        </div>
      @endforeach
    </div>
    <p class="section-desc mt-4"><span class="text-warning">⚠</span> Due to high demand, availability is limited. Select your sign now to secure your FREE reading.</p>
  </section>
@endsection
