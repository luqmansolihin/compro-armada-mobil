@extends('layouts.app')

@section('title', 'Armada Mobil - Solusi Otomotif Isuzu & Daihatsu Anda')

@section('meta_description', 'Armada Mobil adalah dealer resmi penjualan dan perawatan unit kendaraan Isuzu & Daihatsu di Indonesia. Dapatkan penawaran promo, paket kredit, dan layanan servis terbaik.')
@section('meta_keywords', 'armada mobil, dealer resmi isuzu, dealer resmi daihatsu, beli mobil baru, promo mobil isuzu, promo mobil daihatsu, bengkel isuzu, bengkel daihatsu')

@section('content')
    <!-- Hero Slider -->
    <section class="hero-slider">
        @forelse($banners as $index => $banner)
            <div class="slide {{ $index === 0 ? 'active' : '' }}">
                <img src="{{ $banner->image }}" class="slide-bg" alt="{{ $banner->title }}">
                <div class="slide-content">
                    <h2>{{ $banner->title }}</h2>
                    <p>Dealer Resmi Penjualan & Perawatan Isuzu & Daihatsu Terlengkap di Indonesia.</p>
                    <a href="{{ route('branch') }}" class="btn-primary">
                        <i class="fa-solid fa-map-location-dot"></i> Temukan Cabang
                    </a>
                </div>
            </div>
        @empty
            <div class="slide active">
                <img src="https://images.unsplash.com/photo-1617788138017-80ad40651399?auto=format&fit=crop&q=80&w=1600" class="slide-bg" alt="Default Banner">
                <div class="slide-content">
                    <h2>Solusi Berkendara Keluarga & Bisnis Anda</h2>
                    <p>Dealer Resmi Penjualan & Perawatan Isuzu & Daihatsu Terlengkap di Indonesia.</p>
                    <a href="{{ route('branch') }}" class="btn-primary">
                        <i class="fa-solid fa-map-location-dot"></i> Temukan Cabang
                    </a>
                </div>
            </div>
        @endforelse
    </section>

    <!-- Brands Showcase -->
    <section class="section">
        <div class="section-header">
            <h2>Authorized Dealer</h2>
            <p>Pilih brand andalan Anda untuk melihat katalog unit kendaraan terbaru dan terlengkap.</p>
        </div>
        
        <div class="brand-showcase">
            <div class="brand-box isuzu">
                <h3>ISUZU</h3>
                <p>Rajanya Diesel. Partner Tangguh Bisnis Anda dalam angkutan komersial dan petualangan berat.</p>
                <a href="{{ route('isuzu') }}" class="btn-primary" style="background-color: var(--color-primary);">Lihat Unit Isuzu</a>
            </div>
            
            <div class="brand-box daihatsu">
                <h3>DAIHATSU</h3>
                <p>Sahabatku. Kendaraan keluarga cerdas, efisien, handal, dan berteknologi modern DNGA.</p>
                <a href="{{ route('daihatsu') }}" class="btn-primary" style="background-color: #2563eb;">Lihat Unit Daihatsu</a>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="section" style="background-color: #f1f5f9; max-width: 100%;">
        <div style="max-width: 1280px; margin: 0 auto;">
            <div class="section-header">
                <h2>Layanan Kami</h2>
                <p>Kami memastikan kenyamanan berkendara Anda melalui pelayanan prima yang terintegrasi.</p>
            </div>
            
            <div class="grid-3">
                @forelse($services as $service)
                    <div class="service-icon-box">
                        <div class="service-icon-wrapper">
                            <i class="fa-solid {{ $service->icon }}"></i>
                        </div>
                        <h3>{{ $service->title }}</h3>
                        <p style="color: var(--color-text-muted); font-size: 0.95rem; margin-top: 0.75rem;">{{ $service->description }}</p>
                    </div>
                @empty
                    <div class="service-icon-box">
                        <div class="service-icon-wrapper"><i class="fa-solid fa-calendar-check"></i></div>
                        <h3>Booking Service Online</h3>
                        <p>Reservasi servis berkala dengan mudah tanpa antrean.</p>
                    </div>
                    <div class="service-icon-box">
                        <div class="service-icon-wrapper"><i class="fa-solid fa-cogs"></i></div>
                        <h3>Suku Cadang Asli</h3>
                        <p>Jaminan keaslian spare parts resmi pabrikan.</p>
                    </div>
                    <div class="service-icon-box">
                        <div class="service-icon-wrapper"><i class="fa-solid fa-truck-pickup"></i></div>
                        <h3>Mobile Service Car</h3>
                        <p>Layanan servis panggilan langsung ke rumah Anda.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Promotions Section -->
    <section class="section">
        <div class="section-header">
            <h2>Promo Terkini</h2>
            <p>Dapatkan penawaran harga spesial, diskon servis, dan paket DP menarik khusus bulan ini.</p>
        </div>
        
        <div class="grid-3">
            @forelse($promotions as $promo)
                <div class="card">
                    <div class="card-img-wrapper">
                        <img src="{{ $promo->image }}" class="card-img" alt="{{ $promo->title }}">
                        <span class="card-badge">PROMO</span>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">{{ $promo->title }}</h3>
                        <div class="card-text">{!! strip_tags($promo->content) !!}</div>
                        <div class="card-footer-btn">
                            <span class="text-btn">Selengkapnya <i class="fa-solid fa-arrow-right"></i></span>
                            <a href="{{ route('promotion.detail', $promo->slug) }}" class="stretched-link" style="position: absolute; top:0; left:0; width:100%; height:100%; z-index:1;"></a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="card" style="grid-column: span 3; text-align: center; padding: 3rem; color: var(--color-text-muted);">
                    <i class="fa-solid fa-gift" style="font-size: 3rem; margin-bottom: 1rem; color: var(--color-border);"></i>
                    <p>Belum ada promosi aktif untuk saat ini.</p>
                </div>
            @endforelse
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="section testimonial-section" style="max-width: 100%;">
        <div style="max-width: 1280px; margin: 0 auto;">
            <div class="section-header">
                <h2>Apa Kata Mereka?</h2>
                <p style="color: #cbd5e1;">Testimoni jujur dari pelanggan setia yang telah merasakan kepuasan pelayanan Armada Mobil.</p>
            </div>
            
            <div class="grid-2">
                @forelse($testimonials as $testimonial)
                    <div class="testimonial-card">
                        <div class="testimonial-text">{{ $testimonial->testimonial }}</div>
                        <div class="testimonial-user">
                            <img src="{{ $testimonial->image }}" class="testimonial-avatar" alt="{{ $testimonial->name }}">
                            <div>
                                <div class="testimonial-name">{{ $testimonial->name }}</div>
                                <div class="testimonial-role">{{ $testimonial->profession }}</div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="testimonial-card" style="grid-column: span 2; text-align: center;">
                        <p>Belum ada testimoni.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Recent Blogs -->
    <section class="section">
        <div class="section-header">
            <h2>Berita & Artikel</h2>
            <p>Ikuti perkembangan dunia otomotif, tips merawat mesin, serta informasi kegiatan terkini dari kami.</p>
        </div>
        
        <div class="grid-3">
            @forelse($blogs as $blog)
                <div class="card">
                    <div class="card-img-wrapper">
                        <img src="{{ $blog->image }}" class="card-img" alt="{{ $blog->title }}">
                        <span class="card-badge" style="background-color: var(--color-secondary);">NEWS</span>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">{{ $blog->title }}</h3>
                        <div class="card-text">{!! strip_tags($blog->content) !!}</div>
                        <div class="card-footer-btn">
                            <span class="text-btn">Baca Selengkapnya <i class="fa-solid fa-arrow-right"></i></span>
                            <a href="{{ route('blog.detail', $blog->slug) }}" class="stretched-link" style="position: absolute; top:0; left:0; width:100%; height:100%; z-index:1;"></a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="card" style="grid-column: span 3; text-align: center; padding: 3rem; color: var(--color-text-muted);">
                    <p>Belum ada artikel terbaru.</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        // Hero Slider functionality
        const slides = document.querySelectorAll('.hero-slider .slide');
        let currentSlide = 0;
        
        if(slides.length > 1) {
            setInterval(() => {
                slides[currentSlide].classList.remove('active');
                currentSlide = (currentSlide + 1) % slides.length;
                slides[currentSlide].classList.add('active');
            }, 5000);
        }
    </script>
@endsection
