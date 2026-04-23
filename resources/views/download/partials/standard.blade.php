{{-- Standard Access Download Page --}}
<div class="download-page vip">
    <div class="billing-info">
        <p class="mb-0">Billing Information: You will see a charge from "ClickBank" or "CLKBANK.COM" on your statement.</p>
    </div>
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="special-access-title">Congratulations!</h1> 
            <h1>You’ve unlocked your <strong class="text-primary">Cosmic Life Path </strong>Full Report!</h1>
            <p class="download-desc text-primary mb-4">Download your resources below.</p>

            <div>
                <div class="download-main-sign-image-row">
                    <img id="mainProductImg" src="" alt="Horoscope Main Product" class="download-main-img-large" />
                </div> 
                <div class="download-section download-instructions text-center my-5">
                    <div class="download-instruction mb-4">Your complete personalised reading — cosmic personality, wealth key, health blueprint, love secrets, life purpose, and trauma release.</div>
                    <a class="btn hero-cta mainPdfLink" href="#" download>Download Now</a>
                </div>
            </div>
        </div>

       


        <!-- <section class="download-resource-summary dark-card">
            <h2 class="download-resource-title">Your Download Includes</h2>
            <ul class="download-resource-list">
                <li><span class="download-check">✓</span> Your Cosmic Life Path Reading — <span class="download-highlight">30+ Page Personalised PDF</span></li>
                <li><span class="download-check">✓</span> Instant access in PDF format</li>
            </ul>
        </section> -->

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
                        <a class="btn special-zodiac-download" href="{{ url('/download/standard-' . $key) }}">Order Now</a>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- <div class="special-access-fullpack">
            <div class="special-access-fullpack-desc">You can also obtain the full set of 12 full reports below at a special discount too!</div>
            <div class="special-access-fullpack-img-wrap">
                <img src="/imgs/ebook/3pack.png" alt="All 12 Reports" class="special-access-fullpack-img" />
            </div>
            <div class="mt-5">
                <a href="{{ route('download.fullreport') }}" class="btn hero-cta">Purchase All 12 Reports</a>
            </div>
        </div> -->
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
        // Name
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