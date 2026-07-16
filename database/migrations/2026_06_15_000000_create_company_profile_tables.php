<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Product Brands
        Schema::create('product_brands', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // 2. Products (Cars)
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_brand_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('image');
            $table->longText('content');
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        // 3. Cities
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // 4. Careers
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->longText('description');
            $table->longText('requirement');
            $table->date('registration_from');
            $table->date('registration_to');
            $table->integer('minimal_age');
            $table->integer('maximal_age');
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        // 5. Career Placements (Junction table)
        Schema::create('career_placements', function (Blueprint $table) {
            $table->foreignId('career_id')->constrained()->onDelete('cascade');
            $table->foreignId('city_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        // 6. Outlets (Our Branch)
        Schema::create('outlets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('address');
            $table->string('phone');
            $table->string('fax')->nullable();
            $table->string('email');
            $table->string('url_address');
            $table->text('url_embed_address');
            $table->timestamps();
            $table->softDeletes();
        });

        // 7. Operational Hours
        Schema::create('operational_hours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('day_from');
            $table->string('day_to');
            $table->time('open_time');
            $table->time('close_time');
            $table->timestamps();
            $table->softDeletes();
        });

        // 8. Outlet Has Operational Hours
        Schema::create('outlet_has_operational_hours', function (Blueprint $table) {
            $table->foreignId('outlet_id')->constrained()->onDelete('cascade');
            $table->string('day_from');
            $table->string('day_to');
            $table->time('open_time');
            $table->time('close_time');
            $table->timestamps();
        });

        // 9. Services
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('description');
            $table->string('icon');
            $table->timestamps();
            $table->softDeletes();
        });

        // 10. Outlet Has Services (Junction table)
        Schema::create('outlet_has_services', function (Blueprint $table) {
            $table->foreignId('outlet_id')->constrained()->onDelete('cascade');
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        // 11. After Sales
        Schema::create('after_sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('image');
            $table->longText('content');
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        // 12. Blogs
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('image');
            $table->longText('content');
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        // 13. Promotions
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('image');
            $table->longText('content');
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        // 14. Profiles (About Us info)
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->longText('cover');
            $table->text('address');
            $table->longText('short_description');
            $table->longText('description');
            $table->timestamps();
        });

        // 15. Contacts
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('type');
            $table->text('contact');
            $table->timestamps();
            $table->softDeletes();
        });

        // 16. Banners
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->longText('image');
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        // 17. Brochures
        Schema::create('brochures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('url');
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        // 18. Testimonials
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->longText('image');
            $table->string('profession');
            $table->string('testimonial');
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('brochures');
        Schema::dropIfExists('banners');
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('profiles');
        Schema::dropIfExists('promotions');
        Schema::dropIfExists('blogs');
        Schema::dropIfExists('after_sales');
        Schema::dropIfExists('outlet_has_services');
        Schema::dropIfExists('services');
        Schema::dropIfExists('outlet_has_operational_hours');
        Schema::dropIfExists('operational_hours');
        Schema::dropIfExists('outlets');
        Schema::dropIfExists('career_placements');
        Schema::dropIfExists('careers');
        Schema::dropIfExists('cities');
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_brands');
    }
};
