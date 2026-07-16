@extends('layouts.app')

@section('title', 'Artikel & Berita Terbaru - Armada Mobil')

@section('meta_description', 'Kumpulan tips otomotif terbaru, info kegiatan dealer, dan kabar terbaru seputar industri otomotif Isuzu & Daihatsu dari Armada Mobil.')
@section('meta_keywords', 'blog otomotif, tips merawat mobil, berita otomotif, kegiatan armada mobil, artikel mobil')

@section('content')
    <!-- Banner Header -->
    <section class="about-hero" style="background-image: url('{{ asset('storage/uploads/blogs_cover_banner.png') }}'); background-position: center;">
        <div class="about-hero-content">
            <h1 style="color: var(--color-text-light); text-shadow: 0 2px 4px rgba(0,0,0,0.65);">BLOGS & ARTICLES</h1>
            <p style="color: var(--color-text-light); font-size: 1.2rem; text-shadow: 0 1px 2px rgba(0,0,0,0.65);">Tips Otomotif, Info Kegiatan, dan Kabar Terbaru Seputar Isuzu & Daihatsu.</p>
        </div>
    </section>

    <!-- Blogs List -->
    <section class="section">
        <div class="grid-3">
            @forelse($blogs as $blog)
                <div class="card">
                    <div class="card-img-wrapper">
                        <img src="{{ $blog->image }}" class="card-img" alt="{{ $blog->title }}">
                        <span class="card-badge" style="background-color: var(--color-secondary);">AUTO NEWS</span>
                    </div>
                    <div class="card-body">
                        <span style="font-size: 0.8rem; color: var(--color-text-muted); display: block; margin-bottom: 0.5rem;">
                            <i class="fa-regular fa-calendar-days"></i> {{ $blog->created_at->format('d M Y') }}
                        </span>
                        <h3 class="card-title">{{ $blog->title }}</h3>
                        <div class="card-text">{{ $blog->excerpt }}</div>
                        <div class="card-footer-btn">
                            <span class="text-btn">Baca Selengkapnya <i class="fa-solid fa-arrow-right"></i></span>
                            <a href="{{ route('blog.detail', $blog->slug) }}" class="stretched-link" style="position: absolute; top:0; left:0; width:100%; height:100%; z-index:1;"></a>
                        </div>
                    </div>
                </div>
            @empty
                <div style="grid-column: span 3; text-align: center; padding: 4rem; color: var(--color-text-muted);">
                    <i class="fa-regular fa-newspaper" style="font-size: 3rem; margin-bottom: 1rem; color: var(--color-border);"></i>
                    <p>Belum ada artikel yang dipublikasikan.</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection
