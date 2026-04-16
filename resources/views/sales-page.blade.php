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
        <p class="section-label text-center">Special Offer</p>
        <h1 class="section-title step-title text-center mb-4">The Cosmos Has Guided You Here Today On {{ $today }}, {{ $name }}...<br>Now Is The Time To Begin Your Magical Journey As You Follow Your <i>Cosmic Life Path</i></h1>

        <div class="article-image-wrap article-hero-image-wrap text-center mb-4">
          <img src="{{ asset('imgs/sale-page/main-header.jpg') }}" alt="Cosmic life path hero" class="img-fluid cosmic-result-image article-feature-image">
        </div>

        <p class="step-copy article-copy">All the <strong>unique obstacles and challenges</strong> you have faced in life have guided you here right now, {{ $name }}.</p>
        <p class="step-copy article-copy">This is exactly where you are supposed to be.</p>
        <p class="step-copy article-copy">There’s a reason why you incarnated here on earth.</p>
        <p class="step-copy article-copy">You are here to fulfil your own <strong>personal mission</strong>...to follow your particular <i><strong>Cosmic Life Path</strong></i> that no one else can follow.</p>
        <p class="step-copy article-copy">It’s vital right now that you discover and follow your <strong>distinct <i>Cosmic Life Path</i></strong> so you can play your part in the transition we are currently going through on Earth.</p>


        <h2 class="article-subtitle mt-0">It’s what drives me to create this special Cosmic Life Path reading for people like you {{ $name }}...</h2>
        
        <div class="article-inline-media my-4">
          <div class="article-inline-copy">
            <p class="step-copy article-copy">The <i><strong>Cosmic Life Path</strong></i> is like a cosmic, divine map... guiding you to the path to live the kind of life you were meant to live...that brings you the greatest joy and abundance.</p>
            <p class="step-copy article-copy">It’s like a <i>‘cheat code’</i> to levelling up FAST and finally living the kind of life you’ve been dreaming of...while clearing all the obstacles away to that special life you were meant to live.</p>
          </div>
          <div class="article-inline-visual">
            <img src="{{ asset('imgs/sale-page/introduction.jpg') }}" alt="Introduction to the cosmic reading" class="img-fluid cosmic-result-image">
          </div>
        </div>
        <p class="step-copy article-copy">Your <i>Cosmic Life Path Reading</i> was designed by the <strong>unique cosmic energy patterns of the planets at the time of your birth</strong>.</p>
        <p class="step-copy article-copy">You are now uncovering that divine plan for your life right now.</p>
        <p class="step-copy article-copy">You’re about to discover special talents and gifts you never knew you had, along with how to use them to carry out your life purpose and attract wealth effortlessly.</p>
        <p class="step-copy article-copy">{{ $name }}, you will also see for the first time ever your <strong>individual hidden inner blocks</strong> you have been carrying all your life that have prevented the success you want to manifest.</p>
        <p class="step-copy article-copy">Your <i>Cosmic Life Path Reading</i> will reveal the secret <strong>you alone can recognize</strong> to have an intimate soul-mate relationship.</p>
        <p class="step-copy article-copy">You will discover <strong>your unique health challenges</strong> and how to overcome them.</p>
        <p class="step-copy article-copy mb-0">You will discover all this and more inside your...</p>


        <h2 class="section-title step-title article-major-title mt-5"><strong>Cosmic Life Path Reading</strong></h2>
        <p class="step-copy article-copy">Here’s just some of what you will discover inside your <i>Cosmic Life Path Reading {{ $name }}:</i></p>

        <h3 class="article-subtitle mt-0">Your Cosmic Personality Code:</h3>
        <div class="article-inline-media article-inline-media-left media-image-left my-4">
          <div class="article-inline-copy">
            <p class="step-copy article-copy mb-0">This is who you are at the core of your being. The hidden parts of your personality that you are not aware of. You will see hidden gifts <strong>you alone possess,</strong> along with <strong>your distinctive blind spots</strong> that stop you from using them to attract more abundance.</p>
          </div>
          <div class="article-inline-visual">
            <img src="{{ asset('imgs/sale-page/personality-code.jpg') }}" alt="Your cosmic personality code" class="img-fluid cosmic-result-image">
          </div>
        </div>

        <div class="article-inline-media my-4">
          <div class="article-inline-copy">
            <h3 class="article-subtitle mt-0">Your Cosmic Potential Unleashed:</h3>
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

        <div class="article-inline-media my-4">
          <div class="article-inline-copy">
            <h3 class="article-subtitle mt-0">Cosmic Vibrant Health Unlocked</h3>
            <p class="step-copy article-copy mb-0">In this part of the reading, I will reveal to you the key to having vibrant health and wellness <strong>according to your individual Cosmic Life Path charts,</strong> no matter what your genetics or family history.</p>
          </div>
          <div class="article-inline-visual">
            <img src="{{ asset('imgs/sale-page/vibrant-health.jpg') }}" alt="Cosmic vibrant health unlocked" class="img-fluid cosmic-result-image">
          </div>
        </div>

        <h3 class="article-subtitle mt-0">Cosmic Wealth Key</h3>
        <div class="article-inline-media media-image-left my-4">
          <div class="article-inline-copy">
            <p class="step-copy article-copy mb-0">Every <i>Cosmic Life Path Reading</i> has a <strong>unique Cosmic Wealth key.</strong> This Cosmic Wealth Key is <strong>unique to you and you alone.</strong> It’s your key to manifesting wealth and abundance in the least amount of time possible.</p>
          </div>
          <div class="article-inline-visual">
            <img src="{{ asset('imgs/sale-page/wealth-key.jpg') }}" alt="Cosmic wealth key" class="img-fluid cosmic-result-image">
          </div>
        </div>

        <h3 class="article-subtitle mt-0">Cosmic Trauma Release</h3>
        <div class="article-inline-media my-4">
          <div class="article-inline-copy">
            <p class="step-copy article-copy">We all carry trauma in our lives. This part of the <i>Cosmic Life Path Reading</i> helps you to <strong>release the personal trauma</strong> held in your cells that holds you back in life...and stops you from being all you can be.</p>
            <p class="step-copy article-copy mb-0">You might not realise it yet {{ $name }}, but...</p>
          </div>
          <div class="article-inline-visual">
            <img src="{{ asset('imgs/sale-page/trauma-release.jpg') }}" alt="Cosmic trauma release" class="img-fluid cosmic-result-image">
          </div>
        </div>


        <h2 class="section-title step-title article-major-title mt-5">A <i>Cosmic Life Path Reading</i> Will Transform Your Life...</h2>
        <p class="step-copy article-copy">Clients of mine who get <strong>a Cosmic Life Path Reading</strong> feel a deep sense of joy and awe upon reading it.</p>
        <p class="step-copy article-copy">They understand for the first time their <strong>unique place in the universe</strong> and how to maximise every moment of their lives.</p>
        <p class="step-copy article-copy">They understand how they can contribute to those around them in the best way possible and how to maximise the abundance that flows to them.</p>
        <p class="step-copy article-copy">They become better fathers, mothers, partners, and parents.</p>
        <p class="step-copy article-copy">The insights you get into <strong>your particular hidden skills and talents</strong> are like a secret weapon you can use every day to attract more abundance and never have to deny your family anything ever again.</p>

        <h3 class="article-subtitle mt-4">And there’s more...</h3>
        <p class="step-copy article-copy">As you discover your individual life purpose from a <i>Cosmic Life Path Reading,</i> you will also:</p>
        <ul class="cosmic-benefits article-copy">
          <li>Banish worry and stress from your life.</li>
          <li>Bend reality to your will.</li>
          <li>Boost your confidence and joy.</li>
        </ul>

        <p class="step-copy article-copy">A <i>Cosmic Life Path Reading</i> helps you to move into harmony with the path the universe had in store for you, based on cosmic energy patterns of the planets at the time of your birth. You will find new opportunities coming into your life.</p>
        <p class="step-copy article-copy">People who have gotten a <i>Cosmic Life Path Reading</i> get promotions or pay rises out of the blue.</p>
        <p class="step-copy article-copy">Attract new income streams...new romantic soul-mate relationships...along with vibrant health and energy levels they never experienced before.</p>
        <p class="step-copy article-copy">The one-of-a-kind gifts and abilities you discover in yourself from a <strong><i>Cosmic Life Path Reading</i></strong> will allow you to finally see the kind of person you are meant to be with, {{ $name }}.</p>
        <p class="step-copy article-copy">You will finally stop wasting time on relationships that go nowhere.</p>
        <p class="step-copy article-copy">You will attract the right people to you to achieve what you need in life.</p>
        <p class="step-copy article-copy">You will <strong>attract the ideal career path for you,</strong> one that is 100% aligned with your <i>Cosmic Life Path</i>.</p>
        <p class="step-copy article-copy">The unique gifts you came here to share with others will at last be available to you so you can fulfil the mission you incarnated into this lifetime to achieve.</p>
        <p class="step-copy article-copy">You will also see hidden blind spots in yourself that have held you back from achieving success.</p>
        <p class="step-copy article-copy">A <i>Cosmic Life Path Reading</i> will help you overcome everything that has held you back in life so far...including those negative patterns like distraction, doom scrolling, or other addictions you thought were so hard to overcome before.</p>

        <h2 class="section-title step-title article-major-title mt-5">You will also get the following in your Cosmic Life Path Reading, {{ $name }}:</h2>
        <ul class="cosmic-benefits article-copy">
          <li><strong>How to understand on the deepest level who you are, what you are capable of.</strong> This is unlike any personality profile you have ever come across. It’s connected to the truest form of who you are.</li>
          <li><strong>The secret to using Astrology to guide your everyday decisions</strong> so you get the best outcomes in your love, wealth, and health.</li>
          <li><strong>Do you ever feel you are not reaching your maximum potential</strong>? You will be shocked at what you can achieve with this guide.</li>
          <li><strong>Little-known insights into how to attract soul-mate love almost effortlessly.</strong> These are so quick and easy that some people who’ve been alone for years have manifested a soul-mate in days.</li>
          <li><strong>The quickest and easiest way to multiply your good fortune in everyday life.</strong> Use these secrets to help tap into a sea of good fortune you can’t imagine possible right now.</li>
          <li><strong>What to do to connect with your higher self</strong> to open up a world of new possibilities and opportunities to more health, wealth, and love in your life.</li>
          <li>Your <strong><i>Cosmic Life Path Reading</i></strong> will be like ‘<strong>the north star</strong>’ of your life...always guiding you in the right direction.</li>
          <li>You will finally be able to let go of the stress or worry you’re carrying because you will feel like the universe is on your side for a change.</li>
          <li>All the amazing parts of yourself you learn about in your <i>Cosmic Life Path Reading</i> will propel you forward on your path to success and give you a massive unfair advantage in life.</li>
        </ul>

        <div class="offer-callout text-center my-5">
          <p class="offer-price-intro mb-1"><strong>I normally charge $750 for a personalised</strong></p>
          <p class="offer-price-script mb-0"><em>Cosmic Life Path Reading...</em></p>
        </div>

        <p class="step-copy article-copy">Private clients pay even more sometimes.</p>
        <p class="step-copy article-copy">Many of these clients say they have spent ten times that amount, though.</p>
        <p class="step-copy article-copy">Discovering the hidden parts of their personalities and their special gifts and talents opened up doors and opportunities they never imagined possible.</p>

        <h3 class="article-subtitle mt-4">If you act right now, you can get access to your Cosmic Life Path Reading for just $14.97</h3>
        <p class="step-copy article-copy">That’s right, when you act today right now, you can get a <strong>personal <i>Cosmic Life Path Reading</i></strong> for just $14.97.</p>
        <p class="step-copy article-copy">Why such a low, no-brainer investment?</p>
        <p class="step-copy article-copy">That’s simple.</p>
        <p class="step-copy article-copy">I want to make getting your <i>Cosmic Life Path Reading</i> a complete no-brainer.</p>
        <p class="step-copy article-copy">I want your <i>Cosmic Life Path Reading</i> to be a doorway to a new you, where every aspect of your life improves.</p>
        <p class="step-copy article-copy">...Where you can tap into new opportunities.</p>
        <p class="step-copy article-copy">..See new income streams appear before your eyes that you never saw before.</p>
        <p class="step-copy article-copy">...Become a better parent, provider, sibling, or partner.</p>
        <p class="step-copy article-copy">All because you tapped into <strong>unique talents and gifts</strong> you never knew you possessed before that created an amazing new life for you and your loved ones.</p>
        <p class="step-copy article-copy"><strong>Hit the add to cart button below</strong> right now and get instant access to your <i>Cosmic Life Path Reading</i>.</p>
        <p class="step-copy article-copy">After you <strong>hit the add to cart button,</strong> you will be taken immediately to a page that looks like this.</p>
        <p class="step-copy article-copy">After you enter your details, you will be sent your reading within 12 hours.</p>

        <div class="offer-cta-block text-center my-5">
          <a href="{{ $checkoutUrl }}" target="_blank" rel="noopener noreferrer" class="hero-cta btn step-next-btn">Send me my Personal Cosmic Life Path Reading today</a>
          <p class="offer-price-line mt-3 mb-1"><span class="text-decoration-line-through">$557</span> only $14.97</p>
          <p class="offer-guarantee mb-0">365-day money-back guarantee</p>
        </div>

        <p class="step-copy article-copy"><strong>Hit the add to cart button</strong> below and get instant access to your personalized <i>Cosmic Life Path</i> reading. {{ $name }}.</p>
        <p class="step-copy article-copy">Use it to uncover unique gifts and talents you never knew you had.</p>
        <p class="step-copy article-copy">Use the reading to see your real self, perhaps for the first time ever, the parts you have kept hidden that have the power to create an incredible life for yourself.</p>
        <p class="step-copy article-copy">And if for any reason or no reason you are not happy, simply contact me for a full and complete refund.</p>
        <p class="step-copy article-copy">No questions, no quibbling.</p>
        <p class="step-copy article-copy">And there’s more...</p>


        <h2 class="section-title step-title article-major-title mt-0">Act Now and get these FAST-ACTION bonuses completely FREE</h2>
        <div class="article-image-wrap article-hero-image-wrap text-center mb-4">
            <img src="{{ asset('imgs/sale-page/bounses.jpg') }}" alt="Fast-action bonuses" class="img-fluid cosmic-result-image article-feature-image">
        </div>
        <h3 class="article-subtitle mt-4">Year of the Horse Prosperity Guide</h3>
        <p class="offer-value">Normal value $47</p>
        <p class="step-copy article-copy">2026 is the Chinese Astrology year of the horse. No matter what star sign you are, you can use the secrets in this report on The Year Of The Horse to prosper like never before in your life.</p>
        
        <h3 class="article-subtitle mt-4">Your Soul-Urge Number</h3>
        <p class="offer-value">Normal value $67</p>
        <p class="step-copy article-copy">This report goes perfectly with a <i>Cosmic Life Path reading</i>.</p>
        <p class="step-copy article-copy">Your <i>soul urge number</i> comes from numerology and is worked out from your date of birth and name.</p>
        <p class="step-copy article-copy">The report will uncover your deepest desires and urges in this life and how to express them to maximise your happiness and health.</p>

        <h3 class="article-subtitle mt-4">Your Lunar Money Path</h3>
        <p class="offer-value">Normal value $167</p>
        <p class="step-copy article-copy">The moon has a powerful influence over who we are and what we can achieve in this life.</p>
        <p class="step-copy article-copy">This report will help you to track the days in a lunar month when you are most likely to experience a financial windfall.</p>
        <p class="step-copy article-copy">Whether you’re buying a raffle ticket or a scratch-off card, this lunar money map will be an invaluable guide.</p>
        <p class="step-copy article-copy">These bonuses have a combined value of $181. They are yours here today for FREE.</p>
        <p class="step-copy article-copy mb-0"><strong>Hit the add to cart button</strong> below right now and get instant access to your <i>Cosmic Life Path Reading</i>.</p>

        <div class="offer-cta-block text-center my-5">
          <a href="{{ $checkoutUrl }}" target="_blank" rel="noopener noreferrer" class="hero-cta btn step-next-btn">Send me my Personal Cosmic Life Path Reading today</a>
          <p class="offer-price-line mt-3 mb-1"><span class="text-decoration-line-through">$557</span> only $14.97</p>
          <p class="offer-guarantee mb-0">365-day money-back guarantee</p>
        </div>


        <h2 class="section-title step-title article-major-title mt-0">{{ $name }}, Right now, you're standing at a fork in the road…</h2>
        <p class="step-copy article-copy"><strong>The first path is the one you already know.</strong></p>
        <div class="article-inline-media my-4">
          <div class="article-inline-copy">
            <p class="step-copy article-copy">Walk away, forget you were ever here, and tomorrow looks exactly like today.</p>
            <p class="step-copy article-copy">The bills don't get lighter. The relationship doesn't get easier.</p>
            <p class="step-copy article-copy">The Sunday night dread doesn't go anywhere.</p>
          </div>
          <div class="article-inline-visual">
            <img src="{{ asset('imgs/sale-page/call-action.jpg') }}" alt="Fork in the road call to action" class="img-fluid cosmic-result-image">
          </div>
        </div>
        <p class="step-copy article-copy">A year from now, you'll be in the same spot, wondering why nothing ever seems to shift — not because you're not trying, but because you never had the right starting point.</p>
        <p class="step-copy article-copy"><strong>The second path begins with your <i>Cosmic Life Path Reading</i>.</strong></p>
        <p class="step-copy article-copy">Not with promises.</p>
        <p class="step-copy article-copy">With clarity.</p>
        <p class="step-copy article-copy">A deep, personalised understanding of who you are, how you're wired, and what you've been working against without even knowing it.</p>
        <p class="step-copy article-copy">From that clarity, things begin to move. Money flows more freely — not by accident, but because you're finally playing to your strengths.</p>
        <p class="step-copy article-copy">The financial breathing room you've been craving starts to feel real. Security. Flexibility. The ability to say yes to things that used to be out of reach.</p>
        <p class="step-copy article-copy">Your relationships deepen. Your energy lifts. Your health starts reflecting the life you're building rather than the stress you've been carrying.</p>
        <p class="step-copy article-copy">You stop waiting for life to get better.</p>
        <p class="step-copy article-copy"><strong>You start making it better.</strong></p>
        <p class="step-copy article-copy">The fork is right in front of you, {{ $name }}. One direction keeps you exactly where you are. The other finally moves you forward.</p>
        <p class="step-copy article-copy mb-0">Hit the add to cart button below right now and get instant access to your personal Cosmic Life Path Reading.</p>

        <div class="offer-cta-block text-center my-5">
          <a href="{{ $checkoutUrl }}" target="_blank" rel="noopener noreferrer" class="hero-cta btn step-next-btn">Send me my Personal Cosmic Life Path Reading today</a>
          <p class="offer-price-line mt-3 mb-1"><span class="text-decoration-line-through">$557</span> only $14.97</p>
          <p class="offer-guarantee mb-0">365-day money-back guarantee</p>
        </div>

        <div class="social-proof-wrap mt-5 text-center">
          <div class="trust-pill">Real client experiences</div>
          <div class="row g-4 mt-2">
            <div class="col-md-4">
              <div class="proof-card h-100 text-center">
                <img src="{{ asset('imgs/avatar/elise.png') }}" alt="James Smith" class="testimonial-avatar">
                <p class="proof-name mb-2">James Smith <span class="d-block mt-2 testimonial-location">Madison, Wisconsin</span></p>
                <p class="proof-quote">“I have a strong sense that positive changes are on the horizon for both my career and my relationships. Sending love and light to everyone.”</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="proof-card h-100 text-center">
                <img src="{{ asset('imgs/avatar/noah.png') }}" alt="Elizabeth Garcia" class="testimonial-avatar">
                <p class="proof-name mb-2">Elizabeth Garcia <span class="d-block mt-2 testimonial-location">Franklin, Tennessee</span></p>
                <p class="proof-quote">“I really loved receiving my Cosmic Life Path Reading—it helped guide me through some difficult decisions during a challenging time in my life. Now I’m patiently waiting to see how everything unfolds.”</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="proof-card h-100 text-center">
                <img src="{{ asset('imgs/avatar/mia.png') }}" alt="Lauren Martinez" class="testimonial-avatar">
                <p class="proof-name mb-2">Lauren Martinez <span class="d-block mt-2 testimonial-location">Ashland, Oregon</span></p>
                <p class="proof-quote">“I’ve had my cards read before, but nothing compares to the Cosmic Life Path Reading. She understood things about me that I never even shared. It honestly feels like a huge weight has been lifted, and I can finally breathe easier. I’ll definitely be coming back for more readings. Thank you, Samira!”</p>
              </div>
            </div>
          </div>
        </div>

        <div class="offer-cta-block text-center my-5">
          <a href="{{ $checkoutUrl }}" target="_blank" rel="noopener noreferrer" class="hero-cta btn step-next-btn">Send me my Personal Cosmic Life Path Reading today</a>
          <p class="offer-price-line mt-3 mb-1"><span class="text-decoration-line-through">$557</span> only $14.97</p>
          <p class="offer-guarantee mb-0">365-day money-back guarantee</p>
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
