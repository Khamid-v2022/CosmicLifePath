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
        <p class="hero-sub mb-0">Presented by Celestra Vonn · Cosmic Mandala Astrology</p>
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
            <p>The <strong style="color:var(--gold-light)">Cosmic Life Path Reading</strong> is a premium, deeply personalised astrology report channelled through <em style="font-family:'Cormorant Garamond',serif; font-size:17px">Celestra Vonn</em> — psychic astrologer and inheritor of the <strong style="color:var(--gold-light)">Cosmic Mandala Astrology</strong> system, a lineage descending from the legendary prophetess Mother Shipman.</p>
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

     <!-- FUNNEL SNAPSHOT -->
  <section class="reveal">
    <div class="section-label">Earning Potential</div>
    <h2>One Customer. <strong>Three Ways to Earn.</strong></h2>
    <p style="margin-bottom: 28px; color: var(--muted); font-size: 14px;">Unlike a standard funnel with a fixed ceiling, the Cosmic Life Path ecosystem is built for repeat revenue. Here's how a single referral can keep paying you.</p>

    <div class="card" style="margin-bottom: 16px;">
      <div style="display:flex; align-items:flex-start; gap: 20px;">
        <div style="flex-shrink:0; width:36px; height:36px; border-radius:50%; background: linear-gradient(135deg, rgba(201,168,76,0.2), rgba(201,168,76,0.06)); border: 1px solid var(--card-border); display:flex; align-items:center; justify-content:center; font-family:'Cinzel',serif; font-size:13px; font-weight:600; color:var(--gold);">1</div>
        <div style="flex:1">
          <div style="font-family:'Cinzel',serif; font-size:10px; letter-spacing:3px; color:var(--gold); text-transform:uppercase; margin-bottom:8px;">The Core Funnel</div>
          <p style="margin-bottom: 12px; font-size:14px;">Every referred customer enters a four-step funnel. Front end at $47, followed by three one-click upsells at $67, $47, and $47. You earn 60% at every step.</p>
          <div class="funnel-snapshot">
            <div class="funnel-step">
              <div class="fs-tag">Front End</div>
              <div class="fs-name">Cosmic Life Path</div>
              <div class="fs-price">$47</div>
            </div>
            <div class="funnel-arrow">›</div>
            <div class="funnel-step">
              <div class="fs-tag">OTO 1</div>
              <div class="fs-name">Cosmic Wealth Path</div>
              <div class="fs-price">$67</div>
            </div>
            <div class="funnel-arrow">›</div>
            <div class="funnel-step">
              <div class="fs-tag">OTO 2</div>
              <div class="fs-name">Cosmic Love Path</div>
              <div class="fs-price">$47</div>
            </div>
            <div class="funnel-arrow">›</div>
            <div class="funnel-step">
              <div class="fs-tag">OTO 3</div>
              <div class="fs-name">Cosmic Energy Path</div>
              <div class="fs-price">$47</div>
            </div>
          </div>
          <p style="font-size:12px; color:var(--muted); margin: 10px 0 0;">A $14.97 downsell is available for non-buyers on the front end. 60% commission applies at every step.</p>
        </div>
      </div>
    </div>

    <div class="card" style="margin-bottom: 16px;">
      <div style="display:flex; align-items:flex-start; gap: 20px;">
        <div style="flex-shrink:0; width:36px; height:36px; border-radius:50%; background: linear-gradient(135deg, rgba(201,168,76,0.2), rgba(201,168,76,0.06)); border: 1px solid var(--card-border); display:flex; align-items:center; justify-content:center; font-family:'Cinzel',serif; font-size:13px; font-weight:600; color:var(--gold);">2</div>
        <div style="flex:1">
          <div style="font-family:'Cinzel',serif; font-size:10px; letter-spacing:3px; color:var(--gold); text-transform:uppercase; margin-bottom:8px;">Backend Report Purchases</div>
          <p style="font-size:14px; margin-bottom: 10px;">Customers don't stop at their own sign. People buy for their partners, children, parents, and friends — or out of pure curiosity for the signs they're closest to. All 12 individual sign reports are available on the backend, and every purchase through your link earns you 60%.</p>
          <div style="display:flex; gap:10px; flex-wrap:wrap;">
            <div style="background: rgba(201,168,76,0.06); border: 1px solid var(--card-border); border-radius:6px; padding: 12px 16px; flex:1; min-width:160px; text-align:center;">
              <div style="font-family:'Cinzel',serif; font-size:9px; letter-spacing:2px; color:var(--gold-dim); text-transform:uppercase; margin-bottom:4px;">Reports Available</div>
              <div style="font-family:'Cormorant Garamond',serif; font-size:28px; font-weight:600; color:var(--gold-light);">12</div>
              <div style="font-size:11px; color:var(--muted);">One for every sign</div>
            </div>
            <div style="background: rgba(201,168,76,0.06); border: 1px solid var(--card-border); border-radius:6px; padding: 12px 16px; flex:1; min-width:160px; text-align:center;">
              <div style="font-family:'Cinzel',serif; font-size:9px; letter-spacing:2px; color:var(--gold-dim); text-transform:uppercase; margin-bottom:4px;">Your Cut Per Report</div>
              <div style="font-family:'Cormorant Garamond',serif; font-size:28px; font-weight:600; color:var(--gold-light);">60%</div>
              <div style="font-size:11px; color:var(--muted);">Every backend purchase</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card" style="margin-bottom: 20px;">
      <div style="display:flex; align-items:flex-start; gap: 20px;">
        <div style="flex-shrink:0; width:36px; height:36px; border-radius:50%; background: linear-gradient(135deg, rgba(201,168,76,0.2), rgba(201,168,76,0.06)); border: 1px solid var(--card-border); display:flex; align-items:center; justify-content:center; font-family:'Cinzel',serif; font-size:13px; font-weight:600; color:var(--gold);">3</div>
        <div style="flex:1">
          <div style="font-family:'Cinzel',serif; font-size:10px; letter-spacing:3px; color:var(--gold); text-transform:uppercase; margin-bottom:8px;">Full Funnel Repeats</div>
          <p style="font-size:14px; margin-bottom:0;">A customer who loved their reading doesn't stop at one sign. They come back and run through the complete upsell sequence for a second — or third — sign. That means the full funnel commission structure resets with every new sign they purchase. There is no hard ceiling on what a single referred customer can be worth to you.</p>
        </div>
      </div>
    </div>

    <div style="background: linear-gradient(135deg, rgba(201,168,76,0.1), rgba(201,168,76,0.03)); border: 1px solid rgba(201,168,76,0.3); border-radius:8px; padding: 24px 28px; display:flex; align-items:center; gap:20px; flex-wrap:wrap;">
      <div style="font-size:28px;">✦</div>
      <div>
        <div style="font-family:'Cinzel',serif; font-size:10px; letter-spacing:3px; color:var(--gold-dim); text-transform:uppercase; margin-bottom:6px;">The Bottom Line</div>
        <p style="font-size:14px; color:var(--champagne); margin:0; line-height:1.6;">Most funnels give you one shot at one customer. This one gives you a full ecosystem — 12 reports, 3 upsells, and repeat purchase behaviour baked into the product. <strong style="color:var(--gold-light)">Your cookie tracks every purchase for 60 days from their first click.</strong></p>
      </div>
    </div>
  </section>

  <!-- AUDIENCE -->
  <section class="reveal">
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
    <section class="reveal">
        <div class="section-label">Email Swipes</div>
        <h2>Ready-to-Send <strong>Promotions</strong></h2>
        <p style="margin-bottom:16px;">All swipes are written in British English. Click to expand, copy, and paste. Filter by angle or length below. Personalise the opening with your name for best results.</p>

        <div class="swipe-filters">
        <button class="filter-btn active" onclick="filterSwipes('all', this)">All Swipes</button>
        <button class="filter-btn" onclick="filterSwipes('long', this)">Long-Form</button>
        <button class="filter-btn" onclick="filterSwipes('short', this)">Short &amp; Punchy</button>
        <button class="filter-btn" onclick="filterSwipes('curiosity', this)">Curiosity</button>
        <button class="filter-btn" onclick="filterSwipes('authority', this)">Authority</button>
        <button class="filter-btn" onclick="filterSwipes('urgency', this)">Urgency</button>
        <button class="filter-btn" onclick="filterSwipes('identity', this)">Identity</button>
        <button class="filter-btn" onclick="filterSwipes('social', this)">Social Proof</button>
        <button class="filter-btn" onclick="filterSwipes('fear', this)">FOMO</button>
        </div>

        <!-- LONG-FORM -->
        <div class="swipe-card" data-angle="curiosity" data-length="long">
        <div class="swipe-header" onclick="toggleSwipe(this)">
            <div class="swipe-meta">
            <span class="swipe-angle-tag angle-curiosity">Curiosity</span>
            <span class="swipe-length-badge">Long-Form</span>
            <span class="swipe-title">Open Loop — "Your stars just told me…"</span>
            </div>
            <span class="swipe-toggle">+</span>
        </div>
        <div class="swipe-body">
            <div class="swipe-subject">Subject Line</div>
            <div class="swipe-subject-line">your stars just told me something about you…</div>
            <div class="swipe-copy" id="swipe1">Hi [First Name],

                I know that sounds strange. But bear with me.

                There's a woman named Celestra Vonn who has spent 20 years decoding what she calls the Cosmic Mandala — an ancient system of astrology that doesn't just tell you your traits… it tells you exactly why your life has unfolded the way it has.

                Why certain opportunities seem to slip through your fingers.
                Why love has felt harder than it should.
                Why money comes and goes despite your best efforts.

                She's just released something called the Cosmic Life Path Reading — and it's unlike anything I've ever seen in this space.

                It's a full, sign-specific personal reading that maps your hidden strengths, your cosmic wealth patterns, your love blueprint, and the exact planetary timing aligned to where you are right now.

                Take the short quiz here and get yours: [HOPLINK]

                The responses have been remarkable.

                "I've never felt so seen in my life."
                "I read it twice. Then I cried."
                "It explained ten years of my life in three pages."

                If you've ever felt like your birth chart was trying to tell you something you couldn't quite hear — this is that something.

                [HOPLINK]

                [Your Name]

                P.S. Celestra only uses this system with a small number of people each year. The reading is available now but I can't say for how long.
            </div>
            <button class="copy-btn" onclick="copySwipe('swipe1', this)">⊕ Copy Swipe</button>
        </div>
        </div>

        <div class="swipe-card" data-angle="authority" data-length="long">
        <div class="swipe-header" onclick="toggleSwipe(this)">
            <div class="swipe-meta">
            <span class="swipe-angle-tag angle-authority">Authority</span>
            <span class="swipe-length-badge">Long-Form</span>
            <span class="swipe-title">Mystique — "She predicted it before I told her my name"</span>
            </div>
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
            <button class="copy-btn" onclick="copySwipe('swipe2', this)">⊕ Copy Swipe</button>
        </div>
        </div>

        <div class="swipe-card" data-angle="urgency" data-length="long">
        <div class="swipe-header" onclick="toggleSwipe(this)">
            <div class="swipe-meta">
            <span class="swipe-angle-tag angle-urgency">Urgency</span>
            <span class="swipe-length-badge">Long-Form</span>
            <span class="swipe-title">Direct — "Quick — what's your star sign?"</span>
            </div>
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
            <button class="copy-btn" onclick="copySwipe('swipe3', this)">⊕ Copy Swipe</button>
        </div>
        </div>

        <!-- SHORT & PUNCHY -->
        <div class="swipe-card" data-angle="identity" data-length="short">
        <div class="swipe-header" onclick="toggleSwipe(this)">
            <div class="swipe-meta">
            <span class="swipe-angle-tag angle-identity">Identity</span>
            <span class="swipe-length-badge">Short &amp; Punchy</span>
            <span class="swipe-title">"Do you know your cosmic type?"</span>
            </div>
            <span class="swipe-toggle">+</span>
        </div>
        <div class="swipe-body">
            <div class="swipe-subject">Subject Line</div>
            <div class="swipe-subject-line">do you know your cosmic type?</div>
            <div class="swipe-copy" id="swipe4">Hi [First Name],

                Most people know their sun sign.

                Very few know what it actually means for their wealth, their relationships, and the life they were cosmically built for.

                This short quiz reveals yours in under two minutes: [HOPLINK]

                It's called the Cosmic Life Path Reading — and it's the most accurate, personalised astrology reading I've come across.

                Go find out: [HOPLINK]

                [Your Name]
            </div>
            <button class="copy-btn" onclick="copySwipe('swipe4', this)">⊕ Copy Swipe</button>
        </div>
        </div>

        <div class="swipe-card" data-angle="fear" data-length="short">
        <div class="swipe-header" onclick="toggleSwipe(this)">
            <div class="swipe-meta">
            <span class="swipe-angle-tag angle-fear">FOMO</span>
            <span class="swipe-length-badge">Short &amp; Punchy</span>
            <span class="swipe-title">"Your reading is waiting"</span>
            </div>
            <span class="swipe-toggle">+</span>
        </div>
        <div class="swipe-body">
            <div class="swipe-subject">Subject Line</div>
            <div class="swipe-subject-line">your [Sign] reading is waiting for you</div>
            <div class="swipe-copy" id="swipe5">
                Hi [First Name],

                Celestra Vonn has prepared a full Cosmic Life Path Reading for every sign.

                Yours is sitting there right now.

                It covers your hidden strengths, your wealth patterns, your love blueprint — and the exact cosmic timing you're currently in.

                It takes two minutes to claim: [HOPLINK]

                Don't leave it sitting there.

                [Your Name]
            </div>
            <button class="copy-btn" onclick="copySwipe('swipe5', this)">⊕ Copy Swipe</button>
        </div>
        </div>

        <div class="swipe-card" data-angle="social" data-length="short">
        <div class="swipe-header" onclick="toggleSwipe(this)">
            <div class="swipe-meta">
            <span class="swipe-angle-tag angle-social">Social Proof</span>
            <span class="swipe-length-badge">Short &amp; Punchy</span>
            <span class="swipe-title">"People are losing it over this reading"</span>
            </div>
            <span class="swipe-toggle">+</span>
        </div>
        <div class="swipe-body">
            <div class="swipe-subject">Subject Line</div>
            <div class="swipe-subject-line">people are losing it over this reading</div>
            <div class="swipe-copy" id="swipe6">
                Hi [First Name],

                I've been sharing the Cosmic Life Path Reading with people this week.

                The reactions have been something else.

                "I've never felt so seen."
                "It explained the last five years of my life."
                "I sent it to my mum. She cried."

                It's a personalised astrology reading — specific to your sun sign — written by Celestra Vonn, who has spent decades decoding what the stars say about your wealth, love, and life path.

                Take the two-minute quiz here: [HOPLINK]

                [Your Name]
            </div>
            <button class="copy-btn" onclick="copySwipe('swipe6', this)">⊕ Copy Swipe</button>
        </div>
        </div>

        <div class="swipe-card" data-angle="curiosity" data-length="short">
        <div class="swipe-header" onclick="toggleSwipe(this)">
            <div class="swipe-meta">
            <span class="swipe-angle-tag angle-curiosity">Curiosity</span>
            <span class="swipe-length-badge">Short &amp; Punchy</span>
            <span class="swipe-title">"Why is this so accurate?"</span>
            </div>
            <span class="swipe-toggle">+</span>
        </div>
        <div class="swipe-body">
            <div class="swipe-subject">Subject Line</div>
            <div class="swipe-subject-line">why is this so accurate?</div>
            <div class="swipe-copy" id="swipe7">
                Hi [First Name],

                I don't say this often, but — take the quiz.

                Two minutes. Free to start. And the reading on the other side is unlike anything I've seen in astrology.

                It's called the Cosmic Life Path Reading. Personalised to your sign. Written by Celestra Vonn using a system called Cosmic Mandala Astrology.

                People keep asking how it's so accurate.

                Go find out: [HOPLINK]

                [Your Name]
            </div>
            <button class="copy-btn" onclick="copySwipe('swipe7', this)">⊕ Copy Swipe</button>
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
                    <input type="text" id="clickbankId" placeholder="Your CB affiliate ID">
                </div>
            </div>
            <button class="cta-btn" style="width:100%; margin-top:8px;">Get My Affiliate Link ✦</button>
            <div class="affiliate-link-wrapper d-none">
                <div class="affiliate-link" id="affiliateLink">https://hop.clickbank.net/?affiliate={affiID}&vendor=clifepath&cbpage=main</div>
                <button class="copy-btn" onclick="copySwipe('affiliateLink', this)" fdprocessedid="m4nt10" style="margin-top: 0px; min-width: 120px ">⊕ Copy Swipe</button>
            </div>
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
    <section class="disclaimer-section text-center mt-5" style="font-size: 0.8rem">
        ClickBank is the retailer of products on this site. CLICKBANK® is a registered trademark of Click Sales Inc., a Delaware corporation located at 1444 S. Entertainment Ave., Suite 410 Boise, ID 83709, USA and used by permission. ClickBank's role as retailer does not constitute an endorsement, approval or review of these products or any claim, statement or opinion used in promotion of these products
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

    // Generate affiliate link
    document.querySelector('.cta-btn').addEventListener('click', () => {
        const cbId = document.getElementById('clickbankId').value.trim();
        if (!cbId) {
            alert('Please enter your ClickBank ID.');
            return;
        }
        const link = `https://hop.clickbank.net/?affiliate=${encodeURIComponent(cbId)}&vendor=clifepath&cbpage=main`;
        document.getElementById('affiliateLink').textContent = link;
        // $(".affiliate-link-wrapper").removeClass('d-none');
        document.querySelector('.affiliate-link-wrapper').classList.remove('d-none');
    });
  </script>
@endpush
