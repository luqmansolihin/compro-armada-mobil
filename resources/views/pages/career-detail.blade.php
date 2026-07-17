@extends('layouts.app')

@section('title', $career->name . ' - Karir - Armada Mobil')

@section('meta_description', $career->description)
@section('meta_keywords', 'lowongan kerja, karir, ' . strtolower($career->name) . ', armada mobil')

@section('content')
    <article class="detail-container">
        <div style="margin-bottom: 2rem;">
            <a href="{{ route('career') }}" class="text-btn" style="margin-bottom: 1.5rem; display: inline-flex; align-items: center; gap: 0.5rem;">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Lowongan Kerja
            </a>
            
            <div style="display: flex; gap: 0.5rem; flex-wrap: wrap; margin-bottom: 0.75rem;">
                <span class="career-badge" style="background-color: rgba(37, 99, 235, 0.1); color: #2563eb; display: inline-flex; align-items: center; gap: 0.25rem;">
                    <i class="fa-solid fa-map-pin"></i> 
                    @foreach($career->cities as $city)
                        {{ $city->name }}{{ !$loop->last ? ', ' : '' }}
                    @endforeach
                </span>
                <span class="career-age-badge" style="background-color: #f1f5f9; color: var(--color-text-muted); border: 1px solid var(--color-border); font-size: 0.75rem; padding: 0.25rem 0.6rem; border-radius: 4px; font-weight: 600; display: inline-flex; align-items: center; gap: 0.25rem;">
                    <i class="fa-regular fa-user"></i> Usia {{ $career->minimal_age }} - {{ $career->maximal_age }} Tahun
                </span>
                <span class="career-age-badge" style="background-color: rgba(220, 38, 38, 0.05); color: var(--color-primary); border: 1px solid rgba(220, 38, 38, 0.1); font-size: 0.75rem; padding: 0.25rem 0.6rem; border-radius: 4px; font-weight: 600; display: inline-flex; align-items: center; gap: 0.25rem;">
                    <i class="fa-regular fa-calendar-check"></i> Batas Registrasi: {{ $career->registration_to->format('d M Y') }}
                </span>
            </div>
            
            <h1 style="font-size: 2.75rem; color: var(--color-secondary); line-height: 1.2; margin-bottom: 1rem;">
                {{ $career->name }}
            </h1>
        </div>

        <div class="detail-body">
            <h2 style="font-size: 1.5rem; margin-bottom: 1rem; border-bottom: 2px solid var(--color-border); padding-bottom: 0.5rem; color: var(--color-secondary);">
                Deskripsi Pekerjaan
            </h2>
            <div style="font-size: 1.05rem; line-height: 1.7; color: var(--color-text); margin-bottom: 2.5rem;">
                {{ $career->description }}
            </div>
            
            <h2 style="font-size: 1.5rem; margin-bottom: 1rem; border-bottom: 2px solid var(--color-border); padding-bottom: 0.5rem; color: var(--color-secondary);">
                Persyaratan Pekerjaan
            </h2>
            <div style="font-size: 1.05rem; line-height: 1.8; color: var(--color-text); margin-bottom: 3rem; padding-left: 1.25rem;">
                {!! $career->requirement !!}
            </div>

            <!-- Share Section -->
            @include('components.share-buttons', ['title' => 'Lowongan Kerja ' . $career->name])

            <!-- Send CV Section -->
            <div style="margin-top: 3rem; padding: 2rem; background-color: #f1f5f9; border-radius: var(--radius-md); border-left: 5px solid var(--color-primary); display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1.5rem;">
                <div>
                    <h3 style="font-size: 1.25rem; margin-bottom: 0.5rem; color: var(--color-secondary);">Tertarik Bergabung Bersama Kami?</h3>
                    <p style="font-size: 0.95rem; color: var(--color-text-muted); margin: 0;">Kirimkan CV terbaru dan surat lamaran Anda melalui email rekrutmen kami.</p>
                </div>
                
                @php
                    $emailContact = $career->recruiter_email ?: ($contacts->where('type', 'Email')->first()?->contact ?? 'recruitment@armada-mobil.co.id');
                @endphp
                <a href="mailto:{{ $emailContact }}?subject=Lamaran%20Pekerjaan%20-%20{{ urlencode($career->name) }}" class="btn-primary">
                    <i class="fa-regular fa-envelope"></i> Kirim CV Sekarang
                </a>
            </div>
        </div>
    </article>
@endsection
