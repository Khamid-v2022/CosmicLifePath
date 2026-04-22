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
            @php($signs = config('variables.signs'))
            @foreach($signs as $key => $info)
                <div class="special-zodiac-card" data-sign="{{ $key }}">
                    <img src="/imgs/ebook/horoscope/{{ $key }}.png" alt="{{ $info['name'] }}" class="thumb-img special-thumb" />
                    <div class="thumb-label">{{ $info['name'] }}</div>
                    <div class="special-zodiac-desc">{{ $info['description'] }}</div>
                    <button class="btn special-zodiac-download" data-sign="{{ $key }}" data-pdf="/imgs/ebook/horoscope/{{ $key }}.pdf">Download Now</button>
                </div>
            @endforeach
        </div>
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
