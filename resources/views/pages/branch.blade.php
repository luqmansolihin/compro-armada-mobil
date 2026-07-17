@extends('layouts.app')

@section('title', 'Cabang Dealer & Bengkel Kami - Armada Mobil')

@section('meta_description', 'Temukan alamat lengkap, peta Google Maps, jam operasional, dan nomor kontak cabang resmi dealer dan bengkel Armada Mobil terdekat di kota Anda.')
@section('meta_keywords', 'cabang armada mobil, alamat dealer isuzu, alamat dealer daihatsu, bengkel resmi terdekat, lokasi showroom mobil')

@section('content')
    <!-- Header Hero -->
    <section class="about-hero" style="background-image: url('{{ asset('storage/uploads/showroom_cover_banner.png') }}'); background-position: center 40%;">
        <div class="about-hero-content">
            <h1 style="color: var(--color-text-light); text-shadow: 0 2px 4px rgba(0,0,0,0.6);">OUR BRANCH</h1>
            <p style="color: var(--color-text-light); font-size: 1.2rem; text-shadow: 0 1px 2px rgba(0,0,0,0.6);">Jaringan Dealer Resmi & Bengkel Perawatan Kami Tersebar di Seluruh Kota Besar.</p>
        </div>
    </section>

    <!-- Branch Listings -->
    <section class="section">
        <div class="section-header">
            <h2>Kunjungi Cabang Terdekat</h2>
            <p>Datang ke dealer kami untuk konsultasi unit baru, test drive, atau lakukan servis berkala kendaraan Anda.</p>
        </div>

        <!-- Brand Filter Tabs -->
        <div class="tabs-container" style="display: flex; justify-content: center; gap: 1rem; margin-bottom: 3rem; flex-wrap: wrap;">
            <button class="tab-button active" onclick="filterBranch('all')" style="padding: 0.75rem 1.75rem; font-weight: 600; font-family: inherit; font-size: 1rem; border: 2px solid var(--color-primary); border-radius: 50px; background-color: var(--color-primary); color: white; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
                Semua Cabang
            </button>
            <button class="tab-button" onclick="filterBranch('daihatsu')" style="padding: 0.75rem 1.75rem; font-weight: 600; font-family: inherit; font-size: 1rem; border: 2px solid var(--color-border); border-radius: 50px; background-color: transparent; color: var(--color-text); cursor: pointer; transition: all 0.3s ease;">
                Cabang Daihatsu
            </button>
            <button class="tab-button" onclick="filterBranch('isuzu')" style="padding: 0.75rem 1.75rem; font-weight: 600; font-family: inherit; font-size: 1rem; border: 2px solid var(--color-border); border-radius: 50px; background-color: transparent; color: var(--color-text); cursor: pointer; transition: all 0.3s ease;">
                Cabang Isuzu
            </button>
        </div>

        <div class="grid-2" style="align-items: stretch;">
            @forelse($outlets as $outlet)
                <div class="branch-col" data-brand="{{ $outlet->brand?->name ?? '' }}" style="transition: all 0.3s ease; width: 100%;">
                    <div class="branch-card">
                        <!-- Google Maps Embed -->
                        <div class="branch-map">
                            {!! $outlet->url_embed_address ? '<iframe src="' . $outlet->url_embed_address . '" allowfullscreen="" loading="lazy"></iframe>' : '<div style="background-color:var(--color-border);height:100%;display:flex;align-items:center;justify-content:center;color:var(--color-text-muted);">No Map Available</div>' !!}
                        </div>
                        
                        <div class="branch-content">
                            <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 0.5rem; margin-bottom: 0.75rem;">
                                <h3 style="margin-bottom: 0;">{{ $outlet->name }}</h3>
                                @if($outlet->brand)
                                    <span class="career-badge" style="background-color: {{ $outlet->brand->name == 'daihatsu' ? '#2563eb' : 'var(--color-primary)' }}; color: white; font-size: 0.7rem; font-weight: 700; padding: 0.25rem 0.6rem; border-radius: 4px; text-transform: uppercase;">
                                        {{ $outlet->brand->name }}
                                    </span>
                                @else
                                    <span class="career-badge" style="background-color: #64748b; color: white; font-size: 0.7rem; font-weight: 700; padding: 0.25rem 0.6rem; border-radius: 4px; text-transform: uppercase;">
                                        Dual Brand
                                    </span>
                                @endif
                            </div>
                            
                            <ul class="branch-info-list">
                                <li>
                                    <i class="fa-solid fa-location-dot"></i>
                                    <span>{{ $outlet->address }}</span>
                                </li>
                                <li>
                                    <i class="fa-solid fa-phone"></i>
                                    <span>{{ $outlet->phone }}</span>
                                </li>
                                @if($outlet->fax)
                                    <li>
                                        <i class="fa-solid fa-print"></i>
                                        <span>Fax: {{ $outlet->fax }}</span>
                                    </li>
                                @endif
                                <li>
                                    <i class="fa-solid fa-envelope"></i>
                                    <span>{{ $outlet->email }}</span>
                                </li>
                            </ul>

                            <!-- Operational Hours -->
                            <div class="branch-hours">
                                <h4><i class="fa-regular fa-clock" style="color: var(--color-primary); margin-right: 0.25rem;"></i> Jam Operasional</h4>
                                <ul>
                                    @forelse($outlet->operationalHours as $hour)
                                        <li>
                                            <span>
                                                @if(strcasecmp($hour->day_from, $hour->day_to) === 0)
                                                    {{ $hour->day_from }}
                                                @else
                                                    {{ $hour->day_from }} - {{ $hour->day_to }}
                                                @endif
                                            </span>
                                            <strong>{{ date('H:i', strtotime($hour->open_time)) }} - {{ date('H:i', strtotime($hour->close_time)) }}</strong>
                                        </li>
                                    @empty
                                        <li>
                                            <span>Senin - Jumat</span>
                                            <strong>08:00 - 17:00</strong>
                                        </li>
                                    @endforelse
                                </ul>
                            </div>

                            <!-- Services Tags -->
                            <div style="margin-top: 1rem;">
                                <h4 style="font-size: 0.95rem; margin-bottom: 0.5rem;"><i class="fa-solid fa-gears" style="color: var(--color-primary); margin-right: 0.25rem;"></i> Layanan Tersedia</h4>
                                <div class="tag-list">
                                    @forelse($outlet->services as $service)
                                        <span class="tag"><i class="fa-solid {{ $service->icon }}" style="margin-right: 0.25rem;"></i> {{ $service->title }}</span>
                                    @empty
                                        <span class="tag">Showroom 3S (Sales, Service, Spareparts)</span>
                                    @endforelse
                                </div>
                            </div>

                            <div class="branch-actions">
                                <a href="{{ $outlet->url_address }}" target="_blank" class="btn-primary">
                                    <i class="fa-solid fa-route"></i> Petunjuk Arah
                                </a>
                                <a href="https://wa.me/{{ str_replace(['+', '-', ' '], '', $outlet->whatsapp ?: ($contacts->where('type', 'WhatsApp')->first()?->contact ?? '6281234567890')) }}?text=Halo%20Armada%20Mobil,%20saya%20ingin%20bertanya%20mengenai%20layanan%20di%20{{ urlencode($outlet->name) }}" target="_blank" class="btn-primary btn-whatsapp">
                                    <i class="fa-brands fa-whatsapp"></i> Hubungi WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="card" style="grid-column: span 2; text-align: center; padding: 4rem; color: var(--color-text-muted);">
                    <i class="fa-solid fa-store-slash" style="font-size: 3rem; margin-bottom: 1rem; color: var(--color-border);"></i>
                    <p>Informasi cabang sedang dimuat. Silakan kembali lagi nanti.</p>
                </div>
            @endforelse
            
            <!-- Empty Search State -->
            <div id="empty-branch-state" class="card" style="grid-column: span 2; text-align: center; padding: 4rem; color: var(--color-text-muted); display: none;">
                <i class="fa-solid fa-store-slash" style="font-size: 3rem; margin-bottom: 1rem; color: var(--color-border);"></i>
                <p>Tidak ada cabang yang terdaftar untuk merek ini.</p>
            </div>
        </div>
    </section>

    <script>
        function filterBranch(brand) {
            // Update active button styles
            const buttons = document.querySelectorAll('.tab-button');
            buttons.forEach(btn => {
                btn.style.backgroundColor = 'transparent';
                btn.style.color = 'var(--color-text)';
                btn.style.borderColor = 'var(--color-border)';
                btn.classList.remove('active');
            });

            const activeBtn = event.currentTarget;
            activeBtn.style.backgroundColor = 'var(--color-primary)';
            activeBtn.style.color = 'white';
            activeBtn.style.borderColor = 'var(--color-primary)';
            activeBtn.classList.add('active');

            // Filter branch cards
            const cards = document.querySelectorAll('.branch-col');
            let visibleCount = 0;
            cards.forEach(card => {
                const cardBrand = card.getAttribute('data-brand');
                if (brand === 'all') {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    if (cardBrand === brand || cardBrand === '') {
                        card.style.display = 'block';
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                }
            });

            // Show empty state if no branches are found
            const emptyState = document.getElementById('empty-branch-state');
            if (visibleCount === 0) {
                if (emptyState) emptyState.style.display = 'block';
            } else {
                if (emptyState) emptyState.style.display = 'none';
            }
        }
    </script>
@endsection
