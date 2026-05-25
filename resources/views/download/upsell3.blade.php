@extends('layouts.app')
@section('content')

{{-- Standard Access Download Page --}}
<div class="download-page vip">
    <div class="billing-info">
        <p class="mb-0">Your credit card statement will show a charge from CLKBANK*cpath* KIV</p>
    </div>
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="special-access-title">✦ Congratulations ✦</h1> 
            <h1 class="download-title">You’ve unlocked your <br><strong class="accent">Cosmic Energy Path</strong> <strong>Full Report!</strong></h1>
            <p class="download-desc text-primary mb-4">Download your resources below.</p>

            <div>
                <div class="download-main-sign-image-row">
                    <img id="mainProductImg" src="{{ asset('/imgs/ebook/upsell3/upsell-3.png') }}" alt="Horoscope Main Product" class="download-main-img-large" />
                </div> 
                <div class="download-section download-instructions text-center my-5">
                    <!-- <div class="download-instruction mb-4">Your complete personalised reading — cosmic personality, wealth key, health blueprint, love secrets, life purpose, and trauma release.</div> -->
                    <a class="btn hero-cta mainPdfLink" href="https://cosmic-life-path.nyc3.digitaloceanspaces.com/cosmic-energy-path/rpt_CEP_V8qL3mX7Rp2Ka9Nw.pdf" download target="_blank">Download Now</a>
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

        <section class="disclaimer-section text-center mt-5">
            ClickBank is the retailer of products on this site. CLICKBANK® is a registered trademark of Click Sales Inc., a Delaware corporation located at 1444 S. Entertainment Ave., Suite 410 Boise, ID 83709, USA and used by permission. ClickBank's role as retailer does not constitute an endorsement, approval or review of these products or any claim, statement or opinion used in promotion of these products
        </section>
    </div>
</div>

@endsection