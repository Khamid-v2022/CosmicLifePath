@extends('layouts.app')

@section('title', 'Your Cosmic Love Path Reading - ' . $sign['name'])

@section('content')
  <section class="small-gap-start step-section container">
    <div class="step-panel mx-auto article-panel">
      <article class="cosmic-article mx-auto">
        <h3 class="article-subtitle text-white">Hey there, <strong class="accent text-light">Celestra Vonn</strong> here again.</h3>
        <p class="step-copy article-copy">Just dropping in to say a big congratulations.</p>
        <p class="step-copy article-copy">Well done on getting your <em>Cosmic Wealth Path Reading</em>. </p>
        <p class="step-copy article-copy">I know from my knowledge of <strong>Cosmic Mandala Astrology</strong> how the planets can deeply influence the love and connection we experience in our lives.</p>


        <div class="article-inline-media my-4">
          <div class="article-inline-copy order-2 order-lg-1">            
             <p class="step-copy article-copy">Today, I want to show you how to harness that astrological power to help attract the incredible love and connection you always deserved.</p>
            <p class="step-copy article-copy">This will help you to at last find the intimacy and spiritual connection you are looking for.</p>
            <p class="step-copy article-copy">You will see what the planets in your cosmic life path have in store for you when it comes to manifesting love and a deep connection with that special other.</p>
          </div>
          <div class="article-inline-visual order-1 order-lg-2">
            <img src="{{ asset('imgs/upsell/up2-sec4.png') }}" alt="Cosmic life path benefits" class="img-fluid">
          </div>
        </div>

        <p class="step-copy article-copy">And you will find your romantic relationships becoming easier than ever before.</p>

        <!-- <h2 class="article-subtitle mt-5"><strong>Personalized Cosmic Love Path Reading</strong></h2> -->
        <p class="step-copy article-copy">That’s why I’m so excited to give you a personalized <strong><em>Cosmic Love Path Reading</em></strong>.</p>
        <div class="download-main-sign-image-row mt-5">
          <img src="{{ asset('imgs/ebook/upsell2/' . strtolower($sign['name']) . '.png') }}" alt="Cosmic Love Path - {{ $sign['name'] }}" class="download-main-img-large">
        </div>

        <p class="step-copy article-copy">When you click the button below, you can now access your <strong><em>Personalized Cosmic Love Path Reading</em></strong> for <strong>just $47</strong>.</p>

        <div class="text-center mt-5">
          <a href="{{ $sign['upsell2_accept_cta_url'] }}" class="hero-cta btn step-next-btn">Get Your Personalized Cosmic Love Path Reading ($47) →</a>
        </div>
        <div class="text-center mt-3 mb-5">
          <a class="text-decoration-none text-danger" href="{{ $sign['upsell2_decline_cta_url'] }}">No thanks, Celestra. I’ll continue hoping the right person somehow finds me.</a>
        </div>

        <p class="step-copy article-copy">That’s a fraction of its true value.</p>
        <p class="step-copy article-copy">You will receive your personalized reading in the next 24 hours… and your love life and relationships will never be the same again.</p>

        <p class="step-copy article-copy">When you hit the button below, you will also get the following <strong>2 incredible bonuses</strong>.</p>

        <h3 class="article-subtitle mt-4"><strong>Bonus #1 — Cosmic Love Wound Release Ritual</strong></h3>
        <div class="article-inline-media article-inline-media-left my-4">
          <div class="article-inline-visual">
            <img src="{{ asset('imgs/ebook/upsell2/bonus1.png') }}" alt="Love Wound Ritual" class="img-fluid" style="max-height: 300px; object-fit: contain;">
          </div>
          <div class="article-inline-copy">
            <p class="step-copy article-copy">So many beautiful souls carry old love wounds that quietly block them from the connection they truly deserve — without ever realising it is happening. These wounds can close the heart off to love before it even has a chance to arrive.</p>
            <p class="step-copy article-copy">This sign-specific ritual gently guides you through releasing those wounds at their root, so your heart can finally open and become free to receive the love that was always meant for you.</p>
          </div>
        </div>

        <h3 class="article-subtitle mt-4"><strong>Bonus #2 — Love Frequency Activation</strong></h3>
        <div class="article-inline-media article-inline-media-right my-4">
          <div class="article-inline-copy order-2 order-lg-1">
            <p class="step-copy article-copy">When past hurts go unhealed, the energetic frequency of the heart can drop — and love can struggle to reach you as a result.</p>
            <p class="step-copy article-copy">This beautiful activation gently brings your heart frequency back to its natural peak. It works at the same energetic level where those hurts are held, to help you move through the world open, receptive, and truly ready for the deep connection you deserve.</p>
          </div>
          <div class="article-inline-visual order-1 order-lg-2">
            <img src="{{ asset('imgs/ebook/upsell2/bonus2.png') }}" alt="Love Frequency Activation" class="img-fluid" style="max-height: 300px; object-fit: contain;">
          </div>
        </div>

        <p class="step-copy article-copy"><strong>Click the button below</strong> to get access today while there’s still time.</p>

        <div class="download-main-sign-image-row mt-5">
          <img src="{{ asset('imgs/ebook/upsell2/' . strtolower($sign['name']) . '-bundle.png') }}" alt="Cosmic Love Path - {{ $sign['name'] }}" class="special-access-fullpack-img">
        </div>
        <div class="text-center mt-5">
          <a href="{{ $sign['upsell2_accept_cta_url'] }}" class="hero-cta btn step-next-btn">Get Your Cosmic Love Path Reading Now ($47) →</a>
        </div>
        <div class="text-center mt-3 mb-5">
          <a class="text-decoration-none text-danger" href="{{ $sign['upsell2_decline_cta_url'] }}">No thanks, Celestra. I’ll continue hoping the right person somehow finds me.</a>
        </div>

      </article>
    </div>
  </section>
@endsection

@push('scripts')
  <script>
    window.COSMIC_SOCIAL_PROOF = {
      enabled: true,
      mode: 'upsell2',
      visibleMs: 5000,
      minDelayMs: 5000,
      maxDelayMs: 30000,
    };
  </script>
@endpush