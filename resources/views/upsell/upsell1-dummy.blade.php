@extends('layouts.app')

@section('title', 'Your Cosmic Wealth Path Reading - ' . $sign['name'])

@section('content')
  <section class="small-gap-start step-section container">
    <div class="step-panel mx-auto article-panel">
      <article class="cosmic-article mx-auto">
        <!-- Hero Section -->
        <h1 class="text-center download-title">Hey, the first part of your <strong class="accent">Cosmic Life Path Reading</strong> is here…</h1>

        <!-- Welcome Section -->
        <p class="step-copy article-copy mt-5"><span class="drop-cap">W</span>elcome to the start of your <em>Cosmic Life Path Reading</em>.</p>
        <p class="step-copy article-copy"><em>It's</em> <strong>Celestra Vonn</strong> here again.</p>
        <p class="step-copy article-copy">First of all, let me say congratulations.</p>
        <p class="step-copy article-copy">You did the smart thing by accessing your reading today.</p>
        <p class="step-copy article-copy">I could see from your initial reading that you're one of those savvy people who almost always make the right decision.</p>
        <p class="step-copy article-copy">Some of the key aspects of your reading will be covered below. The rest will be sent to your email.</p>

        <p class="step-copy article-copy">A personalized <em><strong>Cosmic Wealth Path Reading</strong></em> will show you how to make money in ways that are aligned to your Cosmic Life Path, so money comes much easier with a lot less resistance.</p>
        <p class="step-copy article-copy"><strong>You can access your <em>Cosmic Wealth Path Reading</em> right now for only $67.</strong></p>
        
  
        <!-- Bonuses Section -->
        <h2 class="article-subtitle mt-5"><strong>But wait, there's more…</strong></h2>
        <div class="download-main-sign-image-row mt-5">
            <img src="{{ asset('imgs/ebook/upsell1/' . strtolower($sign['name']) . '-bundle.png') }}" alt="Cosmic Wealth Path - {{ $sign['name'] }}" class="special-access-fullpack-img">
        </div>

        <h3 class="article-subtitle mt-4"><strong>Bonus #1 - Your Wealth Signals</strong></h3>
        <div class="article-inline-media article-inline-media-left my-4">
            <div class="article-inline-visual">
                <img src="{{ asset('imgs/ebook/upsell1/bonus1.png') }}" alt="Your Wealth Signals" class="img-fluid" style="max-height: 300px; object-fit: contain;">
            </div>
            <div class="article-inline-copy">
                <p class="step-copy article-copy">Every sign on the <em>Cosmic Mandala Astrology</em> chart has its own wealth signal. These are signals your sign is sensitive to that will indicate when a chance to attract wealth and good fortune is near.</p>
                <p class="step-copy article-copy">Knowing these signals can attract levels of good fortune you can't even imagine right now.</p>
                <p class="step-copy article-copy">Knowing these signals can attract levels of good fortune you can’t even imagine right now.</p>
            </div>
        </div>

        <h3 class="article-subtitle mt-4"><strong>Bonus #2 - Cosmic Life Path Wealth Meditation</strong></h3>
        <div class="article-inline-media article-inline-media-right my-4">
            <div class="article-inline-copy order-2 order-lg-1">
                <p class="step-copy article-copy">This is a beautiful meditation to attract abundance into your life, and it's going to be even more powerful now that you have your Cosmic Wealth Path Reading.</p>
                <p class="step-copy article-copy">This wealth meditation will raise your frequency and make you even more open to attracting abundance.</p>
                <p class="step-copy article-copy">It takes just minutes a day to listen to.</p>
            </div>
            <div class="article-inline-visual order-1 order-lg-2">
                <img src="{{ asset('imgs/ebook/upsell1/bonus2.png') }}" alt="Cosmic Life Path Wealth Meditatio" class="img-fluid" style="max-height: 300px; object-fit: contain;">
            </div>
        </div>


        <!-- Guarantee Section -->
        <p class="step-copy article-copy mb-0">And don't worry, you are backed by a</p>
        <h3 class="article-subtitle mt-0"><strong>One year iron-clad 365-day guarantee</strong></h3>
        <p class="step-copy article-copy"><strong>Here's how it works.</strong></p>
        <p class="step-copy article-copy">Get access to your <em>Cosmic Wealth Path Reading</em> today and all your bonuses by clicking the button below.</p>
        <p class="step-copy article-copy">See for the first time ever the Wealth Attraction talents and skills you possess that are unique to you and only you.</p>
        <p class="step-copy article-copy">Remove the financial block from your energy system.</p>
        <p class="step-copy article-copy">Watch money and opportunities for more wealth come flooding into your life like never before.</p>
        <p class="step-copy article-copy">And if for any reason you are not happy anytime in the next 365 days, send me a quick email for a full and complete refund.</p>




        <!-- Final CTA -->
        <p class="step-copy article-copy"><strong><em>Click the button below right now</em></strong> to claim your <em>Cosmic Wealth Path Reading.</em></a>

        <div class="download-main-sign-image-row mt-5">
            <img src="{{ asset('imgs/ebook/upsell1/' . strtolower($sign['name']) . '-bundle.png') }}" alt="Cosmic Wealth Path - {{ $sign['name'] }}" class="special-access-fullpack-img">
        </div>
        <div class="text-center mt-5">
          <a href="{{ $sign['upsell1_accept_cta_url'] }}" class="hero-cta btn step-next-btn">Claim Your Cosmic Wealth Path Reading Now →</a>
        </div>
        <div class="text-center mt-3 mb-5">
          <a class="text-decoration-none text-semiwhite" href="{{ $sign['upsell1_decline_cta_url'] }}">No thanks, Celestra. I'll continue leaving my financial future to chance.</a>
        </div>
        
        <p class="step-copy article-copy"><strong>Remember, this is a one-time offer</strong></p>
        <p class="step-copy article-copy">You will not have this opportunity again.</p>

      </article>
    </div>
  </section>
@endsection

@push('scripts')
  <script>
    window.COSMIC_SOCIAL_PROOF = {
      enabled: true,
      mode: 'upsell1',
      visibleMs: 5000,
      minDelayMs: 5000,
      maxDelayMs: 30000,
    };
  </script>
@endpush
