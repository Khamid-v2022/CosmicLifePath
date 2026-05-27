@extends('layouts.app')
@section('content')
{{-- VIP Access Download Page --}}
<div class="download-page vip">
    <div class="billing-info">
        <p class="mb-0">Your credit card statement will show a charge from CLKBANK*clifepath.</p>
    </div>
    <div class="container">
        
        <div class="text-center mb-5">
            <h1 class="download-title">Welcome to <big><strong class="accent">VIP Access</strong></big>!</h1>
            <p class="download-desc text-primary mb-4">Your complete Cosmic Life Path Full Report and its Bonuses are ready.<br>Download your resources below.</p>
        </div>
        <div>
            <div class="download-main-sign-image-row">
                <img src="{{ asset('imgs/ebook/horoscope/' . strtolower($sign['name']) . '-bundle.png') }}" alt="Bundle image" class="special-access-fullpack-img" id="vip_bundle_img"/>
            </div>
            <div class="download-section download-instructions text-center my-5">
                <a class="btn hero-cta" href="{{$sign['bundle_pdf']}}" download>Download The Full Bundle Now </a>
            </div>
        </div>


       <div class="download-section download-instructions">
            <p class="download-instruction mw-100">Click each image below to download your PDF file if you faced issues in using the link given above.</p>
        </div>

        <div class="download-section download-thumbs"> 
            <div class="row gy-4">
                <div class="col-md-3 col-sm-6">
                    <div class="each-reading-card d-flex flex-column justify-content-between">
                        <div>
                            <img id="mainThumbImg" src="{{ asset('/imgs/ebook/horoscope/2d/' . strtolower($sign['name']) . '.jpg') }}" alt="Download My Reading" class="thumb-img" />
                            <div class="thumb-label">Your Cosmic Life Path Reading</div>
                            <div class="special-zodiac-desc">Your complete personalised reading — cosmic personality, wealth key, health blueprint, love secrets, life purpose, and trauma release. Includes your personal foreword from Celestra Vonn.</div>
                        </div>
                        <a class="btn btn-lg btn-primary mx-auto" href="{{$sign['pdf']}}" download target="_blank">Download Now</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="each-reading-card d-flex flex-column justify-content-between">
                        <div>
                            <img src="{{ asset('imgs/ebook/bonuse/bonus1.jpg') }}" alt="Bonus 1" class="thumb-img" />
                            <div class="thumb-label">Bonus #1 - The Secret Language of Fame</div>
                            <div class="special-zodiac-desc">Discover how the world's most iconic and celebrated people unknowingly followed the exact same cosmic blueprint written in your stars.</div>
                        </div>
                        <a class="btn btn-lg btn-primary mx-auto" download href="https://cosmic-life-path.nyc3.digitaloceanspaces.com/main/bonuses/bns_ref_F7kQ2mX9Lp4Rv8Na.pdf" target="_blank">Download Now</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="each-reading-card d-flex flex-column justify-content-between">
                        <div>
                            <img src="{{ asset('imgs/ebook/bonuse/bonus2.jpg') }}" alt="Bonus 2" class="thumb-img" />
                            <div class="thumb-label">Bonus #2 — Your Soul Urge Number Report</div>
                            <div class="special-zodiac-desc">Uncover the hidden desires and deepest motivations that have been quietly driving every major decision of your life.
                            </div>
                        </div>
                        <a class="btn btn-lg btn-primary mx-auto" download href="https://cosmic-life-path.nyc3.digitaloceanspaces.com/main/bonuses/bns_ng_H5qV7mL1Yp4Rw8Kd.pdf" target="_blank">Download Now</a>
                    </div>
                    
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="each-reading-card d-flex flex-column justify-content-between">
                        <div>
                            <img src="{{ asset('imgs/ebook/bonuse/bonus3.jpg') }}" alt="Bonus 3" class="thumb-img" />
                            <div class="thumb-label">Bonus #3 — Your Lunar Money Path Report</div>
                            <div class="special-zodiac-desc">Discover the exact lunar windows each month when your sign is most cosmically aligned with financial opportunity.</div>
                        </div>
                        <a class="btn btn-lg btn-primary mx-auto" download href="https://cosmic-life-path.nyc3.digitaloceanspaces.com/main/bonuses/bns_wg_K3mL8xP2Qa7Tv9Rx.pdf" target="_blank">Download Now</a>
                    </div>
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
                        <a class="btn special-zodiac-download" href="{{ $info['special_offer_url'] }}">Order Now</a>
                    </div>
                @endforeach
            </div>

            <div class="special-access-desc text-center mt-5">Missing just ONE hidden insight could change everything…<br>Grab the  <span class="special-access-em">FULL Horoscope Bundle</span> now for only $97 and save 40% today.</div>
            <div class="mt-2" data-sign="{{ $key }}" style="max-width: 600px; margin: 0 auto;">
                <img src="/imgs/ebook/horoscope/12reports-bundle.png" alt="12 Reports Bundle" class="thumb-img special-thumb" />
                <div class="thumb-label">12 Reports Bundle</div>
                <a class="btn special-zodiac-download" href="https://clifepath.pay.clickbank.net/?cbitems=fe-bundle97&template=BCoFTclp&vtid=fullreportdl">Full Package - Order Now</a>
            </div>
        </section>

        <section class="pt-4">
            <h1 class="section-title text-center"><em>One Reading Opens the Door. Three Complete the Map.</em></h1>
            <div class="special-access-desc text-center mb-0">Your Cosmic Life Path Reading is your foundation — But your full destiny spans <span class="special-access-em">wealth, love, and energy</span> too. If any of the readings below aren't yet part of your collection, make sure you don't leave without them.</div>
            
            <div class="row">
                <div class="col-md-4 mt-5">
                    <div class="h-100 d-flex flex-column justify-content-between">
                        <div class="text-center">
                            <!-- <h4 class="text-light text-center">Cosmic Life Path Reading</h4> -->
                            <img src="{{ asset('imgs/upsell/upsel1-map.png') }}" alt="Map 1" class="thumb-img special-thumb" />
                            <p class="mb-0 text-center">Uncover the Exact Wealth Blueprint Hidden in Your Birth Chart</p>
                            <p class="special-zodiac-desc mb-0 text-light">Reveals the financial identity unique to your sign, the hidden pattern that's been silently blocking abundance, and a personalised 30-day activation plan aligned to your planetary timing.</p>
                        </div>
                        <a class="btn special-instant-download" href="{{ $info['special_offer_url'] }}">Get Instant Access</a>
                    </div>
                </div>
                <div class="col-md-4 mt-5">
                    <div class="h-100 d-flex flex-column justify-content-between">
                        <div class="text-center">
                            <!-- <h4 class="text-light text-center">Cosmic Love Path Reading</h4> -->
                            <img src="{{ asset('imgs/upsell/upsel2-map.png') }}" alt="Map 1" class="thumb-img special-thumb" />
                            <p class="text-center mb-0">Finally Understand Why Your Love Life Unfolds the Way It Does</p>
                            <p class="special-zodiac-desc mb-0 text-light">Goes far beyond your sun sign — uncovering your full compatibility blueprint, the relationship patterns encoded in your chart, and exactly how to attract the deep connection you're meant for.</p>
                        </div>
                        <a class="btn special-instant-download" href="{{ $info['special_offer_url'] }}">Get Instant Access</a>
                    </div>
                </div>
                <div class="col-md-4 mt-5">
                    <div class="h-100 d-flex flex-column justify-content-between">
                        <div class="text-center">
                            <!-- <h4 class="text-light text-center">Cosmic Energy Path Reading</h4> -->
                            <img src="{{ asset('imgs/upsell/upsel3-map.png') }}" alt="Map 1" class="thumb-img special-thumb" />
                            <p class="text-center mb-0">Align Your Daily Energy to the Rhythms Already Working in Your Favour</p>
                            <p class="special-zodiac-desc mb-0 text-light">Maps your lunar energy rhythm, your planetary flow channels, and your personal recovery code — so you stop pushing against the current and start moving with it.</p>
                        </div>
                        <a class="btn special-instant-download" href="{{ $info['special_offer_url'] }}">Get Instant Access</a>
                    </div>
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

        <section class="disclaimer-section text-center mt-5">
            ClickBank is the retailer of products on this site. CLICKBANK® is a registered trademark of Click Sales Inc., a Delaware corporation located at 1444 S. Entertainment Ave., Suite 410 Boise, ID 83709, USA and used by permission. ClickBank's role as retailer does not constitute an endorsement, approval or review of these products or any claim, statement or opinion used in promotion of these products
        </section>
    </div>
</div>
@endsection
