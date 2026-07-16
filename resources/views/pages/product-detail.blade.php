@extends('layouts.app')

@section('title', $product->title . ' - Armada Mobil')

@section('meta_description', $product->excerpt)
@section('meta_keywords', 'armada mobil, ' . strtolower($product->title) . ', spesifikasi ' . strtolower($product->title) . ', harga ' . strtolower($product->title))
@section('og_image', $product->image)

@section('content')
    <article class="detail-container">
        <div style="margin-bottom: 2rem;">
            @php
                $isIsuzu = $product->brand && strtolower($product->brand->name) == 'isuzu';
                $backRoute = $isIsuzu ? route('isuzu') : route('daihatsu');
                $backLabel = $isIsuzu ? 'Kembali ke Katalog Isuzu' : 'Kembali ke Katalog Daihatsu';
                $brandLabel = $isIsuzu ? 'ISUZU DIESEL' : 'DAIHATSU SAHABATKU';
                $badgeBg = $isIsuzu ? 'rgba(220, 38, 38, 0.1)' : 'rgba(37, 99, 235, 0.1)';
                $badgeColor = $isIsuzu ? 'var(--color-primary)' : '#2563eb';
            @endphp
            
            <a href="{{ $backRoute }}" class="text-btn" style="margin-bottom: 1.5rem; display: inline-flex; align-items: center; gap: 0.5rem;">
                <i class="fa-solid fa-arrow-left"></i> {{ $backLabel }}
            </a>
            
            <span class="career-badge" style="background-color: {{ $badgeBg }}; color: {{ $badgeColor }}; display: block; width: fit-content; margin-bottom: 0.75rem;">
                {{ $brandLabel }}
            </span>
            
            <h1 style="font-size: 2.75rem; color: var(--color-secondary); line-height: 1.2; margin-bottom: 1rem;">
                {{ $product->title }}
            </h1>
        </div>

        <div class="detail-img">
            <img src="{{ $product->image }}" style="width: 100%; height: auto; display: block;" alt="{{ $product->title }}">
        </div>

        <div class="detail-body">
            <h2 style="font-size: 1.75rem; margin-bottom: 1.5rem; border-bottom: 2px solid var(--color-border); padding-bottom: 0.5rem; color: var(--color-secondary);">
                Spesifikasi & Informasi Detail
            </h2>
            
            <div>
                {!! $product->content !!}
            </div>
            
            <!-- WhatsApp CTA Section -->
            <div style="margin-top: 3rem; padding: 2rem; background-color: #f1f5f9; border-radius: var(--radius-md); border-left: 5px solid {{ $isIsuzu ? 'var(--color-primary)' : '#2563eb' }}; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1.5rem;">
                <div>
                    <h3 style="font-size: 1.25rem; margin-bottom: 0.5rem; color: var(--color-secondary);">Tertarik dengan Unit {{ $product->title }}?</h3>
                    <p style="font-size: 0.95rem; color: var(--color-text-muted); margin: 0;">Hubungi sales executive kami untuk mendapatkan informasi harga OTR terbaru dan simulasi kredit.</p>
                </div>
                
                @php
                    $waNumber = $contacts->where('type', 'WhatsApp')->first()?->contact ?? '+62 812-3456-7890';
                    $waClean = str_replace(['+', '-', ' '], '', $waNumber);
                @endphp
                <a href="https://wa.me/{{ $waClean }}?text=Halo%20Armada%20Mobil,%20saya%20tertarik%20dengan%20unit%20{{ urlencode($product->title) }}%20dan%20ingin%20bertanya%20informasi%20lebih%20lanjut." target="_blank" class="btn-primary" style="background-color: #22c55e;">
                    <i class="fa-brands fa-whatsapp"></i> Tanya Spesifikasi & Harga
                </a>
            </div>
        </div>
    </article>
@endsection
