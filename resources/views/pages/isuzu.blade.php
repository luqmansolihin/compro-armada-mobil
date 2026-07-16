@extends('layouts.app')

@section('title', 'Katalog Kendaraan Isuzu - Armada Mobil')

@section('meta_description', 'Temukan katalog kendaraan Isuzu terbaru di Armada Mobil. Dapatkan informasi spesifikasi, brosur, penawaran harga, dan promo truk Isuzu ELF, Giga, Traga, serta D-Max.')
@section('meta_keywords', 'dealer isuzu, armada mobil isuzu, isuzu elf, isuzu giga, isuzu traga, isuzu d-max, truk isuzu, kredit truk isuzu, promo isuzu')

@section('content')
    <!-- Brand Banner -->
    <section class="about-hero" style="background-image: url('https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&q=80&w=1600')">
        <div class="about-hero-content">
            <h1 style="color: var(--color-text-light); text-shadow: 0 2px 4px rgba(0,0,0,0.6);">ISUZU VEHICLES</h1>
            <p style="color: var(--color-text-light); font-size: 1.2rem; text-shadow: 0 1px 2px rgba(0,0,0,0.6);">Rajanya Diesel. Tangguh, Efisien, dan Handal untuk Setiap Kebutuhan Bisnis Anda.</p>
        </div>
    </section>

    <!-- Products List -->
    <section class="section">
        <div class="section-header">
            <h2>Daftar Unit Isuzu</h2>
            <p>Jelajahi unit truk, bak komersial, serta double cabin tangguh dari Isuzu resmi.</p>
        </div>

        <div class="grid-2">
            @forelse($products as $product)
                <div class="card product-card-horizontal">
                    <div class="card-img-side">
                        <img src="{{ $product->image }}" alt="{{ $product->title }}">
                    </div>
                    <div class="card-body-side">
                        <div>
                            <span class="career-badge" style="margin-bottom: 0.5rem; display: inline-block;">ISUZU DIESEL</span>
                            <h3 style="font-size: 1.6rem; margin-bottom: 1rem; color: var(--color-secondary);">{{ $product->title }}</h3>
                            <div style="color: var(--color-text-muted); font-size: 0.95rem; line-height: 1.5; margin-bottom: 1.5rem;">
                                {{ $product->excerpt }}
                            </div>
                        </div>
                        
                        <div style="display: flex; gap: 1rem; align-items: center;">
                            <a href="{{ route('product.detail', $product->slug) }}" class="btn-primary" style="padding: 0.5rem 1rem; font-size: 0.85rem;">
                                <i class="fa-solid fa-circle-info"></i> Detail Unit
                            </a>
                            <a href="https://wa.me/{{ str_replace(['+', '-', ' '], '', $contacts->where('type', 'WhatsApp')->first()?->contact ?? '6281234567890') }}?text=Halo%20Armada%20Mobil,%20saya%20tertarik%20dengan%20unit%20Isuzu%20{{ urlencode($product->title) }}" target="_blank" class="btn-primary" style="background-color: #22c55e; padding: 0.5rem 1rem; font-size: 0.85rem;">
                                <i class="fa-brands fa-whatsapp"></i> Tanya Sales
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="card" style="grid-column: span 2; text-align: center; padding: 4rem; color: var(--color-text-muted);">
                    <i class="fa-solid fa-truck" style="font-size: 3rem; margin-bottom: 1rem; color: var(--color-border);"></i>
                    <p>Katalog Isuzu sedang diperbarui. Hubungi sales kami untuk informasi unit.</p>
                </div>
            @endforelse
        </div>
    </section>

    <!-- Product Brochures Section -->
    <section class="section" style="background-color: #f1f5f9; max-width: 100%;">
        <div style="max-width: 1280px; margin: 0 auto;">
            <div class="section-header">
                <h2>Download Brosur</h2>
                <p>Unduh lembar spesifikasi lengkap dan brosur promosi kendaraan Isuzu secara instan.</p>
            </div>
            
            <div class="grid-3" style="max-width: 900px; margin: 0 auto;">
                @php
                    $isuzuBrochures = \App\Models\Brochure::where('status', true)->where('title', 'like', '%Isuzu%')->get();
                @endphp
                @forelse($isuzuBrochures as $brochure)
                    <div class="service-icon-box" style="padding: 1.5rem; display: flex; align-items: center; justify-content: space-between; gap: 1rem; text-align: left;">
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <i class="fa-solid fa-file-pdf" style="font-size: 2rem; color: var(--color-primary);"></i>
                            <div>
                                <h4 style="margin: 0; font-size: 1rem; color: var(--color-secondary);">{{ $brochure->title }}</h4>
                                <span style="font-size: 0.75rem; color: var(--color-text-muted);">PDF Document</span>
                            </div>
                        </div>
                        <a href="{{ $brochure->url }}" target="_blank" class="btn-primary" style="padding: 0.4rem 0.8rem; font-size: 0.8rem;">
                            <i class="fa-solid fa-download"></i>
                        </a>
                    </div>
                @empty
                    <div style="grid-column: span 3; text-align: center; color: var(--color-text-muted);">
                        <p>Belum ada brosur yang diunggah.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
