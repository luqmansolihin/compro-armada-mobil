<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\CompanyProfileController;

Route::get('/', [CompanyProfileController::class, 'home'])->name('home');
Route::get('/isuzu', [CompanyProfileController::class, 'isuzu'])->name('isuzu');
Route::get('/daihatsu', [CompanyProfileController::class, 'daihatsu'])->name('daihatsu');
Route::get('/branch', [CompanyProfileController::class, 'branch'])->name('branch');
Route::get('/about', [CompanyProfileController::class, 'about'])->name('about');
Route::get('/blogs', [CompanyProfileController::class, 'blogs'])->name('blogs');
Route::get('/blogs/{slug}', [CompanyProfileController::class, 'blogDetail'])->name('blog.detail');
Route::get('/promotion', [CompanyProfileController::class, 'promotion'])->name('promotion');
Route::get('/promotion/{slug}', [CompanyProfileController::class, 'promotionDetail'])->name('promotion.detail');
Route::get('/career', [CompanyProfileController::class, 'career'])->name('career');
Route::get('/career/{slug}', [CompanyProfileController::class, 'careerDetail'])->name('career.detail');
Route::get('/purna-jual', [CompanyProfileController::class, 'purnaJual'])->name('purna-jual');
Route::get('/products/{slug}', [CompanyProfileController::class, 'productDetail'])->name('product.detail');
Route::get('/sitemap.xml', [CompanyProfileController::class, 'sitemap'])->name('sitemap');
Route::get('/search/api', [CompanyProfileController::class, 'searchApi'])->name('search.api');

