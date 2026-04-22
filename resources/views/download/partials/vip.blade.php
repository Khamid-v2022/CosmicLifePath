{{-- VIP Access Download Page --}}
<div class="download-page vip">
    <div class="billing-info">
        <p class="mb-0">Billing Information: You will see a charge from <strong>Cosmic Life Path</strong> on your statement.</p>
    </div>
    <div class="container">
        <div class="download-header">
            <h1>Welcome to <strong class="text-primary">VIP Access</strong>, <span id="downloadName"></span>!</h1>
            <p class="download-desc">Your complete Cosmic Life Path experience for <strong>{{ $sign }}</strong> is ready.<br>Download your resources below.</p>
            <div class="download-user-info">
                <span id="downloadSign" class="download-sign"></span>
                <span id="downloadBirthdate" class="download-birth"></span>
                <span id="downloadPlace" class="download-place"></span>
            </div>
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
    </div>
</div>

<script>
    // Download page: show user info from localStorage & set images/pdf links
    (() => {
        function getBirth() {
            try {
                return JSON.parse(window.localStorage.getItem('cosmicLifePath.birthdate') || '{}');
            } catch { return {}; }
        }
        function getDetails() {
            try {
                return JSON.parse(window.localStorage.getItem('cosmicLifePath.birthDetails') || '{}');
            } catch { return {}; }
        }
        function getContact() {
            try {
                return JSON.parse(window.localStorage.getItem('cosmicLifePath.contact') || '{}');
            } catch { return {}; }
        }
        const signMap = {
            aries: 'Aries', taurus: 'Taurus', gemini: 'Gemini', cancer: 'Cancer', leo: 'Leo', virgo: 'Virgo',
            libra: 'Libra', scorpio: 'Scorpio', sagittarius: 'Sagittarius', capricorn: 'Capricorn', aquarius: 'Aquarius', pisces: 'Pisces'
        };
        function formatBirth(birth) {
            if (!birth.month || !birth.day || !birth.year) return '';
            return `${String(birth.month).padStart(2,'0')} / ${String(birth.day).padStart(2,'0')} / ${String(birth.year).padStart(4,'0')}`;
        }
        const birth = getBirth();
        const details = getDetails();
        const contact = getContact();
        // Name
        document.getElementById('downloadName').textContent = contact.name || '';
        // Sign
        let sign = birth.sign || details.sign || '';
        let signDisplay = sign;
        if (signMap[sign]) signDisplay = signMap[sign];
        document.getElementById('downloadSign').textContent = signDisplay ? `Sign: ${signDisplay}` : '';
        // Birthdate
        const birthdate = formatBirth(birth);
        document.getElementById('downloadBirthdate').textContent = birthdate ? `Birthday: ${birthdate}` : '';
        // Place
        let place = details.placeUnknown ? '' : (details.birthPlace || '');
        document.getElementById('downloadPlace').textContent = place ? `Place: ${place}` : '';

        // Set main product image and download links
        if (sign) {
            const imgPath = `/imgs/ebook/horoscope/${sign.toLowerCase()}.png`;
            const pdfPath = `/imgs/ebook/horoscope/${sign.toLowerCase()}.pdf`;
            const mainImg = document.getElementById('mainProductImg');
            const mainThumbImg = document.getElementById('mainThumbImg');
            // const mainPdfLink = document.getElementById('mainPdfLink');
            const elements = document.querySelectorAll('.mainPdfLink');
            
            if (mainImg) mainImg.src = imgPath;
            if (mainThumbImg) mainThumbImg.src = imgPath;
            elements.forEach(el => {
                el.href = pdfPath;
            });
            // if (mainPdfLink) mainPdfLink.href = pdfPath;
        }
    })();
</script>
