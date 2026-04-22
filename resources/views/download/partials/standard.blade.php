{{-- Standard Access Download Page --}}
<div class="download-page vip">
    <div class="billing-info">
        <p class="mb-0">Billing Information: You will see a charge from <strong>Cosmic Life Path</strong> on your statement.</p>
    </div>
    <div class="container">
        <div class="download-header">
            <h1>Your Cosmic Life Path Reading Is Ready!</h1>
            <p class="download-desc">Download all your resources below — your journey begins now.</p>
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
            <h2 class="download-resource-title">Your Download Includes</h2>
            <ul class="download-resource-list">
                <li><span class="download-check">✓</span> Your Cosmic Life Path Reading — <span class="download-highlight">30+ Page Personalised PDF</span></li>
                <li><span class="download-check">✓</span> Instant access in PDF format</li>
            </ul>
            <div class="download-resource-descs">
                <div class="download-resource-desc">
                    <div class="download-resource-desc-title">Your Cosmic Life Path Reading</div>
                    <div class="download-resource-desc-text">Your complete personalised reading — cosmic personality, wealth key, health blueprint, love secrets, life purpose, and trauma release.</div>
                </div>
            </div>
        </section>

        <!-- Special Access Unlocked Section -->
        <section class="special-access-section dark-card">
            <h1 class="special-access-title text-center">Special Access Unlocked!</h1>
            <div class="special-access-desc text-center">You can also download the Cosmic Life Path reports for <span class="special-access-em">all other zodiac signs</span> below. Explore the unique cosmic blueprint of every sign—perfect for friends, family, or your own curiosity!</div>
            <div class="special-zodiac-list" id="specialZodiacList"></div>
        </section>
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
        const signOrder = [
            'aries','taurus','gemini','cancer','leo','virgo','libra','scorpio','sagittarius','capricorn','aquarius','pisces'
        ];
        function formatBirth(birth) {
            if (!birth.month || !birth.day || !birth.year) return '';
            return `${String(birth.month).padStart(2,'0')} / ${String(birth.day).padStart(2,'0')} / ${String(birth.year).padStart(4,'0')}`;
        }
        const birth = getBirth();
        const details = getDetails();
        const contact = getContact();
        // Name
        // (standard는 이름 노출 없음)
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
            const mySign = sign.toLowerCase();
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