<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Armada Mobil - Trading Otomotif Terpercaya')</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('meta_description', 'Armada Mobil adalah dealer resmi otomotif terpercaya untuk penjualan dan purna jual kendaraan Isuzu dan Daihatsu dengan kualitas layanan bintang lima.')">
    <meta name="keywords" content="@yield('meta_keywords', 'armada mobil, dealer resmi, dealer isuzu, dealer daihatsu, purna jual, beli mobil, mobil baru')">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="@yield('canonical', url()->current())">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="@yield('canonical', url()->current())">
    <meta property="og:title" content="@yield('title', 'Armada Mobil - Trading Otomotif Terpercaya')">
    <meta property="og:description" content="@yield('meta_description', 'Armada Mobil adalah dealer resmi otomotif terpercaya untuk penjualan dan purna jual kendaraan Isuzu dan Daihatsu dengan kualitas layanan bintang lima.')">
    <meta property="og:image" content="@yield('og_image', 'https://armadamobil.co.id/logo/logo.png')">
    <meta property="og:site_name" content="Armada Mobil">
    <meta property="og:locale" content="id_ID">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="@yield('canonical', url()->current())">
    <meta name="twitter:title" content="@yield('title', 'Armada Mobil - Trading Otomotif Terpercaya')">
    <meta name="twitter:description" content="@yield('meta_description', 'Armada Mobil adalah dealer resmi otomotif terpercaya untuk penjualan dan purna jual kendaraan Isuzu dan Daihatsu dengan kualitas layanan bintang lima.')">
    <meta name="twitter:image" content="@yield('og_image', 'https://armadamobil.co.id/logo/logo.png')">

    <!-- JSON-LD Structured Data -->
    @php
        $phone = isset($contacts) ? ($contacts->where('type', 'Phone')->first()?->contact ?? '+62 21-1234567') : '+62 21-1234567';
        $ig = isset($contacts) ? ($contacts->where('type', 'Instagram')->first()?->contact ?? '@armada_mobil') : '@armada_mobil';
        $igClean = str_replace('@', '', $ig);
    @endphp
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "AutoDealer",
      "name": "Armada Mobil",
      "url": "{{ url('/') }}",
      "logo": "https://armadamobil.co.id/logo/logo.png",
      "image": "https://armadamobil.co.id/logo/logo.png",
      "description": "Armada Mobil adalah dealer resmi otomotif terpercaya untuk penjualan dan purna jual kendaraan Isuzu dan Daihatsu dengan kualitas layanan bintang lima.",
      "telephone": "{{ $phone }}",
      "priceRange": "$$$",
      "address": {
        "@type": "PostalAddress",
        "addressCountry": "ID"
      },
      "sameAs": [
        "https://www.instagram.com/{{ $igClean }}"
      ]
    }
    </script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="https://armadamobil.co.id/logo/favicon.ico" type="image/x-icon">
    <!-- CSS Custom -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- FontAwesome Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @yield('styles')
