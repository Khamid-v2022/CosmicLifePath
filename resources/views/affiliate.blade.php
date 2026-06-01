@extends('layouts.app')
@section('title', 'Affiliate')
@push('head')
    <link rel="stylesheet" href="{{ asset('css/affiliate.css') }}?v={{ filemtime(public_path('css/affiliate.css')) }}">
@endpush

@section('content')
    <!-- HERO -->
<div class="hero">
  <div class="eyebrow">Affiliate Resource Centre</div>
  <h1>Welcome to<br><em>Cosmic Life Path Reading</em></h1>
  <p class="hero-sub">Presented by Celestra Vonn · Cosmic Mandala Astrology</p>
  <div class="gold-divider"></div>
  <p style="font-size:14px; color:var(--muted); max-width:520px; margin:0 auto;">A premium personalised astrology experience purpose-built for high engagement, deep resonance, and exceptional funnel performance across spiritual and self-help verticals.</p>
</div>

<!-- STATS ROW -->
<div class="stats-row">
  <div class="stat-pill">
    <div class="stat-label">Conversion Rate</div>
    <div class="stat-value">TBC</div>
    <div class="stat-desc">Initial data incoming</div>
    <div class="placeholder-badge">Placeholder</div>
  </div>
  <div class="stat-pill">
    <div class="stat-label">Affiliate EPC</div>
    <div class="stat-value">TBC</div>
    <div class="stat-desc">Will update at launch</div>
    <div class="placeholder-badge">Placeholder</div>
  </div>
  <div class="stat-pill">
    <div class="stat-label">Refund Rate</div>
    <div class="stat-value">TBC</div>
    <div class="stat-desc">365-day guarantee funnel</div>
    <div class="placeholder-badge">Placeholder</div>
  </div>
  <div class="stat-pill">
    <div class="stat-label">Commission</div>
    <div class="stat-value">60%</div>
    <div class="stat-desc">Across the entire funnel</div>
  </div>
</div>

