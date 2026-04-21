{{-- VIP Access Download Page --}}
<div class="download-page vip">
    <div class="billing-info">
        <p class="mb-0">Billing Information: You will see a charge from <strong>Cosmic Life Path</strong> on your statement.</p>
    </div>
    <div class="container">
        <h1>Welcome to VIP Access, <span id="downloadName"></span>!</h1>
        <div id="downloadUserInfo" style="font-size:0.95em;color:#888;margin-bottom:1.2em">
            <span id="downloadSign"></span>
            <span id="downloadBirthdate" style="margin-left:1.2em"></span>
            <span id="downloadPlace" style="margin-left:1.2em"></span>
        </div>
        <p>Your complete Cosmic Life Path experience for <strong>{{ $sign }}</strong> is ready. Download everything below.</p>
        <p class="instructions">Right click each button below and select 'Save Link As' to download each file to your device. We have also emailed you a copy of this page so you always have access.</p>
        <div class="resources">
            <h2>Your Complete VIP Resources</h2>
            <ul>
                <li>✓ Your Cosmic Life Path Reading — 30+ Page Personalised PDF</li>
                <li>✓ Personal Foreword & Insights By Celestra Vonn — included in your reading</li>
                <li>✓ The Secret Language of Fame (Bonus #1)</li>
                <li>✓ Your Soul Urge Number Report (Bonus #2)</li>
                <li>✓ Your Lunar Money Path Report (Bonus #3)</li>
                <li>✓ Priority Email Support — responses within 24 hours</li>
                <li>✓ First Access to new readings and updates</li>
            </ul>
            <div class="download-links">
                <a href="#" class="btn btn-primary">DOWNLOAD MY READING →</a>
                <a href="#" class="btn btn-secondary">Bonus #1 — The Secret Language of Fame</a>
                <a href="#" class="btn btn-secondary">Bonus #2 — Your Soul Urge Number Report</a>
                <a href="#" class="btn btn-secondary">Bonus #3 — Your Lunar Money Path Report</a>
            </div>
        </div>
    </div>
</div>

<script>
    // Download page: show user info from localStorage
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
        if (signMap[sign]) sign = signMap[sign];
        document.getElementById('downloadSign').textContent = sign ? `Sign: ${sign}` : '';
        // Birthdate
        const birthdate = formatBirth(birth);
        document.getElementById('downloadBirthdate').textContent = birthdate ? `Birthday: ${birthdate}` : '';
        // Place
        let place = details.placeUnknown ? '' : (details.birthPlace || '');
        document.getElementById('downloadPlace').textContent = place ? `Place: ${place}` : '';
    })();
</script>
