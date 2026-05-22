@extends('layouts.app')

@section('title', 'Your Cosmic Energy Path Reading')

@section('content')
  <section class="small-gap-start step-section container">
    <div class="step-panel mx-auto article-panel">
      <article class="cosmic-article mx-auto">
        <h3 class="article-subtitle text-white">Hey there, <strong class="accent text-light">Celestra Vonn</strong> here again.</h3>
        <p class="step-copy article-copy"><strong>Celestra Vonn</strong> here again,</p>
        <p class="step-copy article-copy"><strong>Congratulations on getting your <em>Cosmic Love Path Reading</em>.</strong></p>
        <p class="step-copy article-copy">You have my greatest respect for coming this far.</p>
        <p class="step-copy article-copy">Not many people have taken the journey you have here today.</p>
        <p class="step-copy article-copy">I just have one more short message you need to hear.</p>


        <p class="step-copy article-copy">The new journey on your <strong><em>Cosmic Life Path</em></strong> is going to be incredible.</p>
        <p class="step-copy article-copy">I just want you to be able to enjoy this time to the max.</p>
        <p class="step-copy article-copy">After all, what’s the point in aligning with all your new gifts and talents and experiencing an amazing new life, and not having the health and energy to enjoy it?</p>
        <p class="step-copy article-copy">For this reason, I want to give you one final reading here today.</p>

        <h2 class="article-subtitle mt-5">Your personalized <strong>Cosmic Energy Path</strong> Reading.</h2>
        <div class="download-main-sign-image-row mt-5">
          <img src="{{ asset('imgs/ebook/upsell3/upsell-3.png') }}" alt="Cosmic Energy Path" class="download-main-img-large">
        </div>

        <p class="step-copy article-copy">When you act right now, I want to give you access to your <strong><em>Cosmic Energy Path Reading</em></strong> today for just <strong>$47</strong>.</p>
        <p class="step-copy article-copy">That’s all.</p>
        <p class="step-copy article-copy">Nothing more.</p>
        <p class="step-copy article-copy">And of course, you are backed here by my 365-day guarantee.</p>
        <p class="step-copy article-copy">You will receive access to your <strong><em>Cosmic Energy Path Reading</em></strong> in <strong>the next 24 hours</strong>.</p>

        <p class="step-copy article-copy">Use the reading to feel more empowered and energized than ever before.</p>
        <p class="step-copy article-copy">And if for some reason or no reason you are not absolutely blown away by the results you experience…</p>
        <p class="step-copy article-copy">Simply send me an email to my personal email address, and you will get a full and complete refund.</p>
        <p class="step-copy article-copy">No questions asked.</p>
        <p class="step-copy article-copy">Remember, you will not see this page again or have this opportunity to boost your energy and vitality with a powerful reading like this.</p>
        <p class="step-copy article-copy"><strong>Hit the add to order button below</strong> and get access to your personalized Cosmic Energy Path Reading in the next 24 hours.</p>
        <p class="step-copy article-copy">You’ll thank me for it later.</p>

        <div class="download-main-sign-image-row mt-5">
          <img src="{{ asset('imgs/ebook/upsell3/upsell-3.png') }}" alt="Cosmic Energy Path" class="download-main-img-large">
        </div>
        <div class="text-center mt-5">
          <a href="https://clifepath.pay.clickbank.net/?cbitems=oto3-47&cbur=a" class="hero-cta btn step-next-btn">Get Cosmic Energy Path Reading ($47) →</a>
        </div>
        <div class="text-center mt-3 mb-5">
          <a class="text-decoration-none text-semiwhite" href="https://clifepath.pay.clickbank.net/?cbitems=oto3-47&cbur=d">No thanks, Celestra. I’m okay to feel drained while stepping into my new life.</a>
        </div>

     

      </article>
    </div>
  </section>
@endsection
@push('scripts')
  <script>
    window.COSMIC_SOCIAL_PROOF = {
      enabled: true,
      mode: 'upsell3',
      visibleMs: 5000,
      minDelayMs: 5000,
      maxDelayMs: 30000,
    };
  </script>
@endpush