@extends('layouts.app')
@section('content')

{{-- Standard Access Download Page --}}
<div class="download-page vip">
    <div class="billing-info">
        <p class="mb-0">Billing Information: You will see a charge from "ClickBank" or "CLKBANK.COM" on your statement.</p>
    </div>
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="special-access-title">✦ Congratulations ✦</h1> 
            <h1 class="download-title">You’ve unlocked your <br><strong class="accent">Cosmic Life Path</strong> <strong>Full Report!</strong></h1>
            <p class="download-desc text-primary mb-4">Download your resources below.</p>

            <div>
                <div class="download-main-sign-image-row">
                    <img id="mainProductImg" src="{{ asset('/imgs/ebook/horoscope/' . strtolower($sign['name']) . '.png') }}" alt="Horoscope Main Product" class="download-main-img-large" />
                </div> 
                <div class="download-section download-instructions text-center my-5">
                    <div class="download-instruction mb-4">Your complete personalised reading — cosmic personality, wealth key, health blueprint, love secrets, life purpose, and trauma release.</div>
                    <a class="btn hero-cta mainPdfLink" href="{{$sign['pdf']}}" download target="_blank">Download Now</a>
                </div>
            </div>
        </div>

       <div class="divider">
            <div class="divider-line"></div>
            <span class="divider-glyph">✦</span>
            <div class="divider-line"></div>
            <span class="divider-glyph">✦</span>
            <div class="divider-line"></div>
        </div>


        <!-- Special Access Unlocked Section -->
        <section class="special-access-section dark-card">
            <h1 class="section-title text-center">Special Access Unlocked!</h1>
            <div class="special-access-desc text-center">You can also purchase the Cosmic Life Path full reports for <span class="special-access-em">all other zodiac signs</span> below. Explore the unique cosmic blueprint of every sign—perfect for friends, family, or your own curiosity!</div>
            <div class="special-zodiac-list" id="specialZodiacList">
                @php($signs = config('variables.signs'))
                @foreach($signs as $key => $info)
                    @if($info['name'] === $sign['name'])
                        @continue
                    @endif
                    <div class="special-zodiac-card" data-sign="{{ $key }}">
                        <img src="/imgs/ebook/horoscope/2d/{{ $key }}.jpg" alt="{{ $info['name'] }}" class="thumb-img special-thumb" />
                        <div class="thumb-label">{{ $info['name'] }}</div>
                        <a class="btn special-zodiac-download" href="{{ url('/download/standard-' . $key) }}">Order Now</a>
                    </div>
                @endforeach
            </div>
        </section>

        <div class="products dark-card">
            <div class="products-header text-center">
                <p class="products-eyebrow">Curated Wealth Collection</p>
                <h2 class="products-title">Exclusive Wealth Activation Programs</h2>
                <p class="products-subtitle">Handpicked premium offers designed to deepen your financial mindset and attract aligned opportunities.</p>
            </div>

            <div class="products-grid">
                <article class="product-card">
                    <img src="{{ asset('imgs/products/Tesla Wealth Script Bundle.png') }}" alt="Tesla Wealth Script Bundle" class="product-image" />
                    <div class="product-content">
                        <h3 class="product-name">Tesla Wealth Script</h3>
                        <p class="product-description">A powerful 18-word wealth activation script inspired by Nikola Tesla&apos;s hidden discoveries, designed to unlock your brain&apos;s full money-attraction potential and trigger a steady flow of wealth, opportunities, and financial breakthroughs in just minutes a day.</p>
                        <a href="https://accelevate8.co/TeslaWealthScript/clpfedl" target="_blank" rel="noopener noreferrer" class="btn product-cta">View Program</a>
                    </div>
                </article>

                <article class="product-card">
                    <img src="{{ asset('imgs/products/Moses Wealth Code Bundle.png') }}" alt="Moses Wealth Code Bundle" class="product-image" />
                    <div class="product-content">
                        <h3 class="product-name">Moses Wealth Code</h3>
                        <p class="product-description">An ancient wealth attraction code from the time of Moses revealing the secret to becoming a money-magnet by activating a specialized part of your brain designed to seek out and attract wealth in just 7 minutes.</p>
                        <a href="https://accelevate8.co/MosesWealthCode/clpfedl" target="_blank" rel="noopener noreferrer" class="btn product-cta">View Program</a>
                    </div>
                </article>

                <article class="product-card">
                    <img src="{{ asset('imgs/products/Wealth Wave Script Bundle.png') }}" alt="Wealth Wave Script Bundle" class="product-image" />
                    <div class="product-content">
                        <h3 class="product-name">Wealth Wave Script</h3>
                        <p class="product-description">A newly rediscovered 88-word wealth activation sequence that rewires your brain&apos;s abundance pathways, helping you attract money, opportunities, and financial breakthroughs faster than ever before.</p>
                        <a href="https://accelevate8.co/WealthWaveScript/clpfedl" target="_blank" rel="noopener noreferrer" class="btn product-cta">View Program</a>
                    </div>
                </article>

                <article class="product-card">
                    <img src="{{ asset('imgs/products/Wealth Dream Code Bundle.png') }}" alt="Wealth Dream Code Bundle" class="product-image" />
                    <div class="product-content">
                        <h3 class="product-name">Wealth Dream Code</h3>
                        <p class="product-description">This ancient Tibetan secret reveals how to enter a rare dream state that reprograms your subconscious to attract money, success, and abundance automatically while you sleep.</p>
                        <a href="https://accelevate8.co/WealthDreamCode/clpfedl" target="_blank" rel="noopener noreferrer" class="btn product-cta">View Program</a>
                    </div>
                </article>
            </div>
        </div>

         <section class="help-section dark-card" aria-label="Customer support information">
            <div class="help-inner">
                <div class="help-block">
                    <p class="help-kicker">Need Help? We&apos;re Here for You</p>
                    <p class="help-copy">If you have questions about your program, your downloads, or how best to use your Cosmic Life Path Full Report, feel free to reach out anytime. Our team responds personally to every email.</p>
                    <ul class="help-list">
                        <li><span class="help-label">Email</span> <a href="mailto:support@thecosmiclifepath.com">support@thecosmiclifepath.com</a></li>
                        <li><span class="help-label">Response Time</span> Within 24-48 hours</li>
                    </ul>
                    <p class="help-copy">We are a small, dedicated support team with real people and thoughtful replies.</p>
                    <p class="help-copy mb-0">Every message is read by someone who genuinely cares about your success.</p>
                </div>

                <div class="help-divider" aria-hidden="true"><span>✦</span></div>

                <div class="help-block">
                    <p class="help-kicker">Stay Connected</p>
                    <p class="help-copy">Important updates, login links, and bonus resources will be sent to your inbox.</p>
                    <p class="help-copy">To make sure you receive everything without interruption:</p>
                    <ul class="help-list help-checklist mb-0">
                        <li>Add <a href="mailto:support@thecosmiclifepath.com">support@thecosmiclifepath.com</a> to your address book</li>
                        <li>Check your spam or junk folder if something seems missing</li>
                        <li>Move our emails to your primary tab (Gmail users)</li>
                    </ul>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection