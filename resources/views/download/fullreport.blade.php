{{-- Full Report Purchase Page --}}

@extends('layouts.app')
@section('title', 'Purchase All 12 Cosmic Life Path Reports')

@section('content')
<div class="download-page vip">
    <div class="billing-info">
        <p class="mb-0">Billing Information: You will see a charge from <strong>Cosmic Life Path</strong> on your statement.</p>
    </div>
    <div class="container">
        <div class="download-header">
            <h1 class="fullreport-title">Purchase All 12 Cosmic Life Path Reports</h1>
            <p class="download-desc">Unlock the complete collection of personalized reports for every zodiac sign.<br>Perfect for gifts, research, or your own cosmic exploration!</p>
        </div>
        <div class="fullreport-grid">
            <!-- 12 sign images with download links -->
        </div>
    </div>
</div>
<script>
    (() => {
        const signMap = {
            aries: 'Aries', taurus: 'Taurus', gemini: 'Gemini', cancer: 'Cancer', leo: 'Leo', virgo: 'Virgo',
            libra: 'Libra', scorpio: 'Scorpio', sagittarius: 'Sagittarius', capricorn: 'Capricorn', aquarius: 'Aquarius', pisces: 'Pisces'
        };
        const signOrder = [
            'aries','taurus','gemini','cancer','leo','virgo','libra','scorpio','sagittarius','capricorn','aquarius','pisces'
        ];
        const grid = document.querySelector('.fullreport-grid');
        if (grid) {
            grid.innerHTML = signOrder.map(sign => {
                const img = `/imgs/ebook/horoscope/${sign}.png`;
                const pdf = `/imgs/ebook/horoscope/${sign}.pdf`;
                const label = signMap[sign] || sign.charAt(0).toUpperCase() + sign.slice(1);
                return `<div class="fullreport-sign">
                    <a href="${pdf}" download class="fullreport-sign-link">
                        <img src="${img}" alt="${label}" class="fullreport-sign-img" />
                        <div class="fullreport-sign-label">${label}</div>
                    </a>
                </div>`;
            }).join('');
        }
    })();
</script>
@endsection


