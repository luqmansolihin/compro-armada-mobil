<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\ProductBrand;
use App\Models\Product;
use App\Models\City;
use App\Models\Career;
use App\Models\Outlet;
use App\Models\OutletHasOperationalHour;
use App\Models\OperationalHour;
use App\Models\Service;
use App\Models\AfterSale;
use App\Models\Blog;
use App\Models\Promotion;
use App\Models\Profile;
use App\Models\Contact;
use App\Models\Banner;
use App\Models\Brochure;
use App\Models\Testimonial;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create User (Admin)
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
        ]);

        // 2. Product Brands
        $daihatsu = ProductBrand::create(['id' => 1, 'name' => 'daihatsu']);
        $isuzu = ProductBrand::create(['id' => 2, 'name' => 'isuzu']);

        // 3. Profiles (About Us)
        Profile::create([
            'user_id' => $admin->id,
            'cover' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=1200',
            'address' => 'Jl. Automotive Raya No. 88, Kavling 3-5, Jakarta Pusat, DKI Jakarta',
            'short_description' => 'Armada Mobil adalah dealer resmi otomotif terpercaya yang melayani penjualan dan purna jual kendaraan Isuzu dan Daihatsu.',
            'description' => 'Didirikan sejak tahun 2010, Armada Mobil telah menjadi mitra utama bagi ribuan keluarga dan pelaku bisnis di Indonesia dalam penyediaan kendaraan berkualitas tinggi. Kami berkomitmen untuk selalu menghadirkan pelayanan terbaik, solusi pembiayaan yang mudah, serta jaringan servis purna jual yang luas guna memastikan kepuasan dan kelancaran mobilitas Anda.',
            'vision' => 'Menjadi perusahaan otomotif terdepan dan paling terpercaya di Indonesia yang memberikan solusi transportasi terbaik bagi kebutuhan keluarga maupun kelancaran operasional bisnis pelanggan.',
            'mission' => 'Menyediakan produk kendaraan Isuzu & Daihatsu berkualitas tinggi, memberikan pelayanan servis purna jual yang cepat dan handal, serta menciptakan kenyamanan bertransaksi melalui solusi pembiayaan terpercaya.',
            'history' => [
                [
                    'year' => 'Tahun 2010',
                    'description' => 'Dealer pertama kami resmi didirikan di Jakarta Pusat untuk memasarkan unit kendaraan Daihatsu.'
                ],
                [
                    'year' => 'Tahun 2014',
                    'description' => 'Membuka cabang baru di Surabaya dan secara resmi menjalin kerjasama sebagai dealer resmi Isuzu.'
                ],
                [
                    'year' => 'Tahun 2018',
                    'description' => 'Meluncurkan program Layanan Mobile Service Car untuk menjangkau servis kendaraan operasional langsung ke lapangan.'
                ],
                [
                    'year' => 'Tahun 2024 - Sekarang',
                    'description' => 'Mengintegrasikan sistem reservasi booking servis secara online, dan melayani ribuan pelanggan komersial di Indonesia.'
                ]
            ],
        ]);

        // 4. Products (Cars)
        Product::create([
            'user_id' => $admin->id,
            'product_brand_id' => $isuzu->id,
            'title' => 'Isuzu D-Max',
            'slug' => 'isuzu-d-max',
            'image' => 'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&q=80&w=800',
            'content' => 'Isuzu D-Max adalah kendaraan double cabin tangguh yang dirancang untuk melibas segala medan berat dengan kenyamanan maksimal. Dilengkapi dengan mesin Blue Power diesel yang efisien namun sangat bertenaga, D-Max sangat ideal untuk kebutuhan operasional bisnis perkebunan, pertambangan, maupun hobi off-road Anda. Fitur keamanan mutakhir dan sistem penggerak 4x4 menjamin kontrol optimal di setiap perjalanan.',
            'status' => true,
        ]);

        Product::create([
            'user_id' => $admin->id,
            'product_brand_id' => $isuzu->id,
            'title' => 'Isuzu Traga',
            'slug' => 'isuzu-traga',
            'image' => 'https://images.unsplash.com/photo-1601584115197-04ecc0da31d7?auto=format&fit=crop&q=80&w=800',
            'content' => 'Isuzu Traga hadir sebagai solusi angkutan barang serbaguna dengan kapasitas bak terluas di kelasnya. Mesin legendaris Isuzu 4JA1-L 2.500 cc Direct Injection yang sangat irit bahan bakar dan suku cadang yang mudah didapatkan membuat Traga menjadi andalan pengusaha dalam memaksimalkan keuntungan harian. Sangat cocok untuk jasa ekspedisi, katering, material bangunan, hingga pertanian.',
            'status' => true,
        ]);

        Product::create([
            'user_id' => $admin->id,
            'product_brand_id' => $daihatsu->id,
            'title' => 'Daihatsu Xenia',
            'slug' => 'daihatsu-xenia',
            'image' => 'https://images.unsplash.com/photo-1549399542-7e3f8b79c341?auto=format&fit=crop&q=80&w=800',
            'content' => 'Daihatsu Xenia adalah MPV keluarga 7-seater legendaris Indonesia yang kini hadir dengan platform DNGA (Daihatsu New Global Architecture) yang lebih stabil, lega, dan aman. Mengusung mesin Dual VVT-i berteknologi modern, Xenia menawarkan konsumsi bahan bakar yang sangat hemat serta kenyamanan berkendara yang tinggi berkat suspensi yang disempurnakan. Pilihan tepat untuk perjalanan keluarga bahagia Anda.',
            'status' => true,
        ]);

        Product::create([
            'user_id' => $admin->id,
            'product_brand_id' => $daihatsu->id,
            'title' => 'Daihatsu Rocky',
            'slug' => 'daihatsu-rocky',
            'image' => 'https://images.unsplash.com/photo-1619642751034-765dfdf7c58e?auto=format&fit=crop&q=80&w=800',
            'content' => 'Daihatsu Rocky adalah compact SUV bergaya urban dinamis yang siap menemani jiwa muda petualang Anda. Menawarkan pilihan mesin Turbocharged 1.0L yang responsif serta konsumsi bahan bakar yang irit, Rocky dilengkapi dengan fitur keselamatan canggih A.S.A (Advanced Safety Assist) untuk perlindungan maksimal berkendara di perkotaan maupun luar kota.',
            'status' => true,
        ]);

        // 5. Cities
        $jakarta = City::create(['name' => 'Jakarta']);
        $surabaya = City::create(['name' => 'Surabaya']);
        $bandung = City::create(['name' => 'Bandung']);

        // 6. Careers
        $salesJob = Career::create([
            'user_id' => $admin->id,
            'name' => 'Sales Executive',
            'slug' => 'sales-executive',
            'description' => 'Mencari individu dinamis, bermotivasi tinggi, dan komunikatif untuk memasarkan produk kendaraan Isuzu dan Daihatsu.',
            'requirement' => "- Pendidikan minimal D3/S1 semua jurusan\n- Berorientasi pada target dan memiliki kemampuan komunikasi yang baik\n- Memiliki kendaraan pribadi minimal roda dua\n- Berpengalaman di bidang sales otomotif menjadi nilai tambah",
            'registration_from' => now(),
            'registration_to' => now()->addMonths(1),
            'minimal_age' => 20,
            'maximal_age' => 35,
            'status' => true,
        ]);
        $salesJob->cities()->attach([$jakarta->id, $surabaya->id]);

        $mechanicJob = Career::create([
            'user_id' => $admin->id,
            'name' => 'Automotive Mechanic',
            'slug' => 'automotive-mechanic',
            'description' => 'Mencari mekanik handal berpengalaman untuk melakukan perawatan dan perbaikan berkala pada kendaraan konsumen.',
            'requirement' => "- Pendidikan minimal SMK Teknik Otomotif\n- Memahami diagnosa mesin bensin dan diesel\n- Mampu bekerja secara tim dan individu\n- Memiliki sertifikasi pelatihan otomotif lebih disukai",
            'registration_from' => now(),
            'registration_to' => now()->addWeeks(2),
            'minimal_age' => 19,
            'maximal_age' => 30,
            'status' => true,
        ]);
        $mechanicJob->cities()->attach([$jakarta->id, $bandung->id]);

        // 7. Services (Purna Jual Services)
        $bookingService = Service::create([
            'user_id' => $admin->id,
            'title' => 'Booking Service Online',
            'description' => 'Reservasi perawatan mobil Anda tanpa antre melalui web atau telepon.',
            'icon' => 'fa-calendar-check',
        ]);

        $spareParts = Service::create([
            'user_id' => $admin->id,
            'title' => 'Suku Cadang Asli',
            'description' => 'Jaminan suku cadang original Isuzu dan Daihatsu untuk keandalan maksimal.',
            'icon' => 'fa-cogs',
        ]);

        $mobileService = Service::create([
            'user_id' => $admin->id,
            'title' => 'Mobile Service Car',
            'description' => 'Layanan perawatan kendaraan langsung ke rumah atau lokasi bisnis Anda.',
            'icon' => 'fa-truck-pickup',
        ]);

        // 8. Outlets (Our Branch) & Operational Hours
        $outletJkt = Outlet::create([
            'user_id' => $admin->id,
            'product_brand_id' => $daihatsu->id,
            'city_id' => $jakarta->id,
            'name' => 'Armada Mobil - Cabang Jakarta',
            'address' => 'Jl. Automotive Raya No. 88, Kavling 3-5, Jakarta Pusat',
            'phone' => '021-1234567',
            'fax' => '021-1234568',
            'email' => 'branch.jkt@armada-mobil.co.id',
            'url_address' => 'https://maps.google.com',
            'url_embed_address' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126920.24072214654!2d106.7594784918731!3d-6.196300782352841!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x5371e62e4a6d0c2e!2sJakarta%20Pusat%2C%20Kota%20Jakarta%20Pusat%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1718440000000!5m2!1sid!2sid',
        ]);
        $outletJkt->services()->attach([$bookingService->id, $spareParts->id, $mobileService->id]);

        $outletSby = Outlet::create([
            'user_id' => $admin->id,
            'product_brand_id' => $isuzu->id,
            'city_id' => $surabaya->id,
            'name' => 'Armada Mobil - Cabang Surabaya',
            'address' => 'Jl. Dharmahusada Indah No. 12, Surabaya, Jawa Timur',
            'phone' => '031-7654321',
            'fax' => '031-7654322',
            'email' => 'branch.sby@armada-mobil.co.id',
            'url_address' => 'https://maps.google.com',
            'url_embed_address' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.6918664188373!2d112.7562852237466!3d-7.275847055745136!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f97800000001%3A0x1d0f5e1f0e493390!2sSurabaya%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1718441000000!5m2!1sid!2sid',
        ]);
        $outletSby->services()->attach([$bookingService->id, $spareParts->id]);

        // 9. Outlet Has Operational Hours (for both outlets)
        OutletHasOperationalHour::create([
            'outlet_id' => $outletJkt->id,
            'day_from' => 'Senin',
            'day_to' => 'Jumat',
            'open_time' => '08:00:00',
            'close_time' => '17:00:00',
        ]);
        OutletHasOperationalHour::create([
            'outlet_id' => $outletJkt->id,
            'day_from' => 'Sabtu',
            'day_to' => 'Sabtu',
            'open_time' => '08:00:00',
            'close_time' => '13:00:00',
        ]);
        OutletHasOperationalHour::create([
            'outlet_id' => $outletSby->id,
            'day_from' => 'Senin',
            'day_to' => 'Jumat',
            'open_time' => '08:30:00',
            'close_time' => '16:30:00',
        ]);

        // Global Operational Hours
        OperationalHour::create([
            'user_id' => $admin->id,
            'day_from' => 'Senin',
            'day_to' => 'Jumat',
            'open_time' => '08:00:00',
            'close_time' => '17:00:00',
        ]);

        // 10. After Sales Content (Purna Jual main articles)
        AfterSale::create([
            'user_id' => $admin->id,
            'title' => 'Layanan Garansi Kendaraan',
            'slug' => 'layanan-garansi-kendaraan',
            'image' => 'https://images.unsplash.com/photo-1486006920555-c77dce18193b?auto=format&fit=crop&q=80&w=800',
            'content' => 'Setiap pembelian kendaraan baru Isuzu dan Daihatsu di Armada Mobil dilengkapi dengan program jaminan garansi resmi pabrikan. Garansi ini melindungi mesin, transmisi, serta kelistrikan utama kendaraan Anda. Lakukan perawatan berkala di bengkel resmi kami secara teratur untuk memastikan garansi Anda tetap aktif dan berlaku penuh.',
            'status' => true,
        ]);

        // 11. Blogs
        Blog::create([
            'user_id' => $admin->id,
            'title' => 'Tips Merawat AC Mobil Agar Tetap Dingin',
            'slug' => 'tips-merawat-ac-mobil-agar-tetap-dingin',
            'image' => 'https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&q=80&w=800',
            'content' => 'AC mobil yang dingin sangat penting untuk kenyamanan berkendara, terutama di iklim tropis Indonesia. Beberapa langkah perawatan mudah meliputi: selalu membersihkan karpet mobil dari debu, menghindari membuka jendela saat AC menyala, melakukan pembersihan filter kabin setiap 10.000 km, serta melakukan servis kompresor AC secara berkala.',
            'status' => true,
        ]);

        Blog::create([
            'user_id' => $admin->id,
            'title' => 'Perbedaan Mesin Diesel Common Rail vs Konvensional',
            'slug' => 'perbedaan-mesin-diesel-common-rail-vs-konvensional',
            'image' => 'https://images.unsplash.com/photo-1619642751034-765dfdf7c58e?auto=format&fit=crop&q=80&w=800',
            'content' => 'Mesin diesel modern seperti pada produk Isuzu kini menerapkan teknologi Common Rail. Berbeda dengan sistem konvensional yang menyalurkan bahan bakar secara manual, Common Rail menyalurkan bahan bakar dengan tekanan sangat tinggi lewat pipa rel bersama yang diatur secara elektronik oleh ECU. Hasilnya adalah pembakaran yang jauh lebih efisien, suara lebih halus, serta emisi gas buang yang lebih ramah lingkungan.',
            'status' => true,
        ]);

        // 12. Promotions
        Promotion::create([
            'user_id' => $admin->id,
            'title' => 'Promo Bunga 0% & DP Ringan Daihatsu',
            'slug' => 'promo-bunga-0-dp-ringan-daihatsu',
            'image' => 'https://images.unsplash.com/photo-1605152276897-4f618f831968?auto=format&fit=crop&q=80&w=800',
            'content' => 'Spesial bulan ini, bawa pulang Daihatsu Xenia impian Anda dengan paket pembiayaan eksklusif: Bunga 0% tenor hingga 1 tahun atau DP ringan mulai dari 15 juta rupiah. Dapatkan juga bonus tambahan berupa gratis kaca film berkualitas, karpet lembaran asli, dan gratis servis jasa & part hingga 50.000 km. Hubungi sales kami sekarang juga!',
            'status' => true,
        ]);

        // 13. Contacts
        Contact::create(['user_id' => $admin->id, 'type' => 'Phone', 'contact' => '+62 21-1234567']);
        Contact::create(['user_id' => $admin->id, 'type' => 'WhatsApp', 'contact' => '+62 812-3456-7890']);
        Contact::create(['user_id' => $admin->id, 'type' => 'Email', 'contact' => 'info@armada-mobil.co.id']);
        Contact::create(['user_id' => $admin->id, 'type' => 'Instagram', 'contact' => '@armada_mobil']);

        // 14. Banners
        Banner::create([
            'user_id' => $admin->id,
            'title' => 'Solusi Berkendara Keluarga & Bisnis Anda',
            'image' => 'https://images.unsplash.com/photo-1617788138017-80ad40651399?auto=format&fit=crop&q=80&w=1600',
            'status' => true,
        ]);
        Banner::create([
            'user_id' => $admin->id,
            'title' => 'Layanan Service Profesional & Terpercaya',
            'image' => 'https://images.unsplash.com/photo-1563720223185-11003d516935?auto=format&fit=crop&q=80&w=1600',
            'status' => true,
        ]);

        // 15. Brochures
        Brochure::create([
            'user_id' => $admin->id,
            'title' => 'Brosur Resmi Daihatsu Xenia',
            'url' => 'https://www.daihatsu.co.id/uploads/brochure/xenia.pdf',
            'status' => true,
        ]);
        Brochure::create([
            'user_id' => $admin->id,
            'title' => 'Brosur Resmi Isuzu D-Max',
            'url' => 'https://isuzu-astra.co.id/uploads/brochure/d-max.pdf',
            'status' => true,
        ]);

        // 16. Testimonials
        Testimonial::create([
            'user_id' => $admin->id,
            'name' => 'Budi Santoso',
            'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&q=80&w=150',
            'profession' => 'Pemilik Toko Sembako',
            'testimonial' => 'Membeli Isuzu Traga di Armada Mobil sangat membantu bisnis saya. Proses kredit dibantu sales sampai tuntas, dan servis rutinnya cepat serta pelayanannya ramah.',
            'status' => true,
        ]);
        Testimonial::create([
            'user_id' => $admin->id,
            'name' => 'Siti Aminah',
            'image' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&q=80&w=150',
            'profession' => 'Ibu Rumah Tangga',
            'testimonial' => 'Daihatsu Xenia baru kami terasa sangat nyaman untuk mudik keluarga. Terima kasih Armada Mobil atas pelayanannya yang memuaskan dan banyak bonusnya.',
            'status' => true,
        ]);
    }
}
