@extends('layouts.app')
@section('title', 'Affiliate')
@push('head')
    <link rel="stylesheet" href="{{ asset('css/affiliate.css') }}?v={{ filemtime(public_path('css/affiliate.css')) }}">
@endpush

@section('content')
<div class="affiliate-page">
    <!-- HERO -->
    <div class="hero">
        <div class="eyebrow">Affiliate Resource Centre</div>
        <h1>Welcome to<br><em>Cosmic Life Path Reading</em></h1>
        <p class="hero-sub mb-0">Presented by Celestra Vonn · Cosmic Mandala Astrology</p>
        <div class="gold-divider"></div>
        <p class="hero-lead">A premium personalised astrology experience purpose-built for high engagement, deep resonance, and exceptional funnel performance across spiritual and self-help verticals.</p>
    </div>

    <!-- STATS ROW -->
    <div class="stats-section">
        <div class="stats-section-head">
            <span class="stats-live-badge"><span class="stats-live-dot" aria-hidden="true"></span>Live Performance</span>
            <p class="stats-section-note">Real funnel metrics from active affiliate traffic</p>
        </div>
        <div class="stats-row">
            <article class="stat-pill">
                <span class="stat-label">Conversion Rate</span>
                <div class="stat-value">0.77%</div>
                <p class="stat-desc">Visitor-to-buyer conversion</p>
            </article>
            <article class="stat-pill">
                <span class="stat-label">Affiliate EPC</span>
                <div class="stat-value stat-value-epc" aria-label="$0.36 to $2.64">
                    <span>$0.36</span>
                    <span class="stat-epc-dash">–</span>
                    <span>$2.64</span>
                </div>
                <p class="stat-desc">Earnings per click</p>
            </article>
            <article class="stat-pill">
                <span class="stat-label">Avg. Order Value</span>
                <div class="stat-value">$74.47</div>
                <p class="stat-desc">Including upsell revenue</p>
            </article>
            <article class="stat-pill">
                <span class="stat-label">Refund Rate</span>
                <div class="stat-value">5.26%</div>
                <p class="stat-desc">365-day guarantee funnel</p>
            </article>
        </div>
    </div>

    <div class="container">

    <!-- ABOUT -->
    <section class="reveal visible">
        <div class="section-label">The Product</div>
        <h2>What Is the <strong>Cosmic Life Path Reading?</strong></h2>
        <div class="card">
            <p>The <strong class="text-gold">Cosmic Life Path Reading</strong> is a premium, deeply personalised astrology report channelled through <em class="name-em">Celestra Vonn</em> — psychic astrologer and inheritor of the <strong class="text-gold">Cosmic Mandala Astrology</strong> system, a lineage descending from the legendary prophetess Mother Shipman.</p>
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
    <p class="section-intro">Unlike a standard funnel with a fixed ceiling, the Cosmic Life Path ecosystem is built for repeat revenue. Here's how a single referral can keep paying you.</p>

    <div class="card card-spaced">
      <div class="funnel-row">
        <div class="funnel-num">1</div>
        <div class="funnel-content">
          <div class="funnel-kicker">The Core Funnel</div>
          <p class="funnel-copy">Every referred customer enters a four-step funnel. Front end at $47, followed by three one-click upsells at $67, $47, and $47. You earn 60% at every step.</p>
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
          <p class="muted-note">A $14.97 downsell is available for non-buyers on the front end. 60% commission applies at every step.</p>
        </div>
      </div>
    </div>

    <div class="card card-spaced">
      <div class="funnel-row">
        <div class="funnel-num">2</div>
        <div class="funnel-content">
          <div class="funnel-kicker">Backend Report Purchases</div>
          <p class="funnel-copy">Customers don't stop at their own sign. People buy for their partners, children, parents, and friends — or out of pure curiosity for the signs they're closest to. All 12 individual sign reports are available on the backend, and every purchase through your link earns you 60%.</p>
          <div class="mini-stats">
            <div class="mini-stat">
              <div class="mini-stat-label">Reports Available</div>
              <div class="mini-stat-value">12</div>
              <div class="mini-stat-desc">One for every sign</div>
            </div>
            <div class="mini-stat">
              <div class="mini-stat-label">Your Cut Per Report</div>
              <div class="mini-stat-value">60%</div>
              <div class="mini-stat-desc">Every backend purchase</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card card-spaced-lg">
      <div class="funnel-row">
        <div class="funnel-num">3</div>
        <div class="funnel-content">
          <div class="funnel-kicker">Full Funnel Repeats</div>
          <p class="funnel-copy mb-0">A customer who loved their reading doesn't stop at one sign. They come back and run through the complete upsell sequence for a second — or third — sign. That means the full funnel commission structure resets with every new sign they purchase. There is no hard ceiling on what a single referred customer can be worth to you.</p>
        </div>
      </div>
    </div>

    <div class="callout-box">
      <div class="callout-glyph">✦</div>
      <div>
        <div class="callout-kicker">The Bottom Line</div>
        <p class="callout-copy">Most funnels give you one shot at one customer. This one gives you a full ecosystem — 12 reports, 3 upsells, and repeat purchase behaviour baked into the product. <strong class="text-gold">Your cookie tracks every purchase for 60 days from their first click.</strong></p>
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
        <p class="section-intro">All swipes are written in British English. Click to expand, copy, and paste. Filter by angle or length below. Personalise the opening with your name for best results.</p>

        <div class="swipe-filters">
        <button class="filter-btn active" onclick="filterSwipes('all', this)">All Swipes</button>
        <button class="filter-btn" onclick="filterSwipes('series1', this)">Email Series 1</button>
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

        <!-- EMAIL SERIES 1 -->
        <div class="swipe-card" data-series="1">
        <div class="swipe-header" onclick="toggleSwipe(this)">
            <div class="swipe-meta">
            <span class="swipe-angle-tag angle-series">Email Series 1</span>
            <span class="swipe-title">Email Swipe #1 🔥 — "Discover your hidden gifts here…"</span>
            </div>
            <span class="swipe-toggle">+</span>
        </div>
        <div class="swipe-body">
            <div class="swipe-subject">Subject Line</div>
            <div class="swipe-subject-line">Discover your hidden gifts here…</div>
            <div class="swipe-copy" id="swipe-series1-1">Hi [First Name],

              It holds the key to helping you see for the first time ever, the hidden gifts and talents you possess.

              It's one of the most powerful underground Astrology methods that ever existed.

              It's called...
              The Cosmic Mandala.

              >>>You can access your FREE reading here: [HOPLINK]<<<

              Thousands of years old.
              Tracing its roots back to ancient Egypt.

              In the right hands, it can give you unique insights into hidden gifts and talents you never knew existed.

              You can then use these insights to manifest a life you never dreamed possible before.

              >>>You can access a FREE Cosmic Life Path Reading here today: [HOPLINK]<<<

              To your success,

              [Your Name]
            </div>
            <button class="copy-btn" onclick="copySwipe('swipe-series1-1', this)">⊕ Copy Swipe</button>
        </div>
        </div>

        <div class="swipe-card" data-series="1">
        <div class="swipe-header" onclick="toggleSwipe(this)">
            <div class="swipe-meta">
            <span class="swipe-angle-tag angle-series">Email Series 1</span>
            <span class="swipe-title">Email Swipe #2 — "This is strange, but you need to see it…"</span>
            </div>
            <span class="swipe-toggle">+</span>
        </div>
        <div class="swipe-body">
            <div class="swipe-subject">Subject Line</div>
            <div class="swipe-subject-line">This is strange [First Name], but you need to see it…</div>
            <div class="swipe-copy" id="swipe-series1-2">Hi [First Name],

