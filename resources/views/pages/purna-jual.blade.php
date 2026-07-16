@extends('layouts.app')

@section('title', 'Layanan Purna Jual & Servis Resmi - Armada Mobil')

@section('meta_description', 'Layanan purna jual resmi Isuzu & Daihatsu di Armada Mobil. Layanan service berkala, booking online, mobile service car, dan jaminan suku cadang resmi.')
@section('meta_keywords', 'purna jual armada mobil, service isuzu, service daihatsu, booking service online, mobile service car, suku cadang asli, sparepart resmi')

@section('content')
    <!-- Hero Banner -->
    <section class="about-hero" style="background-image: url('https://images.unsplash.com/photo-1486006920555-c77dce18193b?auto=format&fit=crop&q=80&w=1600')">
        <div class="about-hero-content">
            <h1 style="color: var(--color-text-light); text-shadow: 0 2px 4px rgba(0,0,0,0.65);">PURNA JUAL</h1>
            <p style="color: var(--color-text-light); font-size: 1.2rem; text-shadow: 0 1px 2px rgba(0,0,0,0.65);">Kualitas Bengkel Resmi Bintang Lima untuk Perawatan Prima Kendaraan Anda.</p>
        </div>
    </section>

    <!-- Services Overview -->
    <section class="section">
        <div class="section-header">
            <h2>Layanan Bengkel Resmi</h2>
            <p>Jaringan bengkel resmi kami dilengkapi dengan mekanik bersertifikat dan suku cadang asli original.</p>
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
                    <div class="service-icon-wrapper"><i class="fa-solid fa-screwdriver-wrench"></i></div>
                    <h3>Perawatan Berkala</h3>
                    <p>Servis berkala berkala untuk menjamin performa optimal mobil Anda.</p>
                </div>
            @endforelse
        </div>
    </section>

    <!-- Aftersales Programs Articles -->
    <section class="section" style="background-color: #f1f5f9; max-width: 100%;">
        <div style="max-width: 1280px; margin: 0 auto;">
            <div class="section-header">
                <h2>Program Purna Jual</h2>
                <p>Nikmati jaminan rasa tenang berkendara bersama aneka program perlindungan konsumen kami.</p>
            </div>
            
            <div class="grid-2">
                @forelse($aftersales as $article)
                    <div class="card product-card-horizontal">
                        <div class="card-img-side">
                            <img src="{{ $article->image }}" alt="{{ $article->title }}">
                        </div>
                        <div class="card-body-side">
                            <div>
                                <span class="career-badge" style="margin-bottom: 0.5rem; display: inline-block;">GARANSI RESMI</span>
                                <h3 style="font-size: 1.4rem; margin-bottom: 0.75rem; color: var(--color-secondary);">{{ $article->title }}</h3>
                                <div style="color: var(--color-text-muted); font-size: 0.9rem; line-height: 1.5; margin-bottom: 1rem;">
                                    {!! strip_tags($article->content) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="card" style="grid-column: span 2; text-align: center; padding: 3rem; color: var(--color-text-muted);">
                        <p>Belum ada program purna jual yang ditayangkan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Booking Service Form -->
    <section class="section">
        <div class="section-header">
            <h2>Booking Service Online</h2>
            <p>Rencanakan kunjungan servis Anda lebih awal. Lengkapi form berikut untuk reservasi antrean bengkel.</p>
        </div>

        <div style="max-width: 650px; margin: 0 auto; background-color: var(--color-surface); border: 1px solid var(--color-border); padding: 3rem; border-radius: var(--radius-lg); box-shadow: var(--shadow-lg);">
            <form id="bookingForm">
                <div style="display: flex; flex-direction: column; gap: 1.25rem;">
                    
                    <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                        <label for="nama" style="font-weight: 600; font-size: 0.9rem; color: var(--color-secondary);">Nama Lengkap</label>
                        <input type="text" id="nama" required style="padding: 0.75rem; border: 1px solid var(--color-border); border-radius: var(--radius-sm); outline: none; font-family: inherit;" placeholder="Masukkan nama Anda">
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                        <label for="phone" style="font-weight: 600; font-size: 0.9rem; color: var(--color-secondary);">Nomor WhatsApp</label>
                        <input type="tel" id="phone" required style="padding: 0.75rem; border: 1px solid var(--color-border); border-radius: var(--radius-sm); outline: none; font-family: inherit;" placeholder="e.g. 081234567890">
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                        <label for="mobil" style="font-weight: 600; font-size: 0.9rem; color: var(--color-secondary);">Tipe Kendaraan</label>
                        <input type="text" id="mobil" required style="padding: 0.75rem; border: 1px solid var(--color-border); border-radius: var(--radius-sm); outline: none; font-family: inherit;" placeholder="e.g. Daihatsu Xenia / Isuzu D-Max">
                    </div>

                    <div class="form-grid-2">
                        <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                            <label for="cabang" style="font-weight: 600; font-size: 0.9rem; color: var(--color-secondary);">Pilih Cabang</label>
                            <select id="cabang" required style="padding: 0.75rem; border: 1px solid var(--color-border); border-radius: var(--radius-sm); outline: none; font-family: inherit; background-color: white;">
                                <option value="Cabang Jakarta">Jakarta Pusat</option>
                                <option value="Cabang Surabaya">Surabaya</option>
                            </select>
                        </div>

                        <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                            <label for="tanggal" style="font-weight: 600; font-size: 0.9rem; color: var(--color-secondary);">Tanggal Servis</label>
                            <input type="date" id="tanggal" required style="padding: 0.75rem; border: 1px solid var(--color-border); border-radius: var(--radius-sm); outline: none; font-family: inherit;">
                        </div>
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                        <label for="keluhan" style="font-weight: 600; font-size: 0.9rem; color: var(--color-secondary);">Jenis Servis & Keluhan</label>
                        <textarea id="keluhan" rows="3" required style="padding: 0.75rem; border: 1px solid var(--color-border); border-radius: var(--radius-sm); outline: none; font-family: inherit; resize: none;" placeholder="Sebutkan jenis servis (ganti oli, servis berkala, keluhan AC, dll.)"></textarea>
                    </div>

                    <button type="submit" class="btn-primary" style="border: none; justify-content: center; padding: 1rem; width: 100%; cursor: pointer;">
                        <i class="fa-solid fa-calendar-check"></i> Kirim Form Booking
                    </button>

                </div>
            </form>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        document.getElementById('bookingForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const nama = document.getElementById('nama').value;
            const phone = document.getElementById('phone').value;
            const mobil = document.getElementById('mobil').value;
            const cabang = document.getElementById('cabang').value;
            const tanggal = document.getElementById('tanggal').value;
            const keluhan = document.getElementById('keluhan').value;
            
            // Format WhatsApp Message
            const message = `Halo Bengkel Resmi Armada Mobil,\n\nSaya ingin melakukan booking servis online dengan rincian berikut:\n\n*Nama:* ${nama}\n*WhatsApp:* ${phone}\n*Kendaraan:* ${mobil}\n*Cabang Bengkel:* ${cabang}\n*Rencana Tanggal:* ${tanggal}\n*Keterangan/Keluhan:* ${keluhan}\n\nMohon konfirmasi ketersediaan jadwal antrean. Terima kasih!`;
            
            @php
                $waContact = $contacts->where('type', 'WhatsApp')->first()?->contact ?? '+62 812-3456-7890';
                $waClean = str_replace(['+', '-', ' '], '', $waContact);
            @endphp
            
            const waLink = `https://wa.me/{{ $waClean }}?text=${encodeURIComponent(message)}`;
            
            // Redirect to WhatsApp
            window.open(waLink, '_blank');
        });
    </script>
@endsection
