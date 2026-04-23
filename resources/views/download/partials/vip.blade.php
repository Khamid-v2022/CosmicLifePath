{{-- VIP Access Download Page --}}
<div class="download-page vip">
    <div class="billing-info">
        <p class="mb-0">Billing Information: You will see a charge from "ClickBank" or "CLKBANK.COM" on your statement.</p>
    </div>
    <div class="container">
        
        <div class="download-header">
            <h1>Welcome to <strong class="text-primary">VIP Access</strong>, <span id="downloadName"></span>!</h1>
            <p class="download-desc">Your complete Cosmic Life Path Full Report for <strong>{{ $sign }}</strong> is ready.<br>Download your resources below.</p>
        </div>
        <div>
            <div class="download-main-sign-image-row">
                <img src="{{ asset('imgs/ebook/3pack.png') }}" alt="Bundle image" class="special-access-fullpack-img" />
            </div>
            <div class="download-section download-instructions text-center my-5">
                <h3 class="text-primary"><strong>{{ $sign }}</strong> Cosmic Life Path Full Report</h3>
                <div class="download-resource-desc-text my-4">Your complete personalised reading — cosmic personality, wealth key, health blueprint, love secrets, life purpose, and trauma release. Includes your personal foreword from Celestra Vonn.</div>
                <a class="btn hero-cta mainPdfLink" href="#" download>Download My Reading</a>
            </div>
        </div>

        <section class="download-resource-summary dark-card">
            <h2 class="download-resource-title">Your Complete VIP Resources</h2>
            <ul class="download-resource-list">
                <li><span class="download-check">✓</span> Your Cosmic Life Path Reading — <span class="download-highlight">30+ Page Personalised PDF</span></li>
                <li><span class="download-check">✓</span> Personal Foreword & Insights By Celestra Vonn — <span class="download-highlight">included in your reading</span></li>
                <li><span class="download-check">✓</span> The Secret Language of Fame <span class="download-highlight">(Bonus #1)</span></li>
                <li><span class="download-check">✓</span> Your Soul Urge Number Report <span class="download-highlight">(Bonus #2)</span></li>
                <li><span class="download-check">✓</span> Your Lunar Money Path Report <span class="download-highlight">(Bonus #3)</span></li>
                <li><span class="download-check">✓</span> Priority Email Support — <span class="download-highlight">responses within 24 hours</span></li>
                <li><span class="download-check">✓</span> First Access to new readings and updates</li>
            </ul>
            <div class="download-resource-descs">
                
                <div class="download-resource-desc">
                    <div class="download-resource-desc-title">Bonus #1 — The Secret Language of Fame</div>
                    <div class="download-resource-desc-text">Discover how the world's most iconic and celebrated people unknowingly followed the exact same cosmic blueprint written in your stars.</div>
                </div>
                <div class="download-resource-desc">
                    <div class="download-resource-desc-title">Bonus #2 — Your Soul Urge Number Report</div>
                    <div class="download-resource-desc-text">Uncover the hidden desires and deepest motivations that have been quietly driving every major decision of your life.</div>
                </div>
                <div class="download-resource-desc">
                    <div class="download-resource-desc-title">Bonus #3 — Your Lunar Money Path Report</div>
                    <div class="download-resource-desc-text">Discover the exact lunar windows each month when your sign is most cosmically aligned with financial opportunity.</div>
                </div>
            </div>
        </section>


        <div class="download-section download-instructions">
            <p class="download-instruction">Click each image below to download your PDF file.<br>We have also emailed you a copy of this page so you always have access.</p>
        </div>
        <div class="download-section download-thumbs">
            <div class="download-thumb-list">
                <a href="#" download class="mainPdfLink thumb-link">
                    <img id="mainThumbImg" src="" alt="Download My Reading" class="thumb-img main-thumb" />
                    <div class="thumb-label">My Reading</div>
                </a>
                <a href="/imgs/ebook/bonuse/bonus1.pdf" download class="thumb-link">
                    <img src="/imgs/ebook/bonuse/bonus1.png" alt="Bonus 1" class="thumb-img" />
                    <div class="thumb-label">Bonus #1</div>
                </a>
                <a href="/imgs/ebook/bonuse/bonus2.pdf" download class="thumb-link">
                    <img src="/imgs/ebook/bonuse/bonus2.png" alt="Bonus 2" class="thumb-img" />
                    <div class="thumb-label">Bonus #2</div>
                </a>
                <a href="/imgs/ebook/bonuse/bonus3.pdf" download class="thumb-link">
                    <img src="/imgs/ebook/bonuse/bonus3.png" alt="Bonus 3" class="thumb-img" />
                    <div class="thumb-label">Bonus #3</div>
                </a>
            </div>
        </div>

        <!-- Special Access Unlocked Section -->
        <section class="special-access-section dark-card">
            <h1 class="special-access-title text-center">Special Access Unlocked!</h1>
            <div class="special-access-desc text-center">You can also purchase the Cosmic Life Path full reports for <span class="special-access-em">all other zodiac signs</span> below. Explore the unique cosmic blueprint of every sign—perfect for friends, family, or your own curiosity!</div>
            <div class="special-zodiac-list" id="specialZodiacList">
                @php($signs = config('variables.signs'))
                @foreach($signs as $key => $info)
                    <div class="special-zodiac-card" data-sign="{{ $key }}">
                        <img src="/imgs/ebook/horoscope/{{ $key }}.png" alt="{{ $info['name'] }}" class="thumb-img special-thumb" />
                        <div class="thumb-label">{{ $info['name'] }}</div>
                        <!-- <div class="special-zodiac-desc">{{ $info['description'] }}</div> -->
                        <a class="btn special-zodiac-download" href="{{ url('/download/vip-' . $key) }}">Order Now</a>
                    </div>
                @endforeach
            </div>
        </section>

        <div class="special-access-fullpack">
            <div class="special-access-fullpack-desc">You can also obtain the full set of 12 full reports below at a special discount too!</div>
            <div class="special-access-fullpack-img-wrap">
                <img src="/imgs/ebook/3pack.png" alt="All 12 Reports" class="special-access-fullpack-img" />
            </div>
            <div class="mt-5">
                <a href="{{ route('download.fullreport') }}" class="btn hero-cta">Purchase All 12 Reports</a>
            </div>
        </div>
    </div>
</div>

<script>
    // Download page: show user info from localStorage & set images/pdf links
    (() => {
        function getContact() {
            try {
                return JSON.parse(window.localStorage.getItem('cosmicLifePath.contact') || '{}');
            } catch { return {}; }
        }
        // sign extract from the URL: get the value after the last '-' in the pathname
        function getSignFromUrl() {
            const m = window.location.pathname.match(/(?:vip|standard)-([a-z]+)/i);
            return m ? m[1].toLowerCase() : '';
        }
        // All sign data is now rendered by Blade using config('variables.signs').

        // name
        const contact = getContact();
        const name = contact.name || 'Guest';
        const nameEl = document.getElementById('downloadName');
        if (nameEl) nameEl.textContent = name;

        // sign
        let sign = getSignFromUrl();
        const signEl = document.getElementById('downloadSign');
        if (signEl && sign) signEl.textContent = `Sign: ${sign.charAt(0).toUpperCase() + sign.slice(1)}`;
       

        // Set main product image and download links
        if (sign) {
            const imgPath = `/imgs/ebook/horoscope/${sign}.png`;
            const pdfPath = `/imgs/ebook/horoscope/${sign}.pdf`;
            const mainImg = document.getElementById('mainProductImg');
            const mainThumbImg = document.getElementById('mainThumbImg');
            const elements = document.querySelectorAll('.mainPdfLink');
            if (mainImg) mainImg.src = imgPath;
            if (mainThumbImg) mainThumbImg.src = imgPath;
            elements.forEach(el => {
                el.href = pdfPath;
            });
        }

        // Special Access: all signs, hide current sign via CSS
        const specialList = document.getElementById('specialZodiacList');
        if (specialList && sign) {
            const myCard = specialList.querySelector(`.special-zodiac-card[data-sign="${sign}"]`);
            if (myCard) myCard.style.display = 'none';
        }
        if (specialList) {
            // No download logic needed for Order Now links
        }
    })();
</script>
