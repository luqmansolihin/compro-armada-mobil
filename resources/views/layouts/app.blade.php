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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
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
                <li class="search-nav-item">
                    <button id="globalSearchBtn" aria-label="Search" style="background: none; border: none; color: var(--color-text); font-size: 1.1rem; cursor: pointer; padding: 0.5rem; display: flex; align-items: center; justify-content: center; transition: color 0.2s ease;" onmouseover="this.style.color='var(--color-primary)';" onmouseout="this.style.color='var(--color-text)';">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </li>
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
                        $phones = isset($contacts) ? $contacts->where('type', 'Phone') : collect();
                        $emails = isset($contacts) ? $contacts->where('type', 'Email') : collect();
                        
                        $was = isset($contacts) ? $contacts->where('type', 'WhatsApp') : collect();
                        $igs = isset($contacts) ? $contacts->where('type', 'Instagram') : collect();
                        $fbs = isset($contacts) ? $contacts->where('type', 'Facebook') : collect();
                        $twitters = isset($contacts) ? $contacts->where('type', 'Twitter') : collect();
                        $youtubes = isset($contacts) ? $contacts->where('type', 'YouTube') : collect();
                        $tiktoks = isset($contacts) ? $contacts->where('type', 'TikTok') : collect();
                        
                        $globalHours = \App\Models\OperationalHour::all();
                    @endphp

                    @if($phones->isNotEmpty())
                        @foreach($phones as $p)
                            <li><i class="fa-solid fa-phone"></i> {{ $p->contact }}</li>
                        @endforeach
                    @else
                        <li><i class="fa-solid fa-phone"></i> +62 21-1234567</li>
                    @endif

                    @if($emails->isNotEmpty())
                        @foreach($emails as $e)
                            <li><i class="fa-solid fa-envelope"></i> <a href="mailto:{{ $e->contact }}" style="color: inherit; text-decoration: none;">{{ $e->contact }}</a></li>
                        @endforeach
                    @else
                        <li><i class="fa-solid fa-envelope"></i> info@armada-mobil.co.id</li>
                    @endif
                </ul>

                {{-- Horizontal Social Media Icons --}}
                <div style="display: flex; gap: 0.5rem; margin-top: 1rem; flex-wrap: wrap; margin-bottom: 1.5rem;">
                    @if($was->isNotEmpty())
                        @foreach($was as $w)
                            @php $wClean = str_replace(['+', '-', ' ', '@'], '', $w->contact); @endphp
                            <a href="https://wa.me/{{ $wClean }}" target="_blank" style="display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 50%; background-color: rgba(255,255,255,0.08); color: white; transition: background-color 0.2s ease, transform 0.2s ease;" onmouseover="this.style.backgroundColor='#25d366'; this.style.transform='scale(1.1)';" onmouseout="this.style.backgroundColor='rgba(255,255,255,0.08)'; this.style.transform='scale(1)';" title="Hubungi WhatsApp">
                                <i class="fa-brands fa-whatsapp" style="font-size: 0.95rem;"></i>
                            </a>
                        @endforeach
                    @endif

                    @if($igs->isNotEmpty())
                        @foreach($igs as $i)
                            @php $igHandle = ltrim($i->contact, '@'); @endphp
                            <a href="https://instagram.com/{{ $igHandle }}" target="_blank" style="display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 50%; background-color: rgba(255,255,255,0.08); color: white; transition: background-color 0.2s ease, transform 0.2s ease;" onmouseover="this.style.backgroundColor='#e1306c'; this.style.transform='scale(1.1)';" onmouseout="this.style.backgroundColor='rgba(255,255,255,0.08)'; this.style.transform='scale(1)';" title="Instagram Resmi">
                                <i class="fa-brands fa-instagram" style="font-size: 0.95rem;"></i>
                            </a>
                        @endforeach
                    @endif

                    @foreach($fbs as $fb)
                        @php $fbUrl = filter_var($fb->contact, FILTER_VALIDATE_URL) ? $fb->contact : 'https://facebook.com/' . $fb->contact; @endphp
                        <a href="{{ $fbUrl }}" target="_blank" style="display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 50%; background-color: rgba(255,255,255,0.08); color: white; transition: background-color 0.2s ease, transform 0.2s ease;" onmouseover="this.style.backgroundColor='#1877f2'; this.style.transform='scale(1.1)';" onmouseout="this.style.backgroundColor='rgba(255,255,255,0.08)'; this.style.transform='scale(1)';" title="Facebook Resmi">
                            <i class="fa-brands fa-facebook-f" style="font-size: 0.9rem;"></i>
                        </a>
                    @endforeach

                    @foreach($twitters as $t)
                        @php $tUrl = filter_var($t->contact, FILTER_VALIDATE_URL) ? $t->contact : 'https://twitter.com/' . ltrim($t->contact, '@'); @endphp
                        <a href="{{ $tUrl }}" target="_blank" style="display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 50%; background-color: rgba(255,255,255,0.08); color: white; transition: background-color 0.2s ease, transform 0.2s ease;" onmouseover="this.style.backgroundColor='#000000'; this.style.transform='scale(1.1)';" onmouseout="this.style.backgroundColor='rgba(255,255,255,0.08)'; this.style.transform='scale(1)';" title="Twitter / X Resmi">
                            <i class="fa-brands fa-x-twitter" style="font-size: 0.85rem;"></i>
                        </a>
                    @endforeach

                    @foreach($youtubes as $yt)
                        @php $ytUrl = filter_var($yt->contact, FILTER_VALIDATE_URL) ? $yt->contact : 'https://youtube.com/' . $yt->contact; @endphp
                        <a href="{{ $ytUrl }}" target="_blank" style="display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 50%; background-color: rgba(255,255,255,0.08); color: white; transition: background-color 0.2s ease, transform 0.2s ease;" onmouseover="this.style.backgroundColor='#ff0000'; this.style.transform='scale(1.1)';" onmouseout="this.style.backgroundColor='rgba(255,255,255,0.08)'; this.style.transform='scale(1)';" title="YouTube Resmi">
                            <i class="fa-brands fa-youtube" style="font-size: 0.9rem;"></i>
                        </a>
                    @endforeach

                    @foreach($tiktoks as $tt)
                        @php $ttUrl = filter_var($tt->contact, FILTER_VALIDATE_URL) ? $tt->contact : 'https://tiktok.com/@' . ltrim($tt->contact, '@'); @endphp
                        <a href="{{ $ttUrl }}" target="_blank" style="display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 50%; background-color: rgba(255,255,255,0.08); color: white; transition: background-color 0.2s ease, transform 0.2s ease;" onmouseover="this.style.backgroundColor='#010101'; this.style.transform='scale(1.1)';" onmouseout="this.style.backgroundColor='rgba(255,255,255,0.08)'; this.style.transform='scale(1)';" title="TikTok Resmi">
                            <i class="fa-brands fa-tiktok" style="font-size: 0.9rem;"></i>
                        </a>
                    @endforeach
                </div>

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

    <!-- Back to Top Button -->
    <button id="backToTopBtn" title="Kembali ke atas" style="position: fixed; bottom: 2.5rem; right: 2.5rem; width: 44px; height: 44px; border-radius: 50%; background-color: var(--color-primary); color: white; border: none; outline: none; cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; box-shadow: 0 4px 12px rgba(220, 38, 38, 0.35); opacity: 0; visibility: hidden; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); z-index: 9999;" onmouseover="this.style.transform='scale(1.1)'; this.style.backgroundColor='#b91c1c'; this.style.boxShadow='0 6px 16px rgba(220, 38, 38, 0.5)';" onmouseout="this.style.transform='scale(1)'; this.style.backgroundColor='var(--color-primary)'; this.style.boxShadow='0 4px 12px rgba(220, 38, 38, 0.35)';">
        <i class="fa-solid fa-arrow-up"></i>
    </button>

    <!-- Global Search Overlay -->
    <div id="searchOverlay" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(15, 23, 42, 0.95); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); z-index: 10000; opacity: 0; visibility: hidden; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); display: flex; flex-direction: column; align-items: center; padding: 6rem 2rem 2rem 2rem; overflow-y: auto;">
        <!-- Close button -->
        <button id="closeSearchBtn" aria-label="Close search" style="position: absolute; top: 2rem; right: 2rem; background: rgba(255, 255, 255, 0.08); border: none; color: white; width: 44px; height: 44px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; cursor: pointer; transition: all 0.2s ease;" onmouseover="this.style.backgroundColor='rgba(255,255,255,0.15)'; this.style.transform='scale(1.05)';" onmouseout="this.style.backgroundColor='rgba(255,255,255,0.08)'; this.style.transform='scale(1)';">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div style="width: 100%; max-width: 750px; display: flex; flex-direction: column; gap: 2rem;">
            <!-- Title -->
            <div style="text-align: center; color: white; margin-bottom: 0.5rem;">
                <h2 style="font-size: 2rem; font-weight: 700; margin-bottom: 0.5rem;">Cari di Armada Mobil</h2>
                <p style="color: #94a3b8; font-size: 1rem;">Temukan unit kendaraan, promo, cabang, berita, atau info karir teraktif.</p>
            </div>

            <!-- Input wrapper -->
            <div style="position: relative; width: 100%;">
                <i class="fa-solid fa-magnifying-glass" style="position: absolute; left: 1.5rem; top: 50%; transform: translateY(-50%); color: #94a3b8; font-size: 1.25rem;"></i>
                <input type="text" id="searchInput" placeholder="Ketik kata kunci pencarian..." autocomplete="off" style="width: 100%; padding: 1.25rem 1.5rem 1.25rem 3.5rem; font-size: 1.15rem; font-family: inherit; border-radius: 50px; border: 2px solid rgba(255, 255, 255, 0.15); background-color: rgba(255, 255, 255, 0.05); color: white; outline: none; transition: all 0.3s ease; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.25);" onfocus="this.style.borderColor='var(--color-primary)'; this.style.backgroundColor='rgba(255, 255, 255, 0.08)';" onblur="this.style.borderColor='rgba(255, 255, 255, 0.15)'; this.style.backgroundColor='rgba(255, 255, 255, 0.05)';">
                <!-- Clear Button -->
                <button id="clearSearchBtn" style="position: absolute; right: 1.5rem; top: 50%; transform: translateY(-50%); background: none; border: none; color: #94a3b8; font-size: 1.1rem; cursor: pointer; display: none; padding: 0.25rem;">
                    <i class="fa-solid fa-circle-xmark"></i>
                </button>
            </div>

            <!-- Loading Spinner -->
            <div id="searchSpinner" style="display: none; justify-content: center; align-items: center; padding: 2rem;">
                <i class="fa-solid fa-circle-notch fa-spin" style="color: var(--color-primary); font-size: 2rem;"></i>
            </div>

            <!-- Results container -->
            <div id="searchResults" class="custom-search-scrollbar" style="display: flex; flex-direction: column; gap: 1.5rem; max-height: 60vh; overflow-y: auto; padding-right: 0.5rem;">
                <!-- Results will be injected dynamically -->
            </div>
        </div>
    </div>

    <style>
        .custom-search-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        .custom-search-scrollbar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.02);
            border-radius: 10px;
        }
        .custom-search-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 10px;
        }
        .custom-search-scrollbar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.25);
        }
    </style>

    <!-- JS Scripts -->
    <script>
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            document.getElementById('nav-links').classList.toggle('active');
            this.classList.toggle('active');
        });

        // Back to Top Button Scroll & Click Handler
        const backToTopBtn = document.getElementById('backToTopBtn');
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopBtn.style.opacity = '1';
                backToTopBtn.style.visibility = 'visible';
            } else {
                backToTopBtn.style.opacity = '0';
                backToTopBtn.style.visibility = 'hidden';
            }
        });
        
        backToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Global Search Dialog
        const searchOverlay = document.getElementById('searchOverlay');
        const globalSearchBtn = document.getElementById('globalSearchBtn');
        const closeSearchBtn = document.getElementById('closeSearchBtn');
        const searchInput = document.getElementById('searchInput');
        const clearSearchBtn = document.getElementById('clearSearchBtn');
        const searchSpinner = document.getElementById('searchSpinner');
        const searchResults = document.getElementById('searchResults');
        
        let searchTimeout = null;

        // Open search
        globalSearchBtn.addEventListener('click', function() {
            searchOverlay.style.opacity = '1';
            searchOverlay.style.visibility = 'visible';
            document.body.style.overflow = 'hidden'; // prevent background scrolling
            setTimeout(() => searchInput.focus(), 150);
        });

        // Close search
        function closeSearch() {
            searchOverlay.style.opacity = '0';
            searchOverlay.style.visibility = 'hidden';
            document.body.style.overflow = '';
            searchInput.value = '';
            searchResults.innerHTML = '';
            clearSearchBtn.style.display = 'none';
        }

        closeSearchBtn.addEventListener('click', closeSearch);

        // Close on ESC key
        window.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && searchOverlay.style.visibility === 'visible') {
                closeSearch();
            }
        });

        // Close on clicking outside search box content
        searchOverlay.addEventListener('click', function(e) {
            if (e.target === searchOverlay) {
                closeSearch();
            }
        });

        // Clear input
        clearSearchBtn.addEventListener('click', function() {
            searchInput.value = '';
            searchResults.innerHTML = '';
            clearSearchBtn.style.display = 'none';
            searchInput.focus();
        });

        // Search typing listener
        searchInput.addEventListener('input', function() {
            const query = this.value.trim();
            
            if (query.length > 0) {
                clearSearchBtn.style.display = 'block';
            } else {
                clearSearchBtn.style.display = 'none';
            }

            if (query.length < 2) {
                searchResults.innerHTML = '';
                return;
            }

            // Debounce search requests
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                performSearch(query);
            }, 300);
        });

        function performSearch(query) {
            searchSpinner.style.display = 'flex';
            searchResults.innerHTML = '';

            fetch(`/search/api?q=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    searchSpinner.style.display = 'none';
                    renderResults(data, query);
                })
                .catch(error => {
                    console.error('Error during search:', error);
                    searchSpinner.style.display = 'none';
                    searchResults.innerHTML = `<div style="color: #ef4444; text-align: center; padding: 2rem;">Terjadi kesalahan saat memproses pencarian.</div>`;
                });
        }

        function renderResults(data, query) {
            let html = '';
            let hasResults = false;

            const categories = [
                { key: 'products', name: 'Produk Kendaraan', icon: 'fa-car' },
                { key: 'branches', name: 'Cabang & Bengkel', icon: 'fa-store' },
                { key: 'promotions', name: 'Promo Terbaru', icon: 'fa-tags' },
                { key: 'blogs', name: 'Artikel & Blogs', icon: 'fa-newspaper' },
                { key: 'careers', name: 'Lowongan Karir', icon: 'fa-briefcase' }
            ];

            categories.forEach(cat => {
                const items = data[cat.key];
                if (items && items.length > 0) {
                    hasResults = true;
                    html += `
                        <div style="background-color: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 12px; padding: 1.25rem;">
                            <h4 style="color: var(--color-primary); font-size: 0.95rem; font-weight: 700; text-transform: uppercase; margin-bottom: 0.75rem; display: flex; align-items: center; gap: 0.5rem; letter-spacing: 0.5px; border-bottom: 1px solid rgba(255, 255, 255, 0.05); padding-bottom: 0.5rem;">
                                <i class="fa-solid ${cat.icon}"></i> ${cat.name}
                            </h4>
                            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                    `;

                    items.forEach(item => {
                        const title = item.title || item.name;
                        const sub = item.address ? item.address : '';
                        const img = item.image_url ? `<img src="${item.image_url}" style="width: 40px; height: 40px; object-fit: cover; border-radius: 6px; border: 1px solid rgba(255, 255, 255, 0.1);" alt="">` : '';

                        html += `
                            <a href="${item.url}" style="display: flex; align-items: center; gap: 1rem; padding: 0.65rem; border-radius: 8px; text-decoration: none; color: white; transition: all 0.2s ease;" onmouseover="this.style.backgroundColor='rgba(255, 255, 255, 0.05)';" onmouseout="this.style.backgroundColor='transparent';">
                                ${img}
                                <div style="flex: 1;">
                                    <div style="font-weight: 600; font-size: 0.95rem; line-height: 1.4;">${title}</div>
                                    ${sub ? `<div style="font-size: 0.8rem; color: #94a3b8; margin-top: 0.15rem;">${sub}</div>` : ''}
                                </div>
                                <i class="fa-solid fa-chevron-right" style="font-size: 0.75rem; color: rgba(255, 255, 255, 0.3);"></i>
                            </a>
                        `;
                    });

                    html += `
                            </div>
                        </div>
                    `;
                }
            });

            if (!hasResults) {
                html = `
                    <div style="text-align: center; padding: 4rem 2rem; color: #94a3b8;">
                        <i class="fa-solid fa-face-frown" style="font-size: 3rem; color: rgba(255, 255, 255, 0.1); margin-bottom: 1rem; display: block;"></i>
                        <p style="font-size: 1.1rem; font-weight: 500;">Pencarian untuk "${query}" tidak ditemukan</p>
                        <p style="font-size: 0.9rem; color: #64748b; margin-top: 0.25rem;">Coba masukkan kata kunci yang berbeda.</p>
                    </div>
                `;
            }

            searchResults.innerHTML = html;
        }
    </script>
    @yield('scripts')
</body>
</html>
