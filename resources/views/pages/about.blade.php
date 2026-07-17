@extends('layouts.app')

@section('title', 'Tentang Kami - Armada Mobil')

@section('meta_description', 'Ketahui lebih dalam mengenai profil Armada Mobil, jaringan dealer resmi dan bengkel otomotif terpercaya untuk Isuzu dan Daihatsu dengan layanan bintang lima.')
@section('meta_keywords', 'tentang armada mobil, profil dealer otomotif, sejarah armada mobil, dealer resmi indonesia')

@section('content')
    <!-- About Hero -->
    <section class="about-hero" style="background-image: url('{{ $profile->cover ?? 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=1600' }}')">
        <div class="about-hero-content">
            <h1 style="color: var(--color-text-light); text-shadow: 0 2px 4px rgba(0,0,0,0.65);">ABOUT US</h1>
            <p style="color: var(--color-text-light); font-size: 1.2rem; text-shadow: 0 1px 2px rgba(0,0,0,0.65);">Lebih Dekat dengan Armada Mobil, Jaringan Dealer Resmi & Bengkel Otomotif Terpercaya Anda.</p>
        </div>
    </section>

    <!-- Company Description -->
    <section class="section">
        <div class="grid-2">
            <div>
                <span class="career-badge" style="margin-bottom: 0.5rem; display: inline-block;">PROFIL PERUSAHAAN</span>
                <h2 style="font-size: 2.2rem; margin-bottom: 1.5rem; color: var(--color-secondary);">Armada Mobil Otomotif</h2>
                <p style="font-size: 1.15rem; color: var(--color-text-muted); font-weight: 500; margin-bottom: 1.5rem; line-height: 1.6;">
                    {{ $profile->short_description ?? 'Armada Mobil adalah dealer resmi otomotif terpercaya yang melayani penjualan dan purna jual kendaraan Isuzu dan Daihatsu.' }}
                </p>
                <div style="font-size: 1.05rem; color: var(--color-text); line-height: 1.8; margin-bottom: 2rem;">
                    {!! $profile->description ?? 'Kami berkomitmen untuk selalu menghadirkan pelayanan terbaik, solusi pembiayaan yang mudah, serta jaringan servis purna jual yang luas guna memastikan kepuasan dan kelancaran mobilitas Anda.' !!}
                </div>
            </div>
            
            <div class="about-image-container">
                <img src="https://images.unsplash.com/photo-1563720223185-11003d516935?auto=format&fit=crop&q=80&w=800" style="border-radius: var(--radius-xl); box-shadow: var(--shadow-lg);" alt="Showroom Mobil">
                
                <div class="experience-badge">
                    <div class="badge-number">15+</div>
                    <div class="badge-text">Tahun Pengalaman</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision & Mission -->
    <section class="section" style="background-color: #f1f5f9; max-width: 100%;">
        <div style="max-width: 1280px; margin: 0 auto;">
            <div class="grid-2">
                <div class="service-icon-box" style="text-align: left; padding: 3rem;">
                    <div class="service-icon-wrapper" style="margin-left: 0;"><i class="fa-solid fa-eye"></i></div>
                    <h3 style="font-size: 1.75rem; margin-bottom: 1rem; color: var(--color-secondary);">Visi Kami</h3>
                    <p style="color: var(--color-text-muted); font-size: 1.05rem; white-space: pre-line;">
                        {{ $profile->vision ?? 'Menjadi perusahaan otomotif terdepan dan paling terpercaya di Indonesia yang memberikan solusi transportasi terbaik bagi kebutuhan keluarga maupun kelancaran operasional bisnis pelanggan.' }}
                    </p>
                </div>
                
                <div class="service-icon-box" style="text-align: left; padding: 3rem;">
                    <div class="service-icon-wrapper" style="margin-left: 0;"><i class="fa-solid fa-bullseye"></i></div>
                    <h3 style="font-size: 1.75rem; margin-bottom: 1rem; color: var(--color-secondary);">Misi Kami</h3>
                    <p style="color: var(--color-text-muted); font-size: 1.05rem; white-space: pre-line;">
                        {{ $profile->mission ?? 'Menyediakan produk kendaraan Isuzu & Daihatsu berkualitas tinggi, memberikan pelayanan servis purna jual yang cepat dan handal, serta menciptakan kenyamanan bertransaksi melalui solusi pembiayaan terpercaya.' }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline History -->
    <section class="section">
        <div class="section-header">
            <h2>Sejarah & Perjalanan Kami</h2>
            <p>Bagaimana kami bertumbuh menjadi salah satu dealer dan bengkel otomotif terbesar di Indonesia.</p>
        </div>

        <div class="about-timeline">
            @if(!empty($profile->history) && is_array($profile->history))
                @foreach($profile->history as $item)
                    <div class="timeline-item">
                        <div class="timeline-badge"></div>
                        <div class="timeline-panel">
                            <h3>{{ $item['year'] ?? '' }}</h3>
                            <p>{{ $item['description'] ?? '' }}</p>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="timeline-item">
                    <div class="timeline-badge"></div>
                    <div class="timeline-panel">
                        <h3>Tahun 2010</h3>
                        <p>Dealer pertama kami resmi didirikan di Jakarta Pusat untuk memasarkan unit kendaraan Daihatsu.</p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-badge"></div>
                    <div class="timeline-panel">
                        <h3>Tahun 2014</h3>
                        <p>Membuka cabang baru di Surabaya dan secara resmi menjalin kerjasama sebagai dealer resmi Isuzu.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-badge"></div>
                    <div class="timeline-panel">
                        <h3>Tahun 2018</h3>
                        <p>Meluncurkan program Layanan Mobile Service Car untuk menjangkau servis kendaraan operasional langsung ke lapangan.</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-badge"></div>
                    <div class="timeline-panel">
                        <h3>Tahun 2024 - Sekarang</h3>
                        <p>Mengintegrasikan sistem reservasi booking servis secara online, dan melayani ribuan pelanggan komersial di Indonesia.</p>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
