@extends('layouts.app')

@section('title', 'Special Offer')

@section('content')
  @php
    $today = now()->format('F j, Y');
    $name = 'David';
  @endphp

  <section class="small-gap-start step-section container">
    <div class="step-panel mx-auto article-panel">
      <article class="cosmic-article mx-auto">

        <h1 class="section-title step-title text-center mb-4">The Cosmos Has Guided You Here Today On {{ $today }}, {{ $name }}...<br> Now Is The Time To Begin Your Magical Journey As You Follow Your <i>Cosmic Life Path</i></h1>

        <div class="article-image-wrap article-hero-image-wrap text-center mb-4">
          <img src="{{ asset('imgs/sale-page/main-header.jpg') }}" alt="Cosmic life path hero" class="img-fluid cosmic-result-image article-feature-image">
        </div>

        <p class="step-copy article-copy">All the <strong>unique obstacles and challenges</strong> you have faced in life have guided you here right now, {{ $name }}.</p>
        <p class="step-copy article-copy">This is exactly where you are supposed to be.</p>
        <p class="step-copy article-copy">There’s a reason why you incarnated here on earth.</p>
        <p class="step-copy article-copy">You are here to fulfil your own <strong>personal mission</strong>... to follow your particular <i><strong>Cosmic Life Path</strong></i> that no one else can follow.</p>
        <p class="step-copy article-copy">It’s vital right now that you discover and follow your <strong>distinct <i>Cosmic Life Path</i></strong> so you can play your part in the transition we are currently going through on Earth.</p>


        <h2 class="section-title step-title article-major-title mt-5" style="text-transform: capitalize;"><strong >Cancer Cosmic Life Path Reading Full Report</strong></h2>

      
        <div class="article-image-wrap article-hero-image-wrap text-center mb-4">
          <img src="{{ asset('imgs/ebook/horoscope/cancer.png') }}" alt="Cancer Cosmic Life Path" class="" style="max-width: 230px;">
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
        


        <h3 class="article-subtitle mt-4">Bonus #1 — The Secret Language of Fame</h3>

        <div class="article-inline-media my-4">
          <div class="article-inline-copy order-2 order-lg-1">
            <p class="step-copy article-copy">What if the proof that your cosmic blueprint is real was hiding in plain sight — in the lives of the most celebrated people in the world?</p>
            <p class="step-copy article-copy">This exclusive guide reveals how the world's most iconic figures — billionaires, artists, visionaries, world leaders — unknowingly followed the exact same cosmic blueprint you now hold in your hands. Sign by sign, you will see their personality, their rise, their wounds, and their triumphs mapped perfectly onto the same design written for you at birth.</p>
          </div>
          <div class="article-inline-visual order-1 order-lg-2">
            <img src="{{ asset('imgs/ebook/bonuse/bonus2.jpg') }}" alt="The Secret Language of Fame" class="download-main-img-large">
          </div>
        </div>
         <p class="step-copy article-copy"><strong>When you see your blueprint in the people who changed the world, what becomes possible for you becomes impossible to ignore.</strong></p>


        <h3 class="article-subtitle mt-4">Bonus #2 — Your Soul Urge Number Report</h3>

        <div class="article-inline-media article-inline-media-left my-4">
          <div class="article-inline-visual">
            <img src="{{ asset('imgs/ebook/bonuse/bonus3.jpg') }}" alt="Your Lunar Money Path Report" class="download-main-img-large">
          </div>
          <div class="article-inline-copy">
            <p class="step-copy article-copy">Your Cosmic Life Path reveals what the stars wrote for you. Your Soul Urge Number reveals what your soul has been quietly asking for your entire life.</p>
            <p class="step-copy article-copy">Derived from your name using ancient numerology, this report uncovers the hidden desires and deepest motivations driving every major decision you have ever made — often without you realising it. Together with your reading, it completes the picture.</p>
          </div>
        </div>
        <p class="step-copy article-copy"><strong>Together, your Cosmic Life Path Reading and your Soul Urge Number Report create a complete picture of who you truly are — one that no single system alone could reveal.</strong></p>


        <h3 class="article-subtitle mt-4">Bonus #3 — Your Lunar Money Path Report</h3>

        <div class="article-inline-media my-4">
          <div class="article-inline-copy order-2 order-lg-1">
            <p class="step-copy article-copy">The moon governs the tides. It also governs your financial flow — if you know when to move with it.</p>
            <p class="step-copy article-copy">This report reveals the precise lunar windows each month when your sign is most cosmically aligned with financial opportunity. Use it to time your decisions, your investments, and your biggest moves for maximum cosmic advantage — month after month, year after year.</p>
          </div>
          <div class="article-inline-visual order-1 order-lg-2">
            <img src="{{ asset('imgs/ebook/bonuse/bonus1.jpg') }}" alt="Your Lunar Money Path Report" class="download-main-img-large">
          </div>
        </div>
        <p class="step-copy article-copy"><strong>Use it to time your decisions, your investments, your biggest financial moves, and even your everyday choices for maximum cosmic advantage. Month after month, year after year — the moon is always there, and now you will finally know exactly when to act.</strong></p>
        
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

                <a href="https://clifepath.pay.clickbank.net/?cbitems=fe-cancer47&template=BCoFTclp&cbfid=63362&vtid=cta1" target="_blank" rel="noopener noreferrer" class="btn pricing-btn pricing-btn-standard">
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

                <p class="pricing-group-title">+ 3 Exclusive Bonuses</p>
                <ul class="pricing-list pricing-list-bonus">
                  <li>
                    The Secret Language of Fame 
                    <svg width="36" height="20" viewBox="0 0 36 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="0.5" y="0.5" width="35" height="19" rx="4" fill="#e2c97e22" stroke="#e2c97e" stroke-width="1"/>
                      <text x="18" y="14" text-anchor="middle" font-size="9.5" font-weight="700" fill="#e2c97e" font-family="sans-serif" letter-spacing="1">VIP</text>
                    </svg>
                  </li>
                  <li>
                    Your Soul Urge Number Report
                    <svg width="36" height="20" viewBox="0 0 36 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="0.5" y="0.5" width="35" height="19" rx="4" fill="#e2c97e22" stroke="#e2c97e" stroke-width="1"/>
                      <text x="18" y="14" text-anchor="middle" font-size="9.5" font-weight="700" fill="#e2c97e" font-family="sans-serif" letter-spacing="1">VIP</text>
                    </svg>
                  </li>
                  <li>
                    Your Lunar Money Path Report
                    <svg width="36" height="20" viewBox="0 0 36 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="0.5" y="0.5" width="35" height="19" rx="4" fill="#e2c97e22" stroke="#e2c97e" stroke-width="1"/>
                      <text x="18" y="14" text-anchor="middle" font-size="9.5" font-weight="700" fill="#e2c97e" font-family="sans-serif" letter-spacing="1">VIP</text>
                    </svg>
                  </li>
                </ul>

                <a href="https://clifepath.pay.clickbank.net/?cbitems=fe-cancer15&template=BCoFTclp&cbfid=63362&vtid=cta1" target="_blank" rel="noopener noreferrer" class="btn pricing-btn pricing-btn-vip">
                  Gain VIP Access Now →
                </a>
              </article>
            </div>
          </div>

          <p class="pricing-trust text-center mb-0">🔒 Secure Checkout - 💳 All Cards Accepted - ✅ 365-Day Money-Back Guarantee</p>
        </section>
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
