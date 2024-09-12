<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// User
Route::get('/', [App\Http\Controllers\LandingPageController::class, 'index'])->name('home');
Route::get('/tentang-kami', [App\Http\Controllers\LandingPageController::class, 'about'])->name('about');
Route::get('/paket', [App\Http\Controllers\LandingPageController::class, 'package'])->name('package');
Route::get('/paket/detail/{id}', [App\Http\Controllers\LandingPageController::class, 'package_detail'])->name('package_detail');
Route::get('/berita', [App\Http\Controllers\LandingPageController::class, 'news'])->name('news');
Route::get('/berita/detail/{slug}', [App\Http\Controllers\LandingPageController::class, 'news_detail'])->name('news_detail');
Route::get('/galeri', [App\Http\Controllers\LandingPageController::class, 'gallery'])->name('gallery');

// Admin - Dasboard
Route::get('/admin/dashboard', [App\Http\Controllers\AdminDashboardController::class, 'index'])->name('admin.dashboard');


// Admin - Banner
Route::get('/admin/banner', [App\Http\Controllers\BannerController::class, 'index'])->name('admin.banner.index');
Route::get('/admin/banner/create', [App\Http\Controllers\BannerController::class, 'create'])->name('admin.banner.create');
Route::post('/admin/banner/store', [App\Http\Controllers\BannerController::class, 'store'])->name('admin.banner.store');
Route::get('/admin/banner/edit/{id}', [App\Http\Controllers\BannerController::class, 'edit'])->name('admin.banner.edit');
Route::put('/admin/banner/update/{id}', [App\Http\Controllers\BannerController::class, 'update'])->name('admin.banner.update');
Route::delete('/admin/banner/delete/{id}', [App\Http\Controllers\BannerController::class, 'delete'])->name('admin.banner.delete');