Everyone is talking about how eerie this FREE Cosmic Life Path Reading is.

It's based on an ancient type of Astrology called Cosmic Mandala Astrology...one of the most powerful Astrology methods to ever exist.

People who are using the FREE reading are getting surprising insights into gifts and talents they have never explored before.

These hidden gifts and talents can only be detected by this very special type of reading that picks up information from the cosmos on the day you were born about what you were meant to do in your life.

>>>You can access your FREE Cosmic Life Path Reading right here: [HOPLINK]<<<

Access it now while it's still online.

To your success,

[Your Name]
            </div>
            <button class="copy-btn" onclick="copySwipe('swipe-series1-2', this)">⊕ Copy Swipe</button>
        </div>
        </div>

        <div class="swipe-card" data-series="1">
        <div class="swipe-header" onclick="toggleSwipe(this)">
            <div class="swipe-meta">
            <span class="swipe-angle-tag angle-series">Email Series 1</span>
            <span class="swipe-title">Email Swipe #3 — "You will be shocked…"</span>
            </div>
            <span class="swipe-toggle">+</span>
        </div>
        <div class="swipe-body">
            <div class="swipe-subject">Subject Line</div>
            <div class="swipe-subject-line">You will be shocked…</div>
            <div class="swipe-copy" id="swipe-series1-3">Hi [First Name],

