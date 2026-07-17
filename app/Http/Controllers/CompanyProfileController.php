<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Service;
use App\Models\Promotion;
use App\Models\Blog;
use App\Models\Testimonial;
use App\Models\Profile;
use App\Models\Contact;
use App\Models\Product;
use App\Models\ProductBrand;
use App\Models\Outlet;
use App\Models\Career;
use App\Models\AfterSale;

class CompanyProfileController extends Controller
{
    /**
     * Shared contact settings helper.
     */
    private function getContacts()
    {
        return Contact::all();
    }

    /**
     * Home Page
     */
    public function home()
    {
        $banners = Banner::where('status', true)->latest()->get();
        $services = Service::latest()->take(3)->get();
        $promotions = Promotion::where('status', true)->latest()->take(3)->get();
        $blogs = Blog::where('status', true)->latest()->take(3)->get();
        $testimonials = Testimonial::where('status', true)->latest()->get();
        $profile = Profile::first();
        $contacts = $this->getContacts();

        return view('pages.home', compact('banners', 'services', 'promotions', 'blogs', 'testimonials', 'profile', 'contacts'));
    }

    /**
     * Isuzu Brand Page
     */
    public function isuzu()
    {
        $brand = ProductBrand::where('name', 'isuzu')->first();
        $products = $brand ? Product::where('product_brand_id', $brand->id)->where('status', true)->latest()->get() : collect();
        $contacts = $this->getContacts();
        
        return view('pages.isuzu', compact('products', 'contacts'));
    }

    /**
     * Daihatsu Brand Page
     */
    public function daihatsu()
    {
        $brand = ProductBrand::where('name', 'daihatsu')->first();
        $products = $brand ? Product::where('product_brand_id', $brand->id)->where('status', true)->latest()->get() : collect();
        $contacts = $this->getContacts();

        return view('pages.daihatsu', compact('products', 'contacts'));
    }

    /**
     * Branch Outlets Page
     */
    public function branch()
    {
        $outlets = Outlet::with(['brand', 'services', 'operationalHours'])->latest()->get();
        $contacts = $this->getContacts();

        return view('pages.branch', compact('outlets', 'contacts'));
    }

    /**
     * About Us Page
     */
    public function about()
    {
        $profile = Profile::first();
        $contacts = $this->getContacts();

        return view('pages.about', compact('profile', 'contacts'));
    }

    /**
     * Blogs Index Page
     */
    public function blogs()
    {
        $blogs = Blog::where('status', true)->latest()->get();
        $contacts = $this->getContacts();

        return view('pages.blogs', compact('blogs', 'contacts'));
    }

    /**
     * Blog Detail Page
     */
    public function blogDetail($slug)
    {
        $blog = Blog::where('slug', $slug)->where('status', true)->firstOrFail();
        $contacts = $this->getContacts();

        return view('pages.blog-detail', compact('blog', 'contacts'));
    }

    /**
     * Promotions Index Page
     */
    public function promotion()
    {
        $promotions = Promotion::where('status', true)->latest()->get();
        $contacts = $this->getContacts();

        return view('pages.promotion', compact('promotions', 'contacts'));
    }

    /**
     * Promotion Detail Page
     */
    public function promotionDetail($slug)
    {
        $promotion = Promotion::where('slug', $slug)->where('status', true)->firstOrFail();
        $contacts = $this->getContacts();

        return view('pages.promotion-detail', compact('promotion', 'contacts'));
    }

    /**
     * Career Opportunities Page
     */
    public function career()
    {
        $careers = Career::with('cities')
            ->where('status', true)
            ->where('registration_to', '>=', now()->toDateString())
            ->latest()
            ->get();
        $contacts = $this->getContacts();

        return view('pages.career', compact('careers', 'contacts'));
    }

    public function careerDetail($slug)
    {
        $career = Career::with('cities')
            ->where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();
        $contacts = $this->getContacts();

        return view('pages.career-detail', compact('career', 'contacts'));
    }

