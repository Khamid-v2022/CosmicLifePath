@extends('layouts.app')
@section('content')
{{-- Upsell1 Download Page --}}
<div class="download-page vip">
    <div class="billing-info">
        <p class="mb-0">Your credit card statement will show a charge from CLKBANK*cpath* KIV</p>
    </div>
    <div class="container">
        
        <div class="text-center mb-5">
            <h1 class="download-title">Welcome to <big><strong class="accent">Cosmic Wealth Path</strong></big> Reading Access!</h1>
            <p class="download-desc text-primary mb-4">Your complete Cosmic Wealth Path Full Report and its Bonuses are ready.<br>Download your resources below.</p>
        </div>
        <div>
            <div class="download-main-sign-image-row">
                <img src="{{ asset('imgs/ebook/upsell1/' . strtolower($sign['name']) . '-bundle.png') }}" alt="Bundle image" class="special-access-fullpack-img" id="vip_bundle_img"/>
            </div>
            <div class="download-section download-instructions text-center my-5">
                <a class="btn hero-cta" href="{{$sign['upsell1_bundle_pdf']}}" download>Download The Full Bundle Now </a>
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
                            <img id="mainThumbImg" src="{{ asset('/imgs/ebook/upsell1/2d/' . strtolower($sign['name']) . '.jpg') }}" alt="Download My Reading" class="thumb-img" />
                            <div class="thumb-label">Cosmic Wealth Path Reading</div>
                            <!-- <div class="special-zodiac-desc">Your complete personalised reading — cosmic personality, wealth key, health blueprint, love secrets, life purpose, and trauma release. Includes your personal foreword from Celestra Vonn.</div> -->
                        </div>
                        <a class="btn btn-lg btn-primary mx-auto" href="{{$sign['upsell1_pdf']}}" download target="_blank">Download Now</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="each-reading-card d-flex flex-column justify-content-between">
                        <div>
                            <img src="{{ asset('imgs/ebook/upsell1/2d/bonus1.jpg') }}" alt="Bonus 1" class="thumb-img" />
                            <div class="thumb-label">Bonus #1 - Cosmic Wealth Compatibility Guide</div>
                            <!-- <div class="special-zodiac-desc">Discover how the world's most iconic and celebrated people unknowingly followed the exact same cosmic blueprint written in your stars.</div> -->
                        </div>
                        <a class="btn btn-lg btn-primary mx-auto" download href="https://cosmic-life-path.nyc3.digitaloceanspaces.com/cosmic-wealth-path/Bonuses/bns_Wealth_Meditation_audio_X9mQ2Lp7Rv4Ka8N.mp3" target="_blank">Download Now</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="each-reading-card d-flex flex-column justify-content-between">
                        <div>
                            <img src="{{ asset('imgs/ebook/upsell1/2d/bonus2.jpg') }}" alt="Bonus 2" class="thumb-img" />
                            <div class="thumb-label">Bonus #2 — Cosmic Life Path Wealth Meditation</div>
                            <!-- <div class="special-zodiac-desc">Uncover the hidden desires and deepest motivations that have been quietly driving every major decision of your life.
                            </div> -->
                        </div>
                        <a class="btn btn-lg btn-primary mx-auto" download href="https://cosmic-life-path.nyc3.digitaloceanspaces.com/cosmic-wealth-path/Bonuses/bns_Wealth_Com_guide_T4pX8mQ1Lv7Ra3K.pdf" target="_blank">Download Now</a>
                    </div>
                </div>
            </div>
        </div>
        
        <section class="disclaimer-section text-center mt-5">
            ClickBank is the retailer of products on this site. CLICKBANK® is a registered trademark of Click Sales Inc., a Delaware corporation located at 1444 S. Entertainment Ave., Suite 410 Boise, ID 83709, USA and used by permission. ClickBank's role as retailer does not constitute an endorsement, approval or review of these products or any claim, statement or opinion used in promotion of these products
        </section>
    </div>
</div>
@endsection
