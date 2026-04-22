{{-- VIP Access Download Page --}}
<div class="download-page vip">
    <div class="billing-info">
        <p class="mb-0">Billing Information: You will see a charge from <strong>Cosmic Life Path</strong> on your statement.</p>
    </div>
    <div class="container">
        <div class="download-header">
            <h1>Welcome to <strong class="text-primary">VIP Access</strong>, <span id="downloadName"></span>!</h1>
            <p class="download-desc">Your complete Cosmic Life Path experience for <strong>{{ $sign }}</strong> is ready.<br>Download your resources below.</p>
            <!-- <div class="download-user-info">
                <span id="downloadSign" class="download-sign"></span>
                <span id="downloadBirthdate" class="download-birth"></span>
                <span id="downloadPlace" class="download-place"></span>
            </div> -->
        </div>
        <div class="download-main-sign-image-row">
            <a href="#" download class="mainPdfLink thumb-link">
                <img id="mainProductImg" src="" alt="Horoscope Main Product" class="download-main-img-large" />
            </a>
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
                    <div class="download-resource-desc-title">Your Cosmic Life Path Reading</div>
                    <div class="download-resource-desc-text">Your complete personalised reading — cosmic personality, wealth key, health blueprint, love secrets, life purpose, and trauma release. Includes your personal foreword from Celestra Vonn.</div>
                </div>
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
            <div class="special-access-desc text-center">You can also download the Cosmic Life Path reports for <span class="special-access-em">all other zodiac signs</span> below. Explore the unique cosmic blueprint of every sign—perfect for friends, family, or your own curiosity!</div>
            <div class="special-zodiac-list" id="specialZodiacList"></div>
        </section>
        
        <div class="special-access-fullpack">
            <div class="special-access-fullpack-desc">Or you can choose to purchase the complete 12 full reports below</div>
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
        const signMap = {
            aries: 'Aries', taurus: 'Taurus', gemini: 'Gemini', cancer: 'Cancer', leo: 'Leo', virgo: 'Virgo',
            libra: 'Libra', scorpio: 'Scorpio', sagittarius: 'Sagittarius', capricorn: 'Capricorn', aquarius: 'Aquarius', pisces: 'Pisces'
        };
        const signOrder = [
            'aries','taurus','gemini','cancer','leo','virgo','libra','scorpio','sagittarius','capricorn','aquarius','pisces'
        ];
        // 이름
        const contact = getContact();
        const name = contact.name || 'Guest';
        const nameEl = document.getElementById('downloadName');
        if (nameEl) nameEl.textContent = name;
        // sign
        let sign = getSignFromUrl();
        let signDisplay = signMap[sign] || (sign ? sign.charAt(0).toUpperCase() + sign.slice(1) : '');
        const signEl = document.getElementById('downloadSign');
        if (signEl) signEl.textContent = signDisplay ? `Sign: ${signDisplay}` : '';
        // 나머지 정보는 localStorage에서 시도하되, 없으면 비워둠
        function formatBirth(birth) {
            if (!birth || !birth.month || !birth.day || !birth.year) return '';
            return `${String(birth.month).padStart(2,'0')} / ${String(birth.day).padStart(2,'0')} / ${String(birth.year).padStart(4,'0')}`;
        }
        let birth = {};
        try { birth = JSON.parse(window.localStorage.getItem('cosmicLifePath.birthdate') || '{}'); } catch {}
        const birthdate = formatBirth(birth);
        const birthEl = document.getElementById('downloadBirthdate');
        if (birthEl) birthEl.textContent = birthdate ? `Birthday: ${birthdate}` : '';
        let details = {};
        try { details = JSON.parse(window.localStorage.getItem('cosmicLifePath.birthDetails') || '{}'); } catch {}
        let place = details.placeUnknown ? '' : (details.birthPlace || '');
        const placeEl = document.getElementById('downloadPlace');
        if (placeEl) placeEl.textContent = place ? `Place: ${place}` : '';

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

        // Special Access: 11 other signs
        const specialList = document.getElementById('specialZodiacList');
        if (specialList && sign) {
            const mySign = sign;
            const html = signOrder.filter(s => s !== mySign).map(s => {
                const img = `/imgs/ebook/horoscope/${s}.png`;
                const pdf = `/imgs/ebook/horoscope/${s}.pdf`;
                const label = signMap[s] || s.charAt(0).toUpperCase() + s.slice(1);
                return `<a href="${pdf}" download class="special-zodiac-thumb thumb-link" title="Download ${label} Report">
                    <img src="${img}" alt="${label}" class="thumb-img special-thumb" />
                    <div class="thumb-label">${label}</div>
                </a>`;
            }).join('');
            specialList.innerHTML = html;
        }
    })();
</script>
