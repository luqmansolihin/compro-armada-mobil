@extends('layouts.app')

@section('title', 'Cabang Dealer & Bengkel Kami - Armada Mobil')

@section('meta_description', 'Temukan alamat lengkap, peta Google Maps, jam operasional, dan nomor kontak cabang resmi dealer dan bengkel Armada Mobil terdekat di kota Anda.')
@section('meta_keywords', 'cabang armada mobil, alamat dealer isuzu, alamat dealer daihatsu, bengkel resmi terdekat, lokasi showroom mobil')

@section('content')
    <!-- Header Hero -->
    <section class="about-hero" style="background-image: url('https://images.unsplash.com/photo-1563720223185-11003d516935?auto=format&fit=crop&q=80&w=1600')">
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

        <div class="grid-2">
            @forelse($outlets as $outlet)
                <div class="branch-card">
                    <!-- Google Maps Embed -->
                    <div class="branch-map">
                        {!! $outlet->url_embed_address ? '<iframe src="' . $outlet->url_embed_address . '" allowfullscreen="" loading="lazy"></iframe>' : '<div style="background-color:var(--color-border);height:100%;display:flex;align-items:center;justify-content:center;color:var(--color-text-muted);">No Map Available</div>' !!}
                    </div>
                    
                    <div class="branch-content">
                        <h3>{{ $outlet->name }}</h3>
                        
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
            @empty
                <div class="card" style="grid-column: span 2; text-align: center; padding: 4rem; color: var(--color-text-muted);">
                    <i class="fa-solid fa-store-slash" style="font-size: 3rem; margin-bottom: 1rem; color: var(--color-border);"></i>
                    <p>Informasi cabang sedang dimuat. Silakan kembali lagi nanti.</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection
