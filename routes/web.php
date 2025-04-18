<?php

use App\Http\Controllers\DetailDokumentasiController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\InfaqController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TypeController;
use App\Models\DetailDokumentasi;
use App\Models\Dokumentasi;
use App\Models\Hero;
use Illuminate\Support\Facades\Route;
use App\Models\Type;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini kamu bisa mendaftarkan route untuk aplikasi kamu. File ini
| dimuat oleh RouteServiceProvider dan semua route akan masuk ke grup
| middleware "web".
|
*/

// Halaman Utama
Route::get('/', function () {
    return view('welcome', [
        'dokumentasis' => Dokumentasi::take(6)->get(),
        'heroes' => Hero::latest()->get(),
    ]);
});

// Halaman Ditolak
Route::get('/ditolak', function () {
    return view('akses.ditolak');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Group middleware: auth
Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Edit Foto Profil
    Route::post('/profile/update-photo', [ProfileController::class, 'updatePhoto'])->name('profile.update-photo');
});

// Group middleware: admin
Route::middleware('admin')->group(function () {

    Route::get('/admin/infaq', [InfaqController::class, 'index'])->name('admin.infaq.index');
    Route::get('/admin/infaq/create', [InfaqController::class, 'create'])->name('admin.infaq.create');
    Route::get('admin/infaq/edit/{id}', [InfaqController::class, 'edit'])->name('admin.infaq.edit');
    Route::post('/infaq/create', [InfaqController::class, 'store'])->name('admin.infaq.store');
    Route::put('/infaq/update/{id}', [InfaqController::class, 'update'])->name('admin.infaq.update');
    Route::delete('/infaq/delete/{id}', [InfaqController::class, 'destroy'])->name('admin.infaq.delete');

    //Data Infaq
    Route::get('/admin/infaq/data', [InfaqController::class, 'dataInfaq'])->name('admin.infaq.data');

    Route::get('/dokumentasi', [DokumentasiController::class, 'index'])->name('dokumentasi.index');
    Route::get('/dokumentasi/create', [DokumentasiController::class, 'create'])->name('dokumentasi.create');
    Route::post('/dokumentasi', [DokumentasiController::class, 'store'])->name('dokumentasi.store');
    Route::post('/dokumentasi/add-gambar', [DetailDokumentasiController::class, 'store'])->name('dokumentasi.gambar');
    Route::get('/dokumentasi/{id}', [DetailDokumentasiController::class, 'index'])->name('detail.dokumentasi');
    Route::get('/dokumentasi/edit/{id}', [DokumentasiController::class, 'edit'])->name('dokumentasi.edit');
    Route::put('/dokumentasi/update/{id}', [DokumentasiController::class, 'update'])->name('dokumentasi.update');
    Route::delete('/dokumentasi/{id}', [DokumentasiController::class, 'destroy'])->name('dokumentasi.destroy');

    Route::get('/admin/heroes', [HeroController::class, 'index'])->name('admin.hero');
    Route::get('/admin/hero/add', [HeroController::class, 'create'])->name('admin.hero.create');
    Route::post('/admin/hero/store', [HeroController::class, 'store'])->name('admin.hero.store');
    Route::delete('/admin/hero/delete/{id}', [HeroController::class, 'destroy'])->name('admin.hero.delete');

    Route::get('admin/program', [DokumentasiController::class, 'index'])->name('admin.program');
    Route::get('admin/program/create', [DokumentasiController::class, 'create'])->name('admin.program.create');
    Route::get('admin/program/show/{id}', [DetailDokumentasiController::class, 'adminShow'])->name('admin.program.show');
    Route::delete('admin/program/delete/{id}', [DokumentasiController::class, 'destroy'])->name('admin.program.delete');

    Route::get('/admin/galleries', [GalleryController::class, 'index'])->name('admin.galeri');
    Route::get('/admin/galeri/add', [GalleryController::class, 'create'])->name('admin.galeri.create');
    Route::post('/admin/galeri/store', [GalleryController::class, 'store'])->name('admin.galeri.store');
    Route::delete('/admin/galeri/delete/{id}', [GalleryController::class, 'destroy'])->name('admin.galeri.delete');

    Route::get('/admin/kelola-menu', function () {
        return view('admin.kelola');
    })->middleware(['auth', 'verified'])->name('kelola-menu');

    Route::get('/admin/data', function () {
        return view('admin.data');
    })->middleware(['auth', 'verified'])->name('data');
    
});

// Pages
Route::get('/latar-belakang', [PageController::class, 'latarBelakang'])->name('latar-belakang');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

//Infaq
Route::get('/infaq', [InfaqController::class, 'userPage'])->name('infaq.index');
Route::get('/berinfaq/{infaq}', [InfaqController::class, 'halamanKirimInfaq'])->name('infaq.kirim-infaq');
Route::post('/berinfaq', [InfaqController::class, 'kirimInfaq'])->name('infaq.kirim-infaq.store');
Route::get('/infaq/terima-kasih', function () {
    return view('infaq.thankyou');
})->name('infaq.thankyou');

// Payment (Infaq)
Route::get('/payment-bank-infaq', [PaymentController::class, 'bank'])->name('infaq.payment.bank');
Route::get('/payment-qris-infaq', [PaymentController::class, 'qris'])->name('infaq.payment.qris');

require __DIR__ . '/auth.php';