The first time anyone does a Cosmic Life Path Reading, their first reaction (most of the time) is shock.

This shock comes from seeing for the first time the true gifts and talents they have.

Nothing is as powerful as a Cosmic Life Path Reading for uncovering these talents.

The reason being...

The Cosmic Life Path reading taps into the energy in the Cosmos on the day you were born and your destiny in life.

The hidden talents and gifts the reading uncovers are linked to this cosmic purpose, which is yours and yours alone.

If you're ready to see for the first time ever the hidden talents and gifts you have...

...and how to use them to manifest the kind of life you've been dreaming of...

>>>Head on over to this link right here: [HOPLINK]<<<

To your success,

[Your Name]
            </div>
            <button class="copy-btn" onclick="copySwipe('swipe-series1-3', this)">⊕ Copy Swipe</button>
        </div>
        </div>

        <div class="swipe-card" data-series="1">
        <div class="swipe-header" onclick="toggleSwipe(this)">
            <div class="swipe-meta">
            <span class="swipe-angle-tag angle-series">Email Series 1</span>
            <span class="swipe-title">Email Swipe #4 — "Choice"</span>
            </div>
            <span class="swipe-toggle">+</span>
        </div>
        <div class="swipe-body">
            <div class="swipe-subject">Subject Line</div>
            <div class="swipe-subject-line">Choice</div>
            <div class="swipe-copy" id="swipe-series1-4">Hi [First Name],

What's the greatest secret to a happy life?

Answer = CHOICE.

I'm talking here about the choice to wake up when you want.

To spend the day doing what you want to do.

That could be working on a passion project or spending time with the family.

Or just goofing off.

Having choice in life is incredible.

In order to live that life of choice, though, you need to be tapped into your hidden gifts and talents.

Once you are connected with them...you can manifest whatever kind of life you want.

By far the greatest tool for uncovering those hidden gifts and talents we all have is a Cosmic Life Path Reading.

I've done one recently, and it's opened the door to gifts and talents I never knew I had.

...making me aware of them for the first time ever.

This reading taps into the energy of the Cosmos itself on the day of your birth to uncover the deepest individual potential you have.

It's quite amazing.

See for yourself here with a >>>FREE Cosmic Life Path Reading today: [HOPLINK]<<<

To your success,

[Your Name]
            </div>
            <button class="copy-btn" onclick="copySwipe('swipe-series1-4', this)">⊕ Copy Swipe</button>
        </div>
        </div>

        <div class="swipe-card" data-series="1">
        <div class="swipe-header" onclick="toggleSwipe(this)">
            <div class="swipe-meta">
            <span class="swipe-angle-tag angle-series">Email Series 1</span>
            <span class="swipe-title">Email Swipe #5 — "Why the law of attraction doesn't work…"</span>
            </div>
            <span class="swipe-toggle">+</span>
        </div>
        <div class="swipe-body">
            <div class="swipe-subject">Subject Line</div>
            <div class="swipe-subject-line">Why the law of attraction doesn't work…</div>
            <div class="swipe-copy" id="swipe-series1-5">Hi [First Name],

Over 30 million copies of The Secret were sold worldwide.

Millions did their affirmations and wrote down their goals.

And then, for most people...

Nothing happened.

And it's the same today.

People try to change their Brain Waves, say manifesting prayers and mantras, yet for most, it's the same story.

Nothing gets manifested.

Here's why this happens.

For most people...

They have hidden blocks to abundance that stop them from ever attracting the kind of life they crave.

The only way to overcome these inner blocks to abundance, in my experience, is to get deep knowledge of who you are and what divine mission you were meant to accomplish in this incarnation.

That knowledge of what I call your Cosmic Life Path will remove any blocks to your abundance lingering in your life.

A FREE Cosmic Life Path Reading is by far the best way I have found to access these gifts and talents that are unique to you and you alone.

Once you are aware of these gifts, there is no limit to what you can achieve.

>>>You can access your FREE Cosmic Life Path Reading here today: [HOPLINK]<<<

To your success,