// Admin - Category
Route::get('/admin/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('admin.category.index');
Route::get('/admin/category/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('admin.category.create');
Route::post('/admin/category/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('admin.category.store');
Route::get('/admin/category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('admin.category.edit');
Route::put('/admin/category/update/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('admin.category.update');
Route::delete('/admin/category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('admin.category.delete');

// Admin - Subcategory
Route::get('/admin/subcategory', [App\Http\Controllers\SubcategoryController::class, 'index'])->name('admin.subcategory.index');
Route::get('/admin/subcategory/create', [App\Http\Controllers\SubcategoryController::class, 'create'])->name('admin.subcategory.create');
Route::post('/admin/subcategory/store', [App\Http\Controllers\SubcategoryController::class, 'store'])->name('admin.subcategory.store');
Route::get('/admin/subcategory/edit/{id}', [App\Http\Controllers\SubcategoryController::class, 'edit'])->name('admin.subcategory.edit');
Route::put('/admin/subcategory/update/{id}', [App\Http\Controllers\SubcategoryController::class, 'update'])->name('admin.subcategory.update');
Route::delete('/admin/subcategory/delete/{id}', [App\Http\Controllers\SubcategoryController::class, 'delete'])->name('admin.subcategory.delete');


// Admin - Testimoni
Route::get('/admin/testimoni', [App\Http\Controllers\TestimoniController::class, 'index'])->name('admin.testimoni.index');
Route::get('/admin/testimoni/create', [App\Http\Controllers\TestimoniController::class, 'create'])->name('admin.testimoni.create');
Route::post('/admin/testimoni/store', [App\Http\Controllers\TestimoniController::class, 'store'])->name('admin.testimoni.store');
Route::get('/admin/testimoni/edit/{id}', [App\Http\Controllers\TestimoniController::class, 'edit'])->name('admin.testimoni.edit');
Route::put('/admin/testimoni/update/{id}', [App\Http\Controllers\TestimoniController::class, 'update'])->name('admin.testimoni.update');
Route::delete('/admin/testimoni/delete/{id}', [App\Http\Controllers\TestimoniController::class, 'delete'])->name('admin.testimoni.delete');

// Admin - Berita
Route::get('/admin/berita', [App\Http\Controllers\NewsController::class, 'index'])->name('admin.berita.index');
Route::get('/admin/berita/create', [App\Http\Controllers\NewsController::class, 'create'])->name('admin.berita.create');
Route::post('/admin/berita/store', [App\Http\Controllers\NewsController::class, 'store'])->name('admin.berita.store');
Route::get('/admin/berita/edit/{id}', [App\Http\Controllers\NewsController::class, 'edit'])->name('admin.berita.edit');
Route::put('/admin/berita/update/{id}', [App\Http\Controllers\NewsController::class, 'update'])->name('admin.berita.update');
Route::delete('/admin/berita/delete/{id}', [App\Http\Controllers\NewsController::class, 'delete'])->name('admin.berita.delete');

// Admin - Sertifikasi Logo
Route::get('/admin/certificate-logo', [App\Http\Controllers\CertificateLogoController::class, 'index'])->name('admin.certificate-logo.index');
Route::get('/admin/certificate-logo/create', [App\Http\Controllers\CertificateLogoController::class, 'create'])->name('admin.certificate-logo.create');
Route::post('/admin/certificate-logo/store', [App\Http\Controllers\CertificateLogoController::class, 'store'])->name('admin.certificate-logo.store');
Route::get('/admin/certificate-logo/edit/{id}', [App\Http\Controllers\CertificateLogoController::class, 'edit'])->name('admin.certificate-logo.edit');
Route::put('/admin/certificate-logo/update/{id}', [App\Http\Controllers\CertificateLogoController::class, 'update'])->name('admin.certificate-logo.update');
Route::delete('/admin/certificate-logo/delete/{id}', [App\Http\Controllers\CertificateLogoController::class, 'delete'])->name('admin.certificate-logo.delete');

// Admin - Package
Route::get('/admin/package', [App\Http\Controllers\PackageController::class, 'index'])->name('admin.package.index');
Route::get('/admin/package/create', [App\Http\Controllers\PackageController::class, 'create'])->name('admin.package.create');
Route::post('/admin/package/store', [App\Http\Controllers\PackageController::class, 'store'])->name('admin.package.store');
Route::get('/admin/package/edit/{id}', [App\Http\Controllers\PackageController::class, 'edit'])->name('admin.package.edit');
Route::put('/admin/package/update/{id}', [App\Http\Controllers\PackageController::class, 'update'])->name('admin.package.update');
Route::delete('/admin/package/delete/{id}', [App\Http\Controllers\PackageController::class, 'delete'])->name('admin.package.delete');

// Admin - Tentang Kami
Route::get('/admin/tentangkami', [App\Http\Controllers\TentangKamiController::class, 'index'])->name('admin.tentangkami.index');
Route::get('/admin/tentangkami/create', [App\Http\Controllers\TentangKamiController::class, 'create'])->name('admin.tentangkami.create');
Route::post('/admin/tentangkami/store', [App\Http\Controllers\TentangKamiController::class, 'store'])->name('admin.tentangkami.store');
Route::get('/admin/tentangkami/edit/{id}', [App\Http\Controllers\TentangKamiController::class, 'edit'])->name('admin.tentangkami.edit');
Route::put('/admin/tentangkami/update/{id}', [App\Http\Controllers\TentangKamiController::class, 'update'])->name('admin.tentangkami.update');
Route::delete('/admin/bertentangkamiita/delete/{id}', [App\Http\Controllers\TentangKamiController::class, 'delete'])->name('admin.tentangkami.delete');

// Admin - Gallery
Route::get('/admin/galeri', [App\Http\Controllers\GalleryController::class, 'index'])->name('admin.galeri.index');
Route::get('/admin/galeri/create', [App\Http\Controllers\GalleryController::class, 'create'])->name('admin.galeri.create');
Route::post('/admin/galeri/store', [App\Http\Controllers\GalleryController::class, 'store'])->name('admin.galeri.store');
Route::get('/admin/galeri/edit/{id}', [App\Http\Controllers\GalleryController::class, 'edit'])->name('admin.galeri.edit');
Route::put('/admin/galeri/update/{id}', [App\Http\Controllers\GalleryController::class, 'update'])->name('admin.galeri.update');
Route::delete('/admin/bergaleriita/delete/{id}', [App\Http\Controllers\GalleryController::class, 'delete'])->name('admin.galeri.delete');
Route::get('/get-subcategories/{categoryId}', [App\Http\Controllers\GalleryController::class, 'getSubcategories']);