</head>
<body>

    <!-- Header & Navbar -->
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="{{ route('home') }}">
                    <img src="https://armadamobil.co.id/logo/logo.png" alt="Armada Mobil Logo" style="height: 45px; width: auto; max-width: 100%; display: block;">
                </a>
            </div>
            
            <button class="menu-toggle" id="mobile-menu-btn" aria-label="Toggle Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <ul class="nav-links" id="nav-links">
                <li><a href="{{ route('home') }}" class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('isuzu') }}" class="{{ Route::currentRouteName() == 'isuzu' ? 'active' : '' }}">Isuzu</a></li>
                <li><a href="{{ route('daihatsu') }}" class="{{ Route::currentRouteName() == 'daihatsu' ? 'active' : '' }}">Daihatsu</a></li>
                <li><a href="{{ route('branch') }}" class="{{ Route::currentRouteName() == 'branch' ? 'active' : '' }}">Our Branch</a></li>
                <li><a href="{{ route('about') }}" class="{{ Route::currentRouteName() == 'about' ? 'active' : '' }}">About Us</a></li>
                <li><a href="{{ route('blogs') }}" class="{{ Route::currentRouteName() == 'blogs' || Route::currentRouteName() == 'blog.detail' ? 'active' : '' }}">Blogs</a></li>
                <li><a href="{{ route('promotion') }}" class="{{ Route::currentRouteName() == 'promotion' || Route::currentRouteName() == 'promotion.detail' ? 'active' : '' }}">Promotion</a></li>
                <li><a href="{{ route('career') }}" class="{{ Route::currentRouteName() == 'career' ? 'active' : '' }}">Career</a></li>
                <li><a href="{{ route('purna-jual') }}" class="{{ Route::currentRouteName() == 'purna-jual' ? 'active' : '' }}">Purna Jual</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-col">
                <h4>Hubungi Kami</h4>
                <ul class="footer-contact-list">
                    @php 
                        $phone = isset($contacts) ? ($contacts->where('type', 'Phone')->first()?->contact ?? '+62 21-1234567') : '+62 21-1234567';
                        $wa = isset($contacts) ? ($contacts->where('type', 'WhatsApp')->first()?->contact ?? '+62 812-3456-7890') : '+62 812-3456-7890';
                        $email = isset($contacts) ? ($contacts->where('type', 'Email')->first()?->contact ?? 'info@armada-mobil.co.id') : 'info@armada-mobil.co.id';
                        $ig = isset($contacts) ? ($contacts->where('type', 'Instagram')->first()?->contact ?? '@armada_mobil') : '@armada_mobil';
                        $globalHours = \App\Models\OperationalHour::all();
                    @endphp
                    <li><i class="fa-solid fa-phone"></i> {{ $phone }}</li>
                    <li><i class="fa-brands fa-whatsapp"></i> {{ $wa }}</li>
                    <li><i class="fa-solid fa-envelope"></i> {{ $email }}</li>
                    <li><i class="fa-brands fa-instagram"></i> {{ $ig }}</li>
                </ul>

                @if($globalHours->isNotEmpty())
                    <h4 style="margin-top: 1.5rem; font-size: 1.2rem; border-bottom: 2px solid var(--color-primary); padding-bottom: 0.5rem; display: inline-block;">Jam Kerja Head Office</h4>
                    <ul class="footer-contact-list" style="margin-top: 0.5rem;">
                        @foreach($globalHours as $hour)
                            <li>
                                <i class="fa-regular fa-clock" style="color: var(--color-primary);"></i>
                                <span>
                                    @if(strcasecmp($hour->day_from, $hour->day_to) === 0)
                                        {{ $hour->day_from }}
                                    @else
                                        {{ $hour->day_from }} - {{ $hour->day_to }}
                                    @endif:
                                </span>
                                <strong>{{ date('H:i', strtotime($hour->open_time)) }} - {{ date('H:i', strtotime($hour->close_time)) }}</strong>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
            
            <div class="footer-col">
                <h4>Halaman Utama</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('isuzu') }}">Produk Isuzu</a></li>
                    <li><a href="{{ route('daihatsu') }}">Produk Daihatsu</a></li>
                    <li><a href="{{ route('purna-jual') }}">Layanan Purna Jual</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Info Terkini</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('promotion') }}">Promo Terbaru</a></li>
                    <li><a href="{{ route('blogs') }}">Artikel & Blogs</a></li>
                    <li><a href="{{ route('career') }}">Karir Lowongan</a></li>
                    <li><a href="{{ route('branch') }}">Cabang Terdekat</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>ARMADA MOBIL</h4>
                @php
                    $footerProfile = \App\Models\Profile::first();
                @endphp
                <p>{{ $footerProfile?->short_description ?? 'Armada Mobil adalah dealer resmi otomotif terpercaya untuk penjualan dan purna jual kendaraan Isuzu dan Daihatsu dengan kualitas layanan bintang lima.' }}</p>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Armada Mobil. All rights reserved.</p>
            <p>Jaringan Terpercaya Seluruh Indonesia.</p>
        </div>
    </footer>

    <!-- JS Scripts -->
    <script>
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            document.getElementById('nav-links').classList.toggle('active');
            this.classList.toggle('active');
        });
    </script>
    @yield('scripts')
</body>
</html>
