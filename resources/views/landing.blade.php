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

  $signMap = [];
  foreach ($signs as $sign) {
    $signMap[$sign['name']] = [
      'dates' => strtoupper($sign['dates']),
      'element' => strtoupper($sign['element']),
      'desc' => $sign['desc'],
    ];
  }
@endphp

@section('content')
  <div class="cursor" id="cursor"></div>
  <div class="cursor-ring" id="cursorRing"></div>

  <canvas id="starCanvas"></canvas>

  <nav class="cosmic-nav navbar navbar-expand-lg fixed-top">
    <div class="container-fluid px-lg-5">
      <a class="nav-logo text-decoration-none" href="#">
        COSMIC LIFE
        <span>PATH READING</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#cosmicNav" aria-controls="cosmicNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="cosmicNav">
        <ul class="navbar-nav nav-links mb-0">
          <li class="nav-item"><a class="nav-link" href="#zodiac">Horoscope</a></li>
          <li class="nav-item"><a class="nav-link" href="#zodiac">Birth Chart</a></li>
          <li class="nav-item"><a class="nav-link" href="#zodiac">Transits</a></li>
          <li class="nav-item"><a class="nav-link" href="#zodiac">Readings</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="hero container-fluid">
    <div class="orrery">
      <div class="ring ring-1"><div class="ring-dot"></div></div>
      <div class="ring ring-2"><div class="ring-dot ring-dot-sm"></div></div>
      <div class="ring ring-3"><div class="ring-dot ring-dot-sm ring-dot-bottom"></div></div>
      <div class="ring ring-4"></div>
    </div>

    <p class="hero-eyebrow">The Language of the Stars</p>
    <h1 class="hero-title">Discover Your<br><em>Celestial Path</em></h1>
    <p class="hero-sub">Ancient wisdom encoded in the heavens. Explore your natal chart, planetary alignments, and the deeper patterns of your life.</p>
    <a href="#zodiac" class="hero-cta btn">Explore Your Sign</a>
  </section>

  <div class="divider container-fluid">
    <div class="divider-line"></div>
    <span class="divider-glyph">✦</span>
    <div class="divider-line"></div>
  </div>

  <section class="zodiac-section container" id="zodiac">
    <p class="section-label">The Twelve Archetypes</p>
    <h2 class="section-title">Select Your <em>Zodiac Sign</em></h2>
    <p class="section-desc"></p>

    <div class="row g-2 zodiac-grid">
      @foreach ($signs as $sign)
        <div class="col-6 col-md-4 col-xl-3">
          <button type="button" class="zodiac-card js-open-sign w-100" data-sign="{{ $sign['name'] }}">
            <span class="bg-num">{{ $sign['roman'] }}</span>
            <div class="zodiac-icon" aria-hidden="true">{{ $sign['glyph'] }}</div>
            <p class="zodiac-dates">{{ $sign['dates'] }}</p>
            <h3 class="zodiac-name">{{ $sign['name'] }}</h3>
            <p class="zodiac-element">{{ $sign['element'] }}</p>
          </button>
        </div>
      @endforeach
    </div>
  </section>

  <footer class="footer-strip container-fluid">
    <p class="footer-quote">As above, so below. The cosmos speaks in patterns, and every birth moment opens a different path.</p>
    <p class="footer-copy">© 2026 COSMIC LIFE PATH READING<br>ALL RIGHTS RESERVED</p>
  </footer>

  <div id="modal" class="cosmic-modal" aria-hidden="true">
    <div class="cosmic-modal-panel">
      <button type="button" class="cosmic-modal-close" id="closeModal" aria-label="Close">✕</button>
      <p id="modal-dates" class="cosmic-modal-dates"></p>
      <h2 id="modal-name" class="cosmic-modal-name"></h2>
      <p id="modal-element" class="cosmic-modal-element"></p>
      <p id="modal-desc" class="cosmic-modal-desc"></p>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    window.COSMIC_SIGNS = @json($signMap);
  </script>
  <script src="{{ asset('js/landing.js') }}"></script>
@endpush
