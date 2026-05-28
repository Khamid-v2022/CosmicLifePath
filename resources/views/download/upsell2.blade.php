@extends('layouts.app')
@section('content')
{{-- Upsell1 Download Page --}}
<div class="download-page vip">
    <div class="billing-info">
        <p class="mb-0">Your credit card statement will show a charge from CLKBANK*<strong>clovepath</strong></p>
    </div>
    <div class="container">
        
        <div class="text-center mb-5">
            <h1 class="download-title">Welcome to your Personalized <big><strong class="accent">Cosmic Love Path</strong></big> Reading Access!</h1>
            <p class="download-desc text-primary mb-4">Your complete Personalized Cosmic Love Path Full Report and its Bonuses are ready.<br>Download your resources below.</p>
        </div>
        <div>
            <div class="download-main-sign-image-row">
                <img src="{{ asset('imgs/ebook/upsell2/' . strtolower($sign['name']) . '-bundle.png') }}" alt="Bundle image" class="special-access-fullpack-img" id="vip_bundle_img"/>
            </div>
            <div class="download-section download-instructions text-center my-5">
                <a class="btn hero-cta" href="{{$sign['upsell2_bundle_pdf']}}" download>Download The Full Bundle Now </a>
            </div>
        </div>


       <div class="download-section download-instructions">
            <p class="download-instruction mw-100">Click each image below to download your PDF file if you faced issues in using the link given above.</p>
        </div>

        <div class="download-section download-thumbs"> 
            <div class="row gy-4">
                <div class="col-md-4">
                    <div class="each-reading-card d-flex flex-column justify-content-between">
                        <div>
                            <img id="mainThumbImg" src="{{ asset('/imgs/ebook/upsell2/2d/' . strtolower($sign['name']) . '.jpg') }}" alt="Download My Reading" class="thumb-img" />
                            <div class="thumb-label">Personalized Cosmic Love Path Reading</div>
                            <!-- <div class="special-zodiac-desc">Your complete personalised reading — cosmic personality, wealth key, health blueprint, love secrets, life purpose, and trauma release. Includes your personal foreword from Celestra Vonn.</div> -->
                        </div>
                        <a class="btn btn-lg btn-primary mx-auto" href="{{$sign['upsell2_pdf']}}" download target="_blank">Download Now</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="each-reading-card d-flex flex-column justify-content-between">
                        <div>
                            <img src="{{ asset('imgs/ebook/upsell2/2d/bonus1.jpg') }}" alt="Bonus 1" class="thumb-img" />
                            <div class="thumb-label">Bonus #1 - Cosmic Love Wound Release</div>
                            <!-- <div class="special-zodiac-desc">Discover how the world's most iconic and celebrated people unknowingly followed the exact same cosmic blueprint written in your stars.</div> -->
                        </div>
                        <a class="btn btn-lg btn-primary mx-auto" download href="https://cosmic-life-path.nyc3.digitaloceanspaces.com/cosmic-love-path/Bonuses/bns_a2_Q8mL3xP7Rv4Ka9Nx.mp3" target="_blank">Download Now</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="each-reading-card d-flex flex-column justify-content-between">
                        <div>
                            <img src="{{ asset('imgs/ebook/upsell2/2d/bonus2.jpg') }}" alt="Bonus 2" class="thumb-img" />
                            <div class="thumb-label">Bonus #2 — Love Frequency Activation</div>
                            <!-- <div class="special-zodiac-desc">Uncover the hidden desires and deepest motivations that have been quietly driving every major decision of your life.
                            </div> -->
                        </div>
                        <a class="btn btn-lg btn-primary mx-auto" download href="https://cosmic-life-path.nyc3.digitaloceanspaces.com/cosmic-love-path/Bonuses/bns_g2_H5qV8mL1Yp4Rx7Kd.pdf" target="_blank">Download Now</a>
                    </div>
                </div>
            </div>
        </div>


        <section class="pt-4">
            <h1 class="section-title text-center"><em>One final map left to claim…</em></h1>
            <div class="special-access-desc text-center mb-0">Your Cosmic Life Path Reading is your foundation — But your full destiny spans <span class="special-access-em">wealth, love, and energy</span> too. If any of the readings below aren't yet part of your collection, make sure you don't leave without them.</div>
            
            <div class="mx-auto" style="max-width: 500px;">
                <div class="h-100 d-flex flex-column justify-content-between mt-5">
                    <div class="text-center">
                        <!-- <h4 class="text-light text-center">Cosmic Energy Path Reading</h4> -->
                        <img src="{{ asset('imgs/upsell/upsel3-map.png') }}" alt="Map 1" class="thumb-img special-thumb" />
                        <!-- <p class="text-center mb-0">Align Your Daily Energy to the Rhythms Already Working in Your Favour</p> -->
                        <p class="special-zodiac-desc mb-0 text-light">Maps your lunar energy rhythm, your planetary flow channels, and your personal recovery code — so you stop pushing against the current and start moving with it.</p>
                    </div>
                    <a class="btn special-instant-download" href="{{ $sign['upsell2_instant_upsell3_purchase_link'] }}">Get Instant Access</a>
                </div>
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
                        <a href="https://accelevate8.co/TeslaWealthScript/clpoto2dl" target="_blank" rel="noopener noreferrer" class="btn product-cta">View Program</a>
                    </div>
                </article>

                <article class="product-card">
                    <img src="{{ asset('imgs/products/Moses Wealth Code Bundle.png') }}" alt="Moses Wealth Code Bundle" class="product-image" />
                    <div class="product-content">
                        <h3 class="product-name">Moses Wealth Code</h3>
                        <p class="product-description">An ancient wealth attraction code from the time of Moses revealing the secret to becoming a money-magnet by activating a specialized part of your brain designed to seek out and attract wealth in just 7 minutes.</p>
                        <a href="https://accelevate8.co/MosesWealthCode/clpoto2dl" target="_blank" rel="noopener noreferrer" class="btn product-cta">View Program</a>
                    </div>
                </article>

                <article class="product-card">
                    <img src="{{ asset('imgs/products/Wealth Wave Script Bundle.png') }}" alt="Wealth Wave Script Bundle" class="product-image" />
                    <div class="product-content">
                        <h3 class="product-name">Wealth Wave Script</h3>
                        <p class="product-description">A newly rediscovered 88-word wealth activation sequence that rewires your brain&apos;s abundance pathways, helping you attract money, opportunities, and financial breakthroughs faster than ever before.</p>
                        <a href="https://accelevate8.co/WealthWaveScript/clpoto2dl" target="_blank" rel="noopener noreferrer" class="btn product-cta">View Program</a>
                    </div>
                </article>

                <article class="product-card">
                    <img src="{{ asset('imgs/products/Wealth Dream Code Bundle.png') }}" alt="Wealth Dream Code Bundle" class="product-image" />
                    <div class="product-content">
                        <h3 class="product-name">Wealth Dream Code</h3>
                        <p class="product-description">This ancient Tibetan secret reveals how to enter a rare dream state that reprograms your subconscious to attract money, success, and abundance automatically while you sleep.</p>
                        <a href="https://accelevate8.co/WealthDreamCode/clpoto2dl" target="_blank" rel="noopener noreferrer" class="btn product-cta">View Program</a>
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
        
        <section class="disclaimer-section text-center mt-5">
            ClickBank is the retailer of products on this site. CLICKBANK® is a registered trademark of Click Sales Inc., a Delaware corporation located at 1444 S. Entertainment Ave., Suite 410 Boise, ID 83709, USA and used by permission. ClickBank's role as retailer does not constitute an endorsement, approval or review of these products or any claim, statement or opinion used in promotion of these products
        </section>
    </div>
</div>
@endsection
