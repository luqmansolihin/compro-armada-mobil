@extends('layouts.app')

@section('title', $promotion->title . ' - Armada Mobil')

@section('meta_description', $promotion->excerpt)
@section('meta_keywords', 'armada mobil, promo ' . strtolower($promotion->title) . ', diskon mobil, paket dp murah')
@section('og_image', $promotion->image)

@section('content')
    <article class="detail-container">
        <div style="margin-bottom: 2rem;">
            <a href="{{ route('promotion') }}" class="text-btn" style="margin-bottom: 1.5rem; display: inline-flex; align-items: center; gap: 0.5rem;">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Promosi
            </a>
            <h1 style="font-size: 2.75rem; color: var(--color-secondary); line-height: 1.2;">{{ $promotion->title }}</h1>
            <div class="detail-meta">
                <span><i class="fa-regular fa-clock"></i> Berlaku Bulan Ini</span>
                <span><i class="fa-regular fa-user"></i> Penawaran Resmi</span>
                <span><i class="fa-solid fa-fire" style="color: var(--color-primary);"></i> Terbatas</span>
            </div>
        </div>

        <div class="detail-img">
            <img src="{{ $promotion->image }}" style="width: 100%; height: auto; display: block;" alt="{{ $promotion->title }}">
        </div>

        <div class="detail-body">
            {!! $promotion->content !!}
            
            <div style="margin-top: 3rem; padding: 2rem; background-color: #f1f5f9; border-radius: var(--radius-md); border-left: 5px solid var(--color-primary); display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1.5rem;">
                <div>
                    <h3 style="font-size: 1.25rem; margin-bottom: 0.5rem; color: var(--color-secondary);">Tertarik dengan Promo ini?</h3>
                    <p style="font-size: 0.95rem; color: var(--color-text-muted); margin: 0;">Hubungi sales executive kami sekarang juga sebelum periode promo habis.</p>
                </div>
                
                @php
                    $waNumber = $contacts->where('type', 'WhatsApp')->first()?->contact ?? '+62 812-3456-7890';
                    $waClean = str_replace(['+', '-', ' '], '', $waNumber);
                @endphp
                <a href="https://wa.me/{{ $waClean }}?text=Halo%20Armada%20Mobil,%20saya%20tertarik%20dengan%20promo%20{{ urlencode($promotion->title) }}" target="_blank" class="btn-primary" style="background-color: #22c55e;">
                    <i class="fa-brands fa-whatsapp"></i> Hubungi WhatsApp
                </a>
            </div>
        </div>
    </article>
@endsection
