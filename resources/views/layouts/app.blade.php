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
    </script>
    @yield('scripts')
</body>
</html>