    /**
     * Purna Jual (Aftersales) Page
     */
    public function purnaJual()
    {
        $aftersales = AfterSale::where('status', true)->latest()->get();
        $services = Service::latest()->get();
        $outlets = Outlet::latest()->get();
        $contacts = $this->getContacts();

        return view('pages.purna-jual', compact('aftersales', 'services', 'outlets', 'contacts'));
    }

    /**
     * Product Detail Page
     */
    public function productDetail($slug)
    {
        $product = Product::with('brand')->where('slug', $slug)->where('status', true)->firstOrFail();
        $contacts = $this->getContacts();

        return view('pages.product-detail', compact('product', 'contacts'));
    }

    /**
     * Sitemap XML Page
     */
    public function sitemap()
    {
        $blogs = Blog::where('status', true)->latest()->get();
        $promotions = Promotion::where('status', true)->latest()->get();
        $products = Product::where('status', true)->latest()->get();

        return response()->view('sitemap', compact('blogs', 'promotions', 'products'))
            ->header('Content-Type', 'text/xml');
    }

    /**
     * Search API
     */
    public function searchApi(Request $request)
    {
        $q = $request->query('q');
        if (empty($q) || strlen($q) < 2) {
            return response()->json([
                'products' => [],
                'branches' => [],
                'blogs' => [],
                'promotions' => [],
                'careers' => []
            ]);
        }

        $products = Product::where('status', true)
            ->where(function($query) use ($q) {
                $query->where('title', 'like', "%{$q}%")
                      ->orWhere('content', 'like', "%{$q}%");
            })
            ->limit(5)
            ->get(['title', 'slug', 'image'])
            ->map(function($item) {
                $item->url = route('product.detail', $item->slug);
                $item->image_url = filter_var($item->image, FILTER_VALIDATE_URL) ? $item->image : asset('storage/' . $item->image);
                return $item;
            });

        $branches = Outlet::where(function($query) use ($q) {
                $query->where('name', 'like', "%{$q}%")
                      ->orWhere('address', 'like', "%{$q}%");
            })
            ->limit(5)
            ->get(['name', 'address'])
            ->map(function($item) {
                $item->url = route('branch') . '?q=' . urlencode($item->name);
                return $item;
            });

        $blogs = Blog::where('status', true)
            ->where(function($query) use ($q) {
                $query->where('title', 'like', "%{$q}%")
                      ->orWhere('content', 'like', "%{$q}%");
            })
            ->limit(5)
            ->get(['title', 'slug', 'image'])
            ->map(function($item) {
                $item->url = route('blog.detail', $item->slug);
                $item->image_url = filter_var($item->image, FILTER_VALIDATE_URL) ? $item->image : asset('storage/' . $item->image);
                return $item;
            });

        $promotions = Promotion::where('status', true)
            ->where(function($query) use ($q) {
                $query->where('title', 'like', "%{$q}%")
                      ->orWhere('content', 'like', "%{$q}%");
            })
            ->limit(5)
            ->get(['title', 'slug', 'image'])
            ->map(function($item) {
                $item->url = route('promotion.detail', $item->slug);
                $item->image_url = filter_var($item->image, FILTER_VALIDATE_URL) ? $item->image : asset('storage/' . $item->image);
                return $item;
            });

        $careers = Career::where('status', true)
            ->where(function($query) use ($q) {
                $query->where('name', 'like', "%{$q}%")
                      ->orWhere('description', 'like', "%{$q}%");
            })
            ->limit(5)
            ->get(['name', 'slug'])
            ->map(function($item) {
                $item->url = route('career.detail', $item->slug);
                $item->title = $item->name; // Map to title for JS uniformity
                return $item;
            });

        return response()->json([
            'products' => $products,
            'branches' => $branches,
            'blogs' => $blogs,
            'promotions' => $promotions,
            'careers' => $careers
        ]);
    }
}