[Your Name]
            </div>
            <button class="copy-btn" onclick="copySwipe('swipe-series1-5', this)">⊕ Copy Swipe</button>
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
    <section class="reveal visible section-centered">
        <div class="section-label section-label-center">
            <span>Get Started</span>
        </div>
        <h2>Grab Your <strong>Affiliate Link</strong></h2>
        <p class="section-intro section-intro-center">Sign up below to receive your hoplink, access your email swipes, and be notified of any updates, new swipes, or contest announcements.</p>
        <div class="card card-narrow">
            <form id="affiliateSignupForm" class="affiliate-signup-form" novalidate>
                @csrf
                <div class="form-row">
                    <div class="form-field">
                        <label for="affiliateFirstName">First Name</label>
                        <input type="text" id="affiliateFirstName" name="first_name" placeholder="Your first name" required autocomplete="given-name">
                    </div>
                    <div class="form-field">
                        <label for="affiliateEmail">Email Address</label>
                        <input type="email" id="affiliateEmail" name="email" placeholder="you@example.com" required autocomplete="email">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-field">
                        <label for="clickbankId">ClickBank ID</label>
                        <input type="text" id="clickbankId" name="clickbank_id" placeholder="Your CB affiliate ID" required autocomplete="off">
                    </div>
                </div>
                <button type="submit" class="cta-btn cta-btn-full" id="affiliateSignupBtn">Get My Affiliate Link ✦</button>
            </form>
            <div class="affiliate-link-wrapper d-none">
                <div class="affiliate-link" id="affiliateLink">https://hop.clickbank.net/?affiliate={affiID}&vendor=clifepath&cbpage=main</div>
                <button class="copy-btn copy-btn-inline" onclick="copySwipe('affiliateLink', this)">⊕ Copy Link</button>
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
        <p class="rules-note">Affiliates found in violation of the above will have their hoplinks disabled immediately. These policies exist to protect the reputation of the product and the commissions of every affiliate supporting it.</p>
        <p class="rules-contact">Questions or custom tools? Reach us at <strong class="text-gold-dim">support@thecosmiclifepath.com</strong> — we respond within 1–2 business days.</p>
        </div>
    </section>
    <section class="disclaimer-section text-center mt-5">
        ClickBank is the retailer of products on this site. CLICKBANK® is a registered trademark of Click Sales Inc., a Delaware corporation located at 1444 S. Entertainment Ave., Suite 410 Boise, ID 83709, USA and used by permission. ClickBank's role as retailer does not constitute an endorsement, approval or review of these products or any claim, statement or opinion used in promotion of these products
    </section>
</div>
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

  // Swipe filters
  function filterSwipes(filter, btn) {
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');

    document.querySelectorAll('.swipe-card').forEach(card => {
      const angle = card.dataset.angle;
      const length = card.dataset.length;
      const series = card.dataset.series;
      let show = false;

      if (filter === 'all') {
        show = true;
      } else if (filter === 'series1') {
        show = series === '1';
      } else if (filter === 'long' || filter === 'short') {
        show = length === filter;
      } else {
        show = angle === filter;
      }

      card.classList.toggle('filtered-out', !show);
    });
  }

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
      if(id==='affiliateLink') {
        setTimeout(() => { btn.textContent = '⊕ Copy Link'; }, 2000);
      } else {
        setTimeout(() => { btn.textContent = '⊕ Copy Swipe'; }, 2000);
    }
    });
  }

    // Affiliate signup + link generation
    document.getElementById('affiliateSignupForm').addEventListener('submit', (e) => {
        e.preventDefault();

        const firstName = document.getElementById('affiliateFirstName').value.trim();
        const email = document.getElementById('affiliateEmail').value.trim();
        const cbId = document.getElementById('clickbankId').value.trim();
        const csrfToken = document.querySelector('#affiliateSignupForm input[name="_token"]').value;

        if (!firstName) {
            alert('Please enter your first name.');
            return;
        }
        if (!email) {
            alert('Please enter your email address.');
            return;
        }
        if (!cbId) {
            alert('Please enter your ClickBank ID.');
            return;
        }

        const link = `https://hop.clickbank.net/?affiliate=${encodeURIComponent(cbId)}&vendor=clifepath&cbpage=main`;
        document.getElementById('affiliateLink').textContent = link;
        document.querySelector('.affiliate-link-wrapper').classList.remove('d-none');

        fetch('{{ route('affiliate.signup') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify({
                first_name: firstName,
                email: email,
                clickbank_id: cbId,
            }),
        }).catch(() => {
            // Link is shown regardless; AWeber sync runs in the background.
        });
    });
  </script>
@endpush
