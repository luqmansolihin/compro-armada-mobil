@extends('layouts.app')

@section('title', 'Karir & Lowongan Kerja - Armada Mobil')

@section('meta_description', 'Bergabunglah bersama keluarga besar Armada Mobil. Temukan informasi lowongan kerja terbaru, karir otomotif, sales executive, mekanik resmi, dan staff administrasi.')
@section('meta_keywords', 'lowongan kerja otomotif, loker armada mobil, karir sales mobil, lowongan mekanik isuzu, loker daihatsu')

@section('content')
    <!-- Banner Header -->
    <section class="about-hero" style="background-image: url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=1600')">
        <div class="about-hero-content">
            <h1 style="color: var(--color-text-light); text-shadow: 0 2px 4px rgba(0,0,0,0.65);">CAREER PLACEMENT</h1>
            <p style="color: var(--color-text-light); font-size: 1.2rem; text-shadow: 0 1px 2px rgba(0,0,0,0.65);">Bergabunglah Bersama Tim Profesional Armada Mobil untuk Mengembangkan Karir Anda.</p>
        </div>
    </section>

    <!-- Career Listings -->
    <section class="section">
        <div class="section-header">
            <h2>Lowongan Pekerjaan Aktif</h2>
            <p>Temukan posisi pekerjaan yang sesuai dengan minat dan kualifikasi Anda di kantor cabang kami.</p>
        </div>

        <div style="max-width: 900px; margin: 0 auto; display: flex; flex-direction: column; gap: 2rem;">
            @forelse($careers as $career)
                <div class="career-card">
                    <div class="career-card-header">
                        <div>
                            <h3 style="font-size: 1.6rem; color: var(--color-secondary); margin-bottom: 0.5rem;">{{ $career->name }}</h3>
                            <div class="career-meta-box">
                                <span class="career-badge">
                                    <i class="fa-solid fa-map-pin"></i> 
                                    @foreach($career->cities as $index => $city)
                                        {{ $city->name }}{{ !$loop->last ? ', ' : '' }}
                                    @endforeach
                                </span>
                                <span class="career-age-badge">
                                    <i class="fa-regular fa-user"></i> Usia {{ $career->minimal_age }} - {{ $career->maximal_age }} Tahun
                                </span>
                                <span class="career-age-badge" style="background-color: rgba(220, 38, 38, 0.05); color: var(--color-primary); border: 1px solid rgba(220, 38, 38, 0.1);">
                                    <i class="fa-regular fa-calendar-check"></i> Registrasi s.d. {{ $career->registration_to->format('d M Y') }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="career-desc">
                        <p style="font-weight: 600; color: var(--color-secondary); margin-bottom: 0.5rem;">Deskripsi Pekerjaan:</p>
                        <p style="margin-bottom: 1.5rem; line-height: 1.6;">{{ $career->description }}</p>
                        
                        <p style="font-weight: 600; color: var(--color-secondary); margin-bottom: 0.5rem;">Persyaratan:</p>
                        <div style="line-height: 1.6; margin-bottom: 2rem; padding-left: 1.25rem;">
                            {!! $career->requirement !!}
                        </div>
                    </div>

                    <div style="border-top: 1px solid var(--color-border); padding-top: 1.5rem; display: flex; justify-content: flex-end;">
                        @php
                            $emailContact = $contacts->where('type', 'Email')->first()?->contact ?? 'recruitment@armada-mobil.co.id';
                        @endphp
                        <a href="mailto:{{ $emailContact }}?subject=Lamaran%20Pekerjaan%20-%20{{ urlencode($career->name) }}" class="btn-primary">
                            <i class="fa-regular fa-envelope"></i> Kirim CV Sekarang
                        </a>
                    </div>
                </div>
            @empty
                <div class="card" style="text-align: center; padding: 4rem; color: var(--color-text-muted);">
                    <i class="fa-solid fa-briefcase" style="font-size: 3rem; margin-bottom: 1rem; color: var(--color-border);"></i>
                    <p>Saat ini belum ada lowongan pekerjaan yang dibuka. Tetap pantau halaman karir kami untuk kesempatan masa depan.</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection
