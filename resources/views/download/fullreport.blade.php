@extends('layouts.app')
@section('title', 'Access to All 12 Cosmic Life Path Reports')

@section('content')
<div class="download-page vip">
    <div class="billing-info">
        <p class="mb-0">Your credit card statement will show a charge from CLKBANK*clifepath.</p>
    </div>
    <div class="container">
        <div class="download-header">
            <h1 class="download-title">Welcome to Your <span class="accent">Complete Cosmic Collection</span> </h1>
            <p class="download-desc text-primary mb-4"><em>All 12 Cosmic Life Path Readings are now yours. Explore every sign, uncover every pattern, and step into the full picture of who you — and everyone around you — are truly meant to be.</em></p>
        </div>
        <div class="fullreport-grid">
            @php($signs = config('variables.signs'))
            @foreach($signs as $key => $info)
                <div class="special-zodiac-card" data-sign="{{ $key }}">
                    <img src="/imgs/ebook/horoscope/2d/{{ $key }}.jpg" alt="{{ $info['name'] }}" class="thumb-img special-thumb" />
                    <div class="thumb-label">{{ $info['name'] }}</div>
                    <!-- <div class="special-zodiac-desc">{{ $info['description'] }}</div> -->
                    <a class="btn special-instant-download" href="{{$info['pdf']}}" target="_blank">Download Now</a>
                </div>
            @endforeach
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
    
<script>
    (() => {
        const grid = document.querySelector('.fullreport-grid');
        if (grid) {
            grid.addEventListener('click', function(e) {
                const btn = e.target.closest('.special-zodiac-download');
                if (btn) {
                    const pdf = btn.getAttribute('data-pdf');
                    if (pdf) {
                        const a = document.createElement('a');
                        a.href = pdf;
                        a.download = '';
                        document.body.appendChild(a);
                        a.click();
                        document.body.removeChild(a);
                    }
                }
            });
        }
    })();
</script>
@endsection
