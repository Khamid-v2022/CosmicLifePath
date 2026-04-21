@extends('layouts.app')

@section('title', 'Special Offer')

@section('content')
  @php
    $today = now()->format('F j, Y');
    $checkoutUrl = 'https://www.google.com';
  @endphp

  <section class="small-gap-start step-section container">
    <div class="step-panel mx-auto article-panel">
      <article class="cosmic-article mx-auto">
        <!-- <p class="section-label text-center">Special Offer</p> -->
        <h1 class="section-title step-title text-center mb-4">The Cosmos Has Guided You Here Today On {{ $today }}, {{ $name }}...<br> Now Is The Time To Begin Your Magical Journey As You Follow Your <i>Cosmic Life Path</i></h1>

        <div class="article-image-wrap article-hero-image-wrap text-center mb-4">
          <img src="{{ asset('imgs/sale-page/main-header.jpg') }}" alt="Cosmic life path hero" class="img-fluid cosmic-result-image article-feature-image">
        </div>

        <p class="step-copy article-copy">All the <strong>unique obstacles and challenges</strong> you have faced in life have guided you here right now, {{ $name }}.</p>
        <p class="step-copy article-copy">This is exactly where you are supposed to be.</p>
        <p class="step-copy article-copy">There’s a reason why you incarnated here on earth.</p>
        <p class="step-copy article-copy">You are here to fulfil your own <strong>personal mission</strong>... to follow your particular <i><strong>Cosmic Life Path</strong></i> that no one else can follow.</p>
        <p class="step-copy article-copy">It’s vital right now that you discover and follow your <strong>distinct <i>Cosmic Life Path</i></strong> so you can play your part in the transition we are currently going through on Earth.</p>


        <h2 class="article-subtitle mt-0">It’s what drives me to create this special Cosmic Life Path reading for people like you, {{ $name }}...</h2>
        
        <div class="article-inline-media my-4">
          <div class="article-inline-copy">
            <p class="step-copy article-copy">The <i><strong>Cosmic Life Path</strong></i> is like a cosmic, divine map... guiding you to the path to live the kind of life you were meant to live... that brings you the greatest joy and abundance.</p>
            <p class="step-copy article-copy">It’s like a <i>‘cheat code’</i> to levelling up FAST and finally living the kind of life you’ve been dreaming of... while clearing all the obstacles away to that special life you were meant to live.</p>
          </div>
          <div class="article-inline-visual">
            <img src="{{ asset('imgs/sale-page/introduction.jpg') }}" alt="Introduction to the cosmic reading" class="img-fluid cosmic-result-image">
          </div>
        </div>
        <p class="step-copy article-copy">Your <i>Cosmic Life Path Reading</i> was designed by the <strong>unique cosmic energy patterns of the planets at the time of your birth</strong>.</p>
        <p class="step-copy article-copy">You are now uncovering that divine plan for your life right now.</p>
        <p class="step-copy article-copy">You’re about to discover special talents and gifts you never knew you had, along with how to use them to carry out your life purpose and attract wealth effortlessly.</p>
        <p class="step-copy article-copy">{{ $name }}, you will also see for the first time ever your <strong>individual hidden inner blocks</strong> you have been carryvu want to manifest.</p>
        <p class="step-copy article-copy">Your <i>Cosmic Life Path Reading</i> will reveal the secret <strong>you alone can recognize</strong> to have an intimate soul-mate relationship.</p>
        <p class="step-copy article-copy">You will discover <strong>your unique health challenges</strong> and how to overcome them.</p>
        <p class="step-copy article-copy mb-0">You will discover all this and more inside your...</p>


        <h2 class="section-title step-title article-major-title mt-5" style="text-transform: capitalize;"><strong >{{$birth['sign_slug']}} Cosmic Life Path Reading Full Report</strong></h2>


        <div class="article-image-wrap article-hero-image-wrap text-center mb-4">
          <img src="{{ asset('imgs/ebook/horoscope/' . $birth['sign_slug'] . '.png') }}" alt="{{ $sign['label'] ?? 'Cosmic life path' }}" class="" style="max-width: 230px;">
        </div>


        <p class="step-copy article-copy">Here’s just some of what you will discover inside your <i>Cosmic Life Path Reading, {{ $name }}:</i></p>

        <h3 class="article-subtitle mt-0">Your Cosmic Personality Code:</h3>
        <p class="step-copy article-copy mb-0">This is who you are at the core of your being. The hidden parts of your personality that you are not aware of. You will see hidden gifts <strong>you alone possess,</strong> along with <strong>your distinctive blind spots</strong> that stop you from using them to attract more abundance.</p>

       
        <div class="article-inline-media my-4">
          <div class="article-inline-copy">
            <h3 class="article-subtitle mt-0" style="letter-spacing: -1px">Your Cosmic Potential Unleashed:</h3>
            <p class="step-copy article-copy mb-0">Here you will learn the fastest, easiest way to unleash <strong>your extraordinary full potential</strong> to achieve any goal you put your mind to. Most people are shocked when they realise how much potential they have.</p>
          </div>
          <div class="article-inline-visual">
            <img src="{{ asset('imgs/sale-page/potential-unleashed.jpg') }}" alt="Your cosmic potential unleashed" class="img-fluid cosmic-result-image">
          </div>
        </div>

        <h3 class="article-subtitle mt-0">Your Cosmic Mind Power:</h3>
        <p class="step-copy article-copy">This is the best way to <strong>program your particular mind</strong> for quick and easy success.</p>
            
        <div class="article-inline-media media-image-left my-4">
          <div class="article-inline-copy">
            <p class="step-copy article-copy">Everyone’s mind works differently.</p>
            <p class="step-copy article-copy mb-0">This part of your <i>Cosmic Life Path Reading</i> is designed to help you use your own mind as a tool for success. This is very powerful.</p>
          </div>
          <div class="article-inline-visual">
            <img src="{{ asset('imgs/sale-page/mind-power.jpg') }}" alt="Your cosmic mind power" class="img-fluid cosmic-result-image">
          </div>
        </div>

        <h3 class="article-subtitle mt-0">Cosmic Vibrant Health Unlocked</h3>
        <p class="step-copy article-copy">In this part of the reading, I will reveal to you the key to having vibrant health and wellness <strong>according to your individual Cosmic Life Path charts,</strong> no matter what your genetics or family history.</p>


        <h3 class="article-subtitle mt-0">Cosmic Wealth Key</h3>
        <div class="article-inline-media media-image-left my-4">
          <div class="article-inline-copy order-2 order-md-1">
            <p class="step-copy article-copy mb-0">Every <i>Cosmic Life Path Reading</i> has a <strong>unique Cosmic Wealth key.</strong> This Cosmic Wealth Key is <strong>unique to you and you alone.</strong> It’s your key to manifesting wealth and abundance in the least amount of time possible.</p>
          </div>
          <div class="article-inline-visual order-1 order-md-2">
            <!-- <img src="{{ asset('imgs/sale-page/wealth-key.jpg') }}" alt="Cosmic wealth key" class="img-fluid cosmic-result-image"> -->
             <img src="{{ asset('imgs/sale-page/trauma-release.jpg') }}" alt="Cosmic trauma release" class="img-fluid cosmic-result-image">
          </div>
        </div>

        <h3 class="article-subtitle mt-0">Cosmic Trauma Release</h3>
        <p class="step-copy article-copy">We all carry trauma in our lives. This part of the <i>Cosmic Life Path Reading</i> helps you to<strong>release the personal trauma</strong> held in your cells that holds you back in life...and stops you from being all you can be.</p>
        <p class="step-copy article-copy mb-0">You might not realise it yet, {{ $name }}, but...</p>
        <!-- <div class="article-inline-media my-4">
          <div class="article-inline-copy">
            <p class="step-copy article-copy">We all carry trauma in our lives. This part of the <i>Cosmic Life Path Reading</i> helps you to <strong>release the personal trauma</strong> held in your cells that holds you back in life...and stops you from being all you can be.</p>
            <p class="step-copy article-copy mb-0">You might not realise it yet, {{ $name }}, but...</p>
          </div>
          <div class="article-inline-visual">
            <img src="{{ asset('imgs/sale-page/trauma-release.jpg') }}" alt="Cosmic trauma release" class="img-fluid cosmic-result-image">
          </div>
        </div> -->


        <h2 class="section-title step-title article-major-title mt-5">A <i>Cosmic Life Path Reading</i> Will Transform Your Life...</h2>
        <p class="step-copy article-copy">Clients of mine who get <strong>a Cosmic Life Path Reading</strong> feel a deep sense of joy and awe upon reading it.</p>
        <p class="step-copy article-copy">They understand for the first time their <strong>unique place in the universe</strong> and how to maximise every moment of their lives.</p>
        <p class="step-copy article-copy">They understand how they can contribute to those around them in the best way possible and how to maximise the abundance that flows to them.</p>
        <p class="step-copy article-copy">They become better fathers, mothers, partners, and parents.</p>
        <p class="step-copy article-copy">The insights you get into <strong>your particular hidden skills and talents</strong> are like a secret weapon you can use every day to attract more abundance and never have to deny your family anything ever again.</p>

        <h3 class="article-subtitle mt-4">And there’s more...</h3>

        <div class="article-image-wrap article-hero-image-wrap text-center mb-4">
          <img src="{{ asset('imgs/sale-page/life.png') }}" alt="Cosmic life path hero" class="img-fluid cosmic-result-image article-feature-image">
        </div>

        <p class="step-copy article-copy">As you discover your individual life purpose from a <i>Cosmic Life Path Reading,</i> you will also:</p>
        <ul class="cosmic-benefits article-copy">
          <li>Banish worry and stress from your life.</li>
          <li>Bend reality to your will.</li>
          <li>Boost your confidence and joy.</li>
        </ul>

        <p class="step-copy article-copy">A <i>Cosmic Life Path Reading</i> helps you to move into harmony with the path the universe had in store for you, based on cosmic energy patterns of the planets at the time of your birth. You will find new opportunities coming into your life.</p>

        <div class="article-inline-media my-4">
          <div class="article-inline-copy">
            <p class="step-copy article-copy">People who have gotten a <i>Cosmic Life Path Reading...</i></p>
            <ul class="cosmic-benefits article-copy ps-0" style="list-style-type: none;">
              <li>- ...get promotions or pay rises out of the blue</li>
              <li>- ...attract new income streams</li>
              <li>- ...get new romantic soul-mate relationships</li>
              <li>- ...experience vibrant health and energy levels they never experienced before</li>
            </ul>
          </div>
          <div class="article-inline-visual">
            <img src="{{ asset('imgs/sale-page/helps-what.png') }}" alt="Cosmic life path benefits" class="img-fluid cosmic-result-image">
          </div>
        </div>

        <p class="step-copy article-copy">Attract new income streams...new romantic soul-mate relationships...along with vibrant health and energy levels they never experienced before.</p>
        <p class="step-copy article-copy">The one-of-a-kind gifts and abilities you discover in yourself from a <strong><i>Cosmic Life Path Reading</i></strong> will allow you to finally see the kind of person you are meant to be with, {{ $name }}.</p>
        <p class="step-copy article-copy">You will finally stop wasting time on relationships that go nowhere.</p>
        <p class="step-copy article-copy">You will <strong>attract the right people</strong> to you to achieve what you need in life.</p>
        <p class="step-copy article-copy">You will <strong>attract the ideal career path for you,</strong> one that is 100% aligned with your <i>Cosmic Life Path</i>.</p>
        <p class="step-copy article-copy">The <strong>unique gifts</strong> you came here to share with others will at last be available to you so you can fulfil the mission you incarnated into this lifetime to achieve.</p>
        <p class="step-copy article-copy">You will also <strong>see hidden blind spots</strong> in yourself that have held you back from achieving success.</p>
        <p class="step-copy article-copy">A <i>Cosmic Life Path Reading</i> will help you overcome everything that has held you back in life so far... including those negative patterns like distraction, doom scrolling, or other addictions you thought were so hard to overcome before.</p>

        <h2 class="section-title step-title article-major-title mt-5">You will also get the following in your Cosmic Life Path Reading, {{ $name }}:</h2>
        <ul class="cosmic-benefits article-copy">
          <li><strong>How to understand on the deepest level who you are, what you are capable of.</strong> This is unlike any personality profile you have ever come across. It’s connected to the truest form of who you are.</li>
          <li><strong>The secret to using Astrology to guide your everyday decisions</strong> so you get the best outcomes in your love, wealth, and health.</li>
          <li><strong>Do you ever feel you are not reaching your maximum potential</strong>? You will be shocked at what you can achieve with this guide.</li>
          <li><strong>Little-known insights into how to attract soul-mate love almost effortlessly.</strong> These are so quick and easy that some people who’ve been alone for years have manifested a soul-mate in days.</li>
          <li><strong>The quickest and easiest way to multiply your good fortune in everyday life.</strong> Use these secrets to help tap into a sea of good fortune you can’t imagine possible right now.</li>
          <li><strong>What to do to connect with your higher self</strong> to open up a world of new possibilities and opportunities to more health, wealth, and love in your life.</li>
          <li>Your <strong><i>Cosmic Life Path Reading</i></strong> will be like ‘<strong>the north star</strong>’ of your life... always guiding you in the right direction.</li>
          <li>You will finally be able to let go of the stress or worry you’re carrying because you will feel like the universe is on your side for a change.</li>
          <li>All the amazing parts of yourself you learn about in your <i>Cosmic Life Path Reading</i> will propel you forward on your path to success and give you a massive unfair advantage in life.</li>
        </ul>

        <div class="offer-callout text-center my-5">
          <p class="offer-price-intro mb-1"><strong>I normally charge $750 for a personalised</strong></p>
          <p class="offer-price-script mb-0"><em>Cosmic Life Path Reading...</em></p>
        </div>

        <p class="step-copy article-copy">Private clients pay even more sometimes.</p>
        <p class="step-copy article-copy">Many of these clients say they have spent ten times that amount, though. Discovering the hidden parts of their personalities and their special gifts and talents opened up doors and opportunities they never imagined possible.</p>

        <p class="step-copy article-copy"><strong>Today, for the first time, I am opening this to everyone — at a fraction of what my private clients have always paid.</strong></p>
        <p class="step-copy article-copy">The investment is almost embarrassingly small for what you are about to receive.</p>
        <p class="step-copy article-copy">I want your Cosmic Life Path Reading to be the doorway to a new you — where every aspect of your life finally begins to move in the direction it was always meant to go.</p>
        <p class="step-copy article-copy">Where you tap into unique talents and gifts you never knew you possessed.<br>
        Where new opportunities appear before your eyes that you could never see before.<br>
        Where you become the parent, partner, and person you always knew you were capable of being.</p>
        <p class="step-copy article-copy">And if for any reason — or no reason at all — you are not completely satisfied, simply contact us for a full and complete refund. No questions. No quibbling. You are fully protected.</p>

        <h2 class="section-title step-title article-major-title mt-0 text-center">In The VIP Member’s Area, You Also Receive...</h2>
        <p class="offer-value text-center">Three exclusive bonuses that deepen, extend, and bring your Cosmic Life Path Reading to life.</p>

        <h3 class="article-subtitle mt-4">Bonus #1 — The Secret Language of Fame</h3>
        <p class="offer-value">Value $97</p>
        <p class="step-copy article-copy">What if the proof that your cosmic blueprint is real was hiding in plain sight — in the lives of the most celebrated people in the world?</p>
        <p class="step-copy article-copy">This exclusive guide reveals how the world's most iconic figures — billionaires, artists, visionaries, world leaders — unknowingly followed the exact same cosmic blueprint you now hold in your hands. Sign by sign, you will see their personality, their rise, their wounds, and their triumphs mapped perfectly onto the same design written for you at birth.</p>
        <p class="step-copy article-copy"><strong>When you see your blueprint in the people who changed the world, what becomes possible for you becomes impossible to ignore.</strong></p>

        <h3 class="article-subtitle mt-4">Bonus #2 — Your Soul Urge Number Report</h3>
        <p class="offer-value">Value $67</p>
        <p class="step-copy article-copy">Your Cosmic Life Path reveals what the stars wrote for you. Your Soul Urge Number reveals what your soul has been quietly asking for your entire life.</p>
        <p class="step-copy article-copy">Derived from your name using ancient numerology, this report uncovers the hidden desires and deepest motivations driving every major decision you have ever made — often without you realising it. Together with your reading, it completes the picture.</p>
        <p class="step-copy article-copy"><strong>Together, your Cosmic Life Path Reading and your Soul Urge Number Report create a complete picture of who you truly are — one that no single system alone could reveal.</strong></p>

        <h3 class="article-subtitle mt-4">Bonus #3 — Your Lunar Money Path Report</h3>
        <p class="offer-value">Value $167</p>
        <p class="step-copy article-copy">The moon governs the tides. It also governs your financial flow — if you know when to move with it.</p>
        <p class="step-copy article-copy">This report reveals the precise lunar windows each month when your sign is most cosmically aligned with financial opportunity. Use it to time your decisions, your investments, and your biggest moves for maximum cosmic advantage — month after month, year after year.</p>
        <p class="step-copy article-copy"><strong>Use it to time your decisions, your investments, your biggest financial moves, and even your everyday choices for maximum cosmic advantage. Month after month, year after year — the moon is always there, and now you will finally know exactly when to act.</strong></p>

        <!-- <hr class="mt-5">
        <h4 class="text-center">Total Bonus Value: $331  <br>  Yours FREE when You claim your VIP access Today</h4>
        <hr class="mb-5"> -->
        <div class="bonus-total-section">
          <p class="label">✦ Total Bonus Value ✦</p>
          <p class="value">$331</p>
          <p class="free-text">Yours <strong>FREE</strong> When You Claim Your VIP Access Today</p>
        </div>

        <section class="pricing-compare my-5" aria-label="Pricing options" id="section_pricing">
          <h2 class="section-title step-title pricing-title mb-4">Choose Your Path, {{ $name }}</h2>

          <div class="row g-4 align-items-stretch">
            <div class="col-lg-6">
              <article class="pricing-card pricing-card-standard h-100">
                <div>
                  <p class="pricing-tier">Standard Access</p>
                  <p class="pricing-price">$14.97</p>
                  <p class="pricing-subtitle">Your Core Reading</p>
                </div>

                <ul class="pricing-list">
                  <li>Complete 30+ Page Cosmic Life Path Reading</li>
                  <li>Hidden Gifts &amp; Blind Spots Finally Exposed</li>
                  <li>The Cosmic Key To Your Personal Wealth</li>
                  <li>Love Secrets &amp; Soulmate Blueprint</li>
                  <li>Health Blueprint Written In Your Stars</li>
                  <li>Life Purpose &amp; Divine Mission Revealed</li>
                  <li>Deep Trauma Release Unique To Your Sign</li>
                  <li>Instant Digital Delivery</li>
                  <li>365-Day Money-Back Guarantee</li>
                </ul>

                <a href="{{ $checkoutUrl }}" target="_blank" rel="noopener noreferrer" class="btn pricing-btn pricing-btn-standard">
                  Gain Standard Access Now →
                </a>
              </article>
            </div>

            <div class="col-lg-6" id="vip_option">
              <article class="pricing-card pricing-card-vip h-100">
                <div class="pricing-badge">Most Popular - 84% Choose This</div>
                <div>
                  <p class="pricing-tier">VIP Access</p>
                  <p class="pricing-price">$47</p>
                  <p class="pricing-subtitle">Everything + 3 Exclusive Bonuses</p>
                </div>

                <p class="pricing-group-title pricing-group-title-plus"><em>Everything in Standard Package, PLUS:</em></p>
                <ul class="pricing-list">
                  <li>Personal Foreword and Insights By Celestra Vonn</li>
                  <li>Priority Email Support</li>
                  <li>First Access To New Readings &amp; Updates Before Anyone Else</li>
                </ul>

                <p class="pricing-group-title">+ 3 Exclusive Bonuses (Worth 428)</p>
                <ul class="pricing-list pricing-list-bonus">
                  <li>
                    The Secret Language of Fame
                    <span class="pricing-value">Value: $97 - FREE</span>
                  </li>
                  <li>
                    Your Soul Urge Number Report
                    <span class="pricing-value">Value: $67 - FREE</span>
                  </li>
                  <li>
                    Your Lunar Money Path Report
                    <span class="pricing-value">Value: $167 - FREE</span>
                  </li>
                </ul>

                <a href="{{ $checkoutUrl }}" target="_blank" rel="noopener noreferrer" class="btn pricing-btn pricing-btn-vip">
                  Gain VIP Access Now →
                </a>
              </article>
            </div>
          </div>

          <p class="pricing-trust text-center mb-0">🔒 Secure Checkout - 💳 All Cards Accepted - ✅ 365-Day Money-Back Guarantee</p>
        </section>
        
        <h2 class="section-title step-title article-major-title mt-0">{{ $name }}, Right now, you're standing at a fork in the road…</h2>
        <p class="step-copy article-copy"><strong>The first path is the one you already know.</strong></p>
        <p class="step-copy article-copy">Walk away, forget you were ever here, and tomorrow looks exactly like today.</p>
        <p class="step-copy article-copy">The bills don't get lighter. The relationship doesn't get easier.</p>

        <div class="article-inline-media article-inline-media-left my-4">
          <div class="article-inline-visual">
            <img src="{{ asset('imgs/sale-page/wrong-way.png') }}" alt="Bad idea" class="img-fluid">
          </div>
          <div class="article-inline-copy">
            <p class="step-copy article-copy">The Sunday night dread doesn't go anywhere.</p>
            <p class="step-copy article-copy">A year from now, you'll be in the same spot, wondering why nothing ever seems to shift — not because you're not trying, but because you never had the right starting point.</p>
          </div>
          
        </div>
        
        <p class="step-copy article-copy"><strong>The second path begins with your <i>Cosmic Life Path Reading</i>.</strong></p>
         <div class="article-inline-media my-4">
          <div class="article-inline-copy order-2 order-md-1">
            <p class="step-copy article-copy">Not with promises.</p>
            <p class="step-copy article-copy">With clarity.</p>
            <p class="step-copy article-copy">A deep, personalised understanding of who you are, how you're wired, and what you've been working against without even knowing it.</p>
            <p class="step-copy article-copy">From that clarity, things begin to move. Money flows more freely — not by accident, but because you're finally playing to your strengths.</p>
            
          </div>
          <div class="article-inline-visual order-1 order-md-2">
            <img src="{{ asset('imgs/sale-page/correct-way.jpg') }}" alt="Good idea" class="img-fluid">
          </div>
        </div>
        <p class="step-copy article-copy">The financial breathing room you've been craving starts to feel real. Security. Flexibility. The ability to say yes to things that used to be out of reach.</p>
        <p class="step-copy article-copy">Your relationships deepen. Your energy lifts. Your health starts reflecting the life you're building rather than the stress you've been carrying.</p>
        <p class="step-copy article-copy">You stop waiting for life to get better.</p>
        <p class="step-copy article-copy"><strong>You start making it better.</strong></p>
        <p class="step-copy article-copy">The fork is right in front of you, {{ $name }}. One direction keeps you exactly where you are. The other finally moves you forward.</p>
        <p class="step-copy article-copy mb-0"><strong>Choose your path below and claim your reading now.</strong></p>
  
        <div class="text-center my-5">
          <a href="#vip_option" class="btn hero-cta btn step-next-btn">
            I Am Ready — Send My Full Report Now →
          </a>
          <p class="pricing-trust text-center mb-0">🔒 Secure Checkout - 💳 All Cards Accepted - ✅ 365-Day Money-Back Guarantee</p>
        </div>

        <!-- testimonials Section -->
        <div class="social-proof-wrap mt-5 text-center">
          <div class="trust-pill">Real client experiences</div>
          <div class="row g-4 mt-2">
            <div class="col-md-4">
              <div class="proof-card h-100 text-center">
                <img src="{{ asset('imgs/avatar/james.png') }}" alt="James R." class="testimonial-avatar">
                <p class="proof-name mb-2">James R.<span class="d-block mt-2 testimonial-location">Madison, Wisconsin</span></p>
                <p class="proof-quote">“I've always known there was more to me than what I was living. My Cosmic Life Path Reading described things about my personality and my blocks that I had never told anyone. Three months later I changed careers and landed a role that finally feels like it was made for me. I genuinely believe this reading put me on the right path.”</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="proof-card h-100 text-center">
                <img src="{{ asset('imgs/avatar/elzabeth.png') }}" alt="Elizabeth G." class="testimonial-avatar">
                <p class="proof-name mb-2">Elizabeth G. <span class="d-block mt-2 testimonial-location">Franklin, Tennessee</span></p>
                <p class="proof-quote">“I was going through one of the hardest seasons of my life when I found this. The reading didn't just describe who I am — it helped me understand why I kept repeating the same patterns in my relationships and my finances. For the first time I felt like I actually had a map. I've recommended it to everyone I know.”</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="proof-card h-100 text-center">
                <img src="{{ asset('imgs/avatar/lauren.png') }}" alt="Lauren M." class="testimonial-avatar">
                <p class="proof-name mb-2">Lauren M. <span class="d-block mt-2 testimonial-location">Ashland, Oregon</span></p>
                <p class="proof-quote">“I've had my cards read before and always walked away feeling like it could apply to anyone. This was completely different. Celestra described things about my inner world that I had never shared with another soul. It felt like someone finally saw me — not the version I show the world, but the real me. I've read it four times now.”</p>
              </div>
            </div>
          </div>
        </div>
      </article>
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
  </script>
@endpush