<div class="container">

  <!-- ABOUT -->
  <section class="reveal visible">
    <div class="section-label">The Product</div>
    <h2>What Is the <strong>Cosmic Life Path Reading?</strong></h2>
    <div class="card">
      <p>The <strong style="color:var(--gold-light)">Cosmic Life Path Reading</strong> is a premium, deeply personalised astrology report channelled through <em style="font-family:&#39;Cormorant Garamond&#39;,serif; font-size:17px">Celestra Vonn</em> — psychic astrologer and inheritor of the <strong style="color:var(--gold-light)">Cosmic Mandala Astrology</strong> system, a lineage descending from the legendary prophetess Mother Shipman.</p>
      <p>Unlike generic horoscope products, this is a sign-specific, identity-level reading that tells the reader precisely who they are cosmically — their hidden strengths, their wealth blocks, their love patterns, and the planetary timing aligned to their unique life path.</p>
      <p>Delivered as a beautifully designed PDF report, the reading is structured around a proprietary framework that positions astrology not as fortune-telling, but as a precision map of the self. It reads like a private session with a world-class psychic astrologer — and converts accordingly.</p>
      <p>This is the kind of product your subscribers have been waiting their whole lives for someone to send them.</p>
    </div>
  </section>

  <!-- WHY IT CONVERTS -->
  <section class="reveal visible">
    <div class="section-label">Why It Works</div>
    <h2>Built to <strong>Convert</strong></h2>
    <div class="card">
      <ul class="converts-list">
        <li>Personalised by sun sign — 12 unique reports, not a generic one-size-fits-all</li>
        <li>Quiz funnel entry — high-intent buyers who've self-qualified before they ever see the VSL</li>
        <li>Celestra Vonn persona creates depth, mystique, and genuine authority</li>
        <li>Proprietary system (Cosmic Mandala Astrology) that cannot be Googled or compared</li>
        <li>Premium PDF branding — feels like a £200 private reading, priced at $47</li>
        <li>365-day money-back guarantee removes all buyer hesitation</li>
        <li>A rich three-upsell sequence that dramatically boosts per-customer earnings</li>
        <li>No compatibility content in the main report — fully preserved for Upsell 2, protecting your AOV</li>
      </ul>
    </div>
  </section>

  <!-- FUNNEL BREAKDOWN -->
  <section class="reveal visible">
    <div class="section-label">Funnel Architecture</div>
    <h2>Your Earning <strong>Potential</strong></h2>
    <div class="card">
      <table class="funnel-table">
        <thead>
          <tr>
            <th>Step</th>
            <th>Product</th>
            <th>Price</th>
            <th>Your Cut (60%)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><span class="tag">FE</span></td>
            <td>Cosmic Life Path Reading (Main Report)</td>
            <td>$47</td>
            <td class="earn">$28.20</td>
          </tr>
          <tr>
            <td><span class="tag" style="color:#8a8a8a;border-color:rgba(140,140,140,0.2);">DS</span></td>
            <td>Downsell</td>
            <td>$14.97</td>
            <td class="earn" style="font-size:15px;color:var(--muted)">$8.98</td>
          </tr>
          <tr>
            <td><span class="tag">OTO 1</span></td>
            <td>Cosmic Wealth Path Reading</td>
            <td>$67</td>
            <td class="earn">$40.20</td>
          </tr>
          <tr>
            <td><span class="tag">OTO 2</span></td>
            <td>Cosmic Love Path Reading</td>
            <td>$47</td>
            <td class="earn">$28.20</td>
          </tr>
          <tr>
            <td><span class="tag">OTO 3</span></td>
            <td>Cosmic Energy Path Reading</td>
            <td>$47</td>
            <td class="earn">$28.20</td>
          </tr>
        </tbody>
      </table>
      <div class="aov-box">
        <div>
          <div class="aov-label">Max Earnings Per Customer</div>
          <div class="aov-val">$124.80</div>
        </div>
        <div class="aov-note">If a customer buys the full funnel at full price, you pocket up to $124.80 from a single click. All commissions are at a flat 60% — no tiers, no exceptions.</div>
      </div>
    </div>
  </section>

  <!-- AUDIENCE -->
  <section class="reveal visible">
    <div class="section-label">Who Buys This</div>
    <h2>Your <strong>Perfect Audience</strong></h2>
    <div class="audience-grid">
      <div class="audience-item">
        <div class="audience-icon">♈</div>
        <div>
          <h4>Astrology &amp; Spirituality Lists</h4>
          <p>The natural home. If they follow astrology accounts, read birth charts, or have ever bought a tarot reading — this is for them.</p>
        </div>
      </div>
      <div class="audience-item">
        <div class="audience-icon">✨</div>
        <div>
          <h4>Law of Attraction / Manifestation</h4>
          <p>This audience is actively seeking tools that explain why their life is the way it is — this report answers that directly.</p>
        </div>
      </div>
      <div class="audience-item">
        <div class="audience-icon">🌱</div>
        <div>
          <h4>Self-Help &amp; Personal Development</h4>
          <p>People on a self-discovery journey respond powerfully to identity-level content. This reading is identity-first by design.</p>
        </div>
      </div>
      <div class="audience-item">
        <div class="audience-icon">📋</div>
        <div>
          <h4>Quiz &amp; Personality Test Lists</h4>
          <p>The quiz funnel entry means any list that loves BuzzFeed-style content, Enneagram, or Myers-Briggs will convert naturally here.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- EMAIL SWIPES -->
  <section class="reveal visible">
    <div class="section-label">Email Swipes</div>
    <h2>Ready-to-Send <strong>Promotions</strong></h2>
    <p style="margin-bottom:24px;">Three high-converting swipes below — click to expand, then copy and paste. Personalise the opening line with your name and list relationship for best results. All swipes are written in British English.</p>

    <!-- SWIPE 1 -->
    <div class="swipe-card">
      <div class="swipe-header" onclick="toggleSwipe(this)">
        <span class="swipe-title">Swipe 1 — Curiosity / Open Loop</span>
        <span class="swipe-toggle">+</span>
      </div>
      <div class="swipe-body">
        <div class="swipe-subject">Subject Line</div>
        <div class="swipe-subject-line">your stars just told me something about you…</div>
        <div class="swipe-copy" id="swipe1">
            Hi [First Name],

            I know that sounds strange. But bear with me.

            There's a woman named Celestra Vonn who has spent 20 years decoding what she calls the Cosmic Mandala — an ancient system of astrology that doesn't just tell you your traits… it tells you exactly why your life has unfolded the way it has.

            Why certain opportunities seem to slip through your fingers.
            Why love has felt harder than it should.
            Why money comes and goes despite your best efforts.

            She's just released something called the Cosmic Life Path Reading — and it's unlike anything I've ever seen in this space.

            It's a full, sign-specific personal reading that maps your hidden strengths, your cosmic wealth patterns, your love blueprint, and the exact planetary timing aligned to where you are right now.

            Take the short quiz here and get yours: [HOPLINK]

            I sent this to a few people last week and the responses have been remarkable.

            "I've never felt so seen in my life."
            "I read it twice. Then I cried."
            "It explained ten years of my life in three pages."

            If you've ever felt like your birth chart was trying to tell you something you couldn't quite hear — this is that something.

            [HOPLINK]

            [Your Name]

            P.S. Celestra only uses this system with a small number of people each year. The reading is available now but I can't say for how long.
        </div>
        <button class="copy-btn" onclick="copySwipe(&#39;swipe1&#39;, this)">⊕ Copy Swipe</button>
      </div>
    </div>

    <!-- SWIPE 2 -->
    <div class="swipe-card">
      <div class="swipe-header" onclick="toggleSwipe(this)">
        <span class="swipe-title">Swipe 2 — Mystique / Authority</span>
        <span class="swipe-toggle">+</span>
      </div>
      <div class="swipe-body">
        <div class="swipe-subject">Subject Line</div>
        <div class="swipe-subject-line">she predicted it before I even told her my name</div>
        <div class="swipe-copy" id="swipe2">
            Hi [First Name],
            Her name is Celestra Vonn, and she comes from a lineage of psychic astrologers stretching back centuries — the last living keeper of a system called Cosmic Mandala Astrology.
            This isn't your newspaper horoscope. This isn't a generic "what Scorpio season means for you" piece.
            This is a full, personalised reading of your life — your specific sun sign, your specific patterns, your specific cosmic code — decoded by someone who has spent her entire career doing this.
            The Cosmic Life Path Reading covers:
                ✦ Your hidden strengths (the ones even you haven't fully claimed yet)
                ✦ Your wealth blocks — and the exact cosmic pattern causing them
                ✦ Your love blueprint — why you attract who you attract
                ✦ Your energy and vitality cycles, mapped to the planets
                ✦ The timing window you're in RIGHT NOW
            Answer five short questions here and receive yours instantly: [HOPLINK]
            Celestra created 12 unique readings — one for each sign. Yours is already waiting.
            [HOPLINK]
            [Your Name]
        </div>
        <button class="copy-btn" onclick="copySwipe(&#39;swipe2&#39;, this)">⊕ Copy Swipe</button>
      </div>
    </div>

    <!-- SWIPE 3 -->
    <div class="swipe-card">
      <div class="swipe-header" onclick="toggleSwipe(this)">
        <span class="swipe-title">Swipe 3 — Urgency / Direct</span>
        <span class="swipe-toggle">+</span>
      </div>
      <div class="swipe-body">
        <div class="swipe-subject">Subject Line</div>
        <div class="swipe-subject-line">quick — what's your star sign?</div>
        <div class="swipe-copy" id="swipe3">
            Hi [First Name],

            If you've ever read your horoscope and thought "that's close, but it doesn't quite feel like me"…

            …it's because generic astrology was never built for YOU.

            The Cosmic Life Path Reading is different.

            It's a completely personalised report — written for your specific sun sign — that maps the deepest truths of who you are, what's blocked you, and what the cosmos has actually aligned for your life.

            Written by Celestra Vonn using the Cosmic Mandala Astrology system — a proprietary framework that reads your life chart with a level of precision most astrologers simply don't have access to.

            Here's what you'll discover inside:

            • The hidden cosmic strengths you've been underusing
            • Your personal wealth pattern — and what's been quietly sabotaging it
            • Your love compatibility blueprint, decoded from your birth chart
            • A planetary timing guide for the year ahead
            • Your full cosmic identity profile — finally, a mirror that tells the truth

            Right now it's available at a fraction of its real value. That changes soon.

            Get your Cosmic Life Path Reading here: [HOPLINK]

            [Your Name]

            P.S. There's a 365-day money-back guarantee, so there's genuinely nothing to lose. Take the quiz and see for yourself.
        </div>
        <button class="copy-btn" onclick="copySwipe(&#39;swipe3&#39;, this)">⊕ Copy Swipe</button>
      </div>
    </div>
  </section>

  <!-- CONTEST PLACEHOLDER -->
  <section class="reveal visible">
    <div class="section-label">Affiliate Contest</div>
    <h2>Leaderboard &amp; <strong>Prizes</strong></h2>
    <div class="contest-placeholder">
      <div class="ph-label">Coming Soon</div>
      <p>Affiliate contest details will be announced closer to launch. Sign up below to be the first to know — top performers will be rewarded generously.</p>
    </div>
  </section>

  <!-- GET YOUR LINK -->
  <section class="reveal visible" style="text-align:center;">
    <div class="section-label" style="justify-content:center;">
      <span style="flex:none">Get Started</span>
    </div>
    <h2>Grab Your <strong>Affiliate Link</strong></h2>
    <p style="max-width:480px; margin:0 auto 28px;">Sign up below to receive your hoplink, access your email swipes, and be notified of any updates, new swipes, or contest announcements.</p>
    <div class="card" style="max-width:560px; margin:0 auto;">
      <div class="form-row">
        <div class="form-field">
          <label>First Name</label>
          <input type="text" placeholder="Your first name">
        </div>
        <div class="form-field">
          <label>Email Address</label>
          <input type="email" placeholder="you@example.com">
        </div>
      </div>
      <div class="form-row">
        <div class="form-field">
          <label>ClickBank ID</label>
          <input type="text" placeholder="Your CB affiliate ID">
        </div>
      </div>
      <button class="cta-btn" style="width:100%; margin-top:8px;">Get My Affiliate Link ✦</button>
    </div>
  </section>

  <!-- RULES -->
  <section class="reveal visible">
    <div class="section-label">Important</div>
    <h2>Affiliate <strong>Guidelines</strong></h2>
    <div class="card">
      <ul class="rules-list">
        <li><span class="no">Do Not</span> Send traffic directly to the order form or any downsell page.</li>
        <li><span class="no">Do Not</span> Misrepresent yourself as an owner, creator, or official representative of the Cosmic Life Path Reading.</li>
        <li><span class="no">Do Not</span> Use negative promotional tactics such as "scam," "fake," or similar terms in your copy or ads.</li>
        <li><span class="no">Do Not</span> Make specific income, healing, or outcome claims not supported by our materials.</li>
      </ul>
      <p style="margin-top:20px; font-size:13px; color:var(--muted);">Affiliates found in violation of the above will have their hoplinks disabled immediately. These policies exist to protect the reputation of the product and the commissions of every affiliate supporting it.</p>
      <p style="font-size:13px; color:var(--muted); margin:0;">Questions or custom tools? Reach us at <strong style="color:var(--gold-dim)">support@thecosmiclifepath.com</strong> — we respond within 1–2 business days.</p>
    </div>
  </section>

</div>
@endsection

@push('scripts')
<script>
 // Scroll reveal
  const reveals = document.querySelectorAll('.reveal');
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); } });
  }, { threshold: 0.1 });
  reveals.forEach(r => observer.observe(r));

  // Swipe accordion
  function toggleSwipe(header) {
    const body = header.nextElementSibling;
    const toggle = header.querySelector('.swipe-toggle');
    const isOpen = body.classList.contains('open');
    document.querySelectorAll('.swipe-body').forEach(b => b.classList.remove('open'));
    document.querySelectorAll('.swipe-toggle').forEach(t => t.textContent = '+');
    if (!isOpen) {
      body.classList.add('open');
      toggle.textContent = '−';
    }
  }

  // Copy swipe
  function copySwipe(id, btn) {
    const text = document.getElementById(id).textContent;
    navigator.clipboard.writeText(text).then(() => {
      btn.textContent = '✓ Copied!';
      setTimeout(() => { btn.textContent = '⊕ Copy Swipe'; }, 2000);
    });
  }
  </script>
@endpush
