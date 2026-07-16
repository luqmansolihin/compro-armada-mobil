@extends('layouts.app')

@section('title', 'Katalog Kendaraan Daihatsu - Armada Mobil')

@section('meta_description', 'Cek katalog mobil Daihatsu terbaru di Armada Mobil. Dapatkan harga promo, spesifikasi unit Sigra, Gran Max, Rocky, Terios, Xenia, dan Ayla resmi.')
@section('meta_keywords', 'dealer daihatsu, armada mobil daihatsu, daihatsu sigra, daihatsu gran max, daihatsu rocky, daihatsu terios, daihatsu xenia, daihatsu ayla, kredit mobil daihatsu')

@section('content')
    <!-- Brand Banner -->
    <section class="about-hero" style="background-image: url('https://images.unsplash.com/photo-1549399542-7e3f8b79c341?auto=format&fit=crop&q=80&w=1600')">
        <div class="about-hero-content">
            <h1 style="color: var(--color-text-light); text-shadow: 0 2px 4px rgba(0,0,0,0.6);">DAIHATSU VEHICLES</h1>
            <p style="color: var(--color-text-light); font-size: 1.2rem; text-shadow: 0 1px 2px rgba(0,0,0,0.6);">Sahabatku. Kendaraan Cerdas, Nyaman, dan Paling Pas untuk Keluarga Indonesia.</p>
        </div>
    </section>

    <!-- Products List -->
    <section class="section">
        <div class="section-header">
            <h2>Daftar Unit Daihatsu</h2>
            <p>Jelajahi unit MPV keluarga, compact SUV, hatchback, serta mobil niaga andalan Daihatsu.</p>
        </div>

        <div class="grid-2">
            @forelse($products as $product)
                <div class="card product-card-horizontal">
                    <div class="card-img-side">
                        <img src="{{ $product->image }}" alt="{{ $product->title }}">
                    </div>
                    <div class="card-body-side">
                        <div>
                            <span class="career-badge" style="background-color: rgba(37, 99, 235, 0.1); color: #2563eb; margin-bottom: 0.5rem; display: inline-block;">DAIHATSU SAHABATKU</span>
                            <h3 style="font-size: 1.6rem; margin-bottom: 1rem; color: var(--color-secondary);">{{ $product->title }}</h3>
                            <div style="color: var(--color-text-muted); font-size: 0.95rem; line-height: 1.5; margin-bottom: 1.5rem;">
                                {{ $product->excerpt }}
                            </div>
                        </div>
                        
                        <div style="display: flex; gap: 1rem; align-items: center;">
                            <a href="{{ route('product.detail', $product->slug) }}" class="btn-primary" style="background-color: #2563eb; padding: 0.5rem 1rem; font-size: 0.85rem;">
                                <i class="fa-solid fa-circle-info"></i> Detail Unit
                            </a>
                            <a href="https://wa.me/{{ str_replace(['+', '-', ' '], '', $contacts->where('type', 'WhatsApp')->first()?->contact ?? '6281234567890') }}?text=Halo%20Armada%20Mobil,%20saya%20tertarik%20dengan%20unit%20Daihatsu%20{{ urlencode($product->title) }}" target="_blank" class="btn-primary" style="background-color: #22c55e; padding: 0.5rem 1rem; font-size: 0.85rem;">
                                <i class="fa-brands fa-whatsapp"></i> Tanya Sales
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="card" style="grid-column: span 2; text-align: center; padding: 4rem; color: var(--color-text-muted);">
                    <i class="fa-solid fa-car" style="font-size: 3rem; margin-bottom: 1rem; color: var(--color-border);"></i>
                    <p>Katalog Daihatsu sedang diperbarui. Hubungi sales kami untuk informasi unit.</p>
                </div>
            @endforelse
        </div>
    </section>

    <!-- Product Brochures Section -->
    <section class="section" style="background-color: #f1f5f9; max-width: 100%;">
        <div style="max-width: 1280px; margin: 0 auto;">
            <div class="section-header">
                <h2>Download Brosur</h2>
                <p>Unduh lembar spesifikasi lengkap dan brosur promosi kendaraan Daihatsu secara instan.</p>
            </div>
            
            <div class="grid-3" style="max-width: 900px; margin: 0 auto;">
                @php
                    $daihatsuBrochures = \App\Models\Brochure::where('status', true)->where('title', 'like', '%Daihatsu%')->get();
                @endphp
                @forelse($daihatsuBrochures as $brochure)
                    <div class="service-icon-box" style="padding: 1.5rem; display: flex; align-items: center; justify-content: space-between; gap: 1rem; text-align: left;">
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <i class="fa-solid fa-file-pdf" style="font-size: 2rem; color: #2563eb;"></i>
                            <div>
                                <h4 style="margin: 0; font-size: 1rem; color: var(--color-secondary);">{{ $brochure->title }}</h4>
                                <span style="font-size: 0.75rem; color: var(--color-text-muted);">PDF Document</span>
                            </div>
                        </div>
                        <a href="{{ $brochure->url }}" target="_blank" class="btn-primary" style="background-color: #2563eb; padding: 0.4rem 0.8rem; font-size: 0.8rem;">
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
