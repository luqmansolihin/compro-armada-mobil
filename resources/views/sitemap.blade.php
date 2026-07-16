@php echo '<' . '?xml version="1.0" encoding="UTF-8"?' . '>'; @endphp
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <!-- Static Pages -->
    <url>
        <loc>{{ route('home') }}</loc>
        <lastmod>{{ now()->startOfMonth()->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ route('isuzu') }}</loc>
        <lastmod>{{ now()->startOfMonth()->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ route('daihatsu') }}</loc>
        <lastmod>{{ now()->startOfMonth()->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ route('purna-jual') }}</loc>
        <lastmod>{{ now()->startOfMonth()->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ route('promotion') }}</loc>
        <lastmod>{{ now()->startOfWeek()->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ route('blogs') }}</loc>
        <lastmod>{{ now()->startOfWeek()->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ route('about') }}</loc>
        <lastmod>{{ now()->startOfMonth()->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
    <url>
        <loc>{{ route('branch') }}</loc>
        <lastmod>{{ now()->startOfMonth()->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
    <url>
        <loc>{{ route('career') }}</loc>
        <lastmod>{{ now()->startOfWeek()->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.5</priority>
    </url>

    <!-- Dynamic Blog Details -->
    @foreach ($blogs as $blog)
        <url>
            <loc>{{ route('blog.detail', $blog->slug) }}</loc>
            <lastmod>{{ $blog->updated_at ? $blog->updated_at->toAtomString() : $blog->created_at->toAtomString() }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach

    <!-- Dynamic Promotion Details -->
    @foreach ($promotions as $promotion)
        <url>
            <loc>{{ route('promotion.detail', $promotion->slug) }}</loc>
            <lastmod>{{ $promotion->updated_at ? $promotion->updated_at->toAtomString() : $promotion->created_at->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach

    <!-- Dynamic Product Details -->
    @foreach ($products as $product)
        <url>
            <loc>{{ route('product.detail', $product->slug) }}</loc>
            <lastmod>{{ $product->updated_at ? $product->updated_at->toAtomString() : $product->created_at->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.7</priority>
        </url>
    @endforeach
</urlset>
