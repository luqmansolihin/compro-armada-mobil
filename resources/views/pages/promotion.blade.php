@extends('layouts.app')

@section('title', 'Promo Terbaru & Penawaran Eksklusif - Armada Mobil')

@section('meta_description', 'Jangan lewatkan promo terbaru dari Armada Mobil. Temukan penawaran harga spesial, paket DP murah, angsuran ringan, serta diskon servis kendaraan Isuzu & Daihatsu.')
@section('meta_keywords', 'promo mobil baru, diskon armada mobil, promo isuzu elf, promo daihatsu sigra, paket dp murah, cashback otomotif')

@section('content')
    <!-- Banner Header -->
    <section class="about-hero" style="background-image: url('https://images.unsplash.com/photo-1605152276897-4f618f831968?auto=format&fit=crop&q=80&w=1600')">
        <div class="about-hero-content">
            <h1 style="color: var(--color-text-light); text-shadow: 0 2px 4px rgba(0,0,0,0.65);">SPECIAL PROMOTIONS</h1>
            <p style="color: var(--color-text-light); font-size: 1.2rem; text-shadow: 0 1px 2px rgba(0,0,0,0.65);">Hemat Ratusan Juta Rupiah. Dapatkan Paket DP Ringan & Bunga Rendah Sekarang.</p>
        </div>
    </section>

    <!-- Promotions List -->
    <section class="section">
        <div class="grid-3">
            @forelse($promotions as $promo)
                <div class="card">
                    <div class="card-img-wrapper">
                        <img src="{{ $promo->image }}" class="card-img" alt="{{ $promo->title }}">
                        <span class="card-badge" style="background-color: var(--color-primary);">PROMO TERBARU</span>
                    </div>
                    <div class="card-body">
                        <span style="font-size: 0.8rem; color: var(--color-text-muted); display: block; margin-bottom: 0.5rem;">
                            <i class="fa-regular fa-clock"></i> Berlaku s.d. {{ $promo->created_at->addMonth()->format('d M Y') }}
                        </span>
                        <h3 class="card-title">{{ $promo->title }}</h3>
                        <div class="card-text">{{ $promo->excerpt }}</div>
                        <div class="card-footer-btn">
                            <span class="text-btn">Ambil Promo <i class="fa-solid fa-arrow-right"></i></span>
                            <a href="{{ route('promotion.detail', $promo->slug) }}" class="stretched-link" style="position: absolute; top:0; left:0; width:100%; height:100%; z-index:1;"></a>
                        </div>
                    </div>
                </div>
            @empty
                <div style="grid-column: span 3; text-align: center; padding: 4rem; color: var(--color-text-muted);">
                    <i class="fa-solid fa-gift" style="font-size: 3rem; margin-bottom: 1rem; color: var(--color-border);"></i>
                    <p>Saat ini belum ada penawaran promosi yang aktif. Silakan hubungi kami untuk info penawaran menarik lainnya.</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection
