<?php

use App\Http\Controllers\DetailDokumentasiController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InfaqController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\QRISController;
use App\Http\Controllers\QRISZakatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZakatController;
use App\Models\Dokumentasi;
use App\Models\Hero;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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
        'heroes' => Hero::take(6)->get(),
    ]);
});

// Halaman Ditolak
Route::get('/ditolak', function () {
    return view('akses.ditolak');
});

// Dashboard
Route::get('/admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'admin', 'verified'])->name('dashboard');

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

    // Kelola Pengguna
    Route::get('/admin/pengguna', [UserController::class, 'index'])->name('admin.pengguna');

    //INFAQ
    Route::get('/admin/infaq', [InfaqController::class, 'index'])->name('admin.infaq.index');
    Route::get('/admin/infaq/create', [InfaqController::class, 'create'])->name('admin.infaq.create');
    Route::get('admin/infaq/edit/{id}', [InfaqController::class, 'edit'])->name('admin.infaq.edit');
    Route::post('/infaq/create', [InfaqController::class, 'store'])->name('admin.infaq.store');
    Route::put('/infaq/update/{id}', [InfaqController::class, 'update'])->name('admin.infaq.update');
    Route::delete('/infaq/delete/{id}', [InfaqController::class, 'destroy'])->name('admin.infaq.delete');
    //Data Infaq
    Route::get('/admin/infaq/data', [InfaqController::class, 'dataInfaq'])->name('admin.infaq.data');
    Route::delete('/admin/infaq/data/delete', [InfaqController::class, 'destroyAllKirimInfaq'])->name('data-infaq.destroyAll');

    //ZAKAT
    Route::get('/admin/zakat', [ZakatController::class, 'index'])->name('admin.zakat.index');
    Route::get('/admin/zakat/create', [ZakatController::class, 'create'])->name('admin.zakat.create');
    Route::get('admin/zakat/edit/{id}', [ZakatController::class, 'edit'])->name('admin.zakat.edit');
    Route::post('/zakat/create', [ZakatController::class, 'store'])->name('admin.zakat.store');
    Route::put('/zakat/update/{id}', [ZakatController::class, 'update'])->name('admin.zakat.update');
    Route::delete('/zakat/delete/{id}', [ZakatController::class, 'destroy'])->name('admin.zakat.delete');
    //Data Zakat
    Route::get('/admin/zakat/data', [ZakatController::class, 'dataZakat'])->name('admin.zakat.data');
    Route::delete('/admin/zakat/data/delete', [ZakatController::class, 'destroyAllKirimZakat'])->name('data-zakat.destroyAll');

    //Riwayat Zakat & Infaq
    Route::get('/admin/riwayat', [InfaqController::class, 'riwayat'])->name('admin.riwayat');
    Route::delete('/admin/riwayat/delete', [InfaqController::class, 'destroyAllRiwayat'])->name('riwayat.destroyAll');

    //Banner Hero
    Route::get('/admin/heroes', [HeroController::class, 'index'])->name('admin.hero');
    Route::get('/admin/hero/add', [HeroController::class, 'create'])->name('admin.hero.create');
    Route::post('/admin/hero/store', [HeroController::class, 'store'])->name('admin.hero.store');
    Route::delete('/admin/hero/delete/{id}', [HeroController::class, 'destroy'])->name('admin.hero.delete');
    
    //Program Dokumentasi
    Route::get('admin/program', [DokumentasiController::class, 'index'])->name('admin.program');
    Route::get('admin/program/create', [DokumentasiController::class, 'create'])->name('admin.program.create');
    Route::get('admin/program/show/{id}', [DetailDokumentasiController::class, 'adminShow'])->name('admin.program.show');
    Route::get('/admin/program/edit/{id}', [DokumentasiController::class, 'edit'])->name('admin.program.edit');
    Route::post('/admin/program/store', [DokumentasiController::class, 'store'])->name('admin.program.store');
    Route::post('/admin/program/add-gambar', [DetailDokumentasiController::class, 'store'])->name('admin.program.gambar');
    Route::delete('/admin/program/delete-gambar/{id}', [DetailDokumentasiController::class, 'destroy'])->name('admin.program.gambar.delete');
    Route::put('/admin/program/update/{id}', [DokumentasiController::class, 'update'])->name('admin.program.update');
    Route::delete('admin/program/delete/{id}', [DokumentasiController::class, 'destroy'])->name('admin.program.delete');

    //Galeri (Belum kepake)
    Route::get('/admin/galleries', [GalleryController::class, 'index'])->name('admin.galeri');
    Route::get('/admin/galeri/add', [GalleryController::class, 'create'])->name('admin.galeri.create');
    Route::post('/admin/galeri/store', [GalleryController::class, 'store'])->name('admin.galeri.store');
    Route::delete('/admin/galeri/delete/{id}', [GalleryController::class, 'destroy'])->name('admin.galeri.delete');

    //Kelola QRIS
    Route::get('/admin/qris', [QRISController::class, 'kelolaQris'])->name('admin.qris.kelola');

    //QRIS Infaq
    Route::get('/admin/qris/infaq', [QRISController::class, 'index'])->name('admin.qris.infaq');
    Route::post('/admin/qris/store', [QRISController::class, 'store'])->name('admin.qris.store');
    Route::delete('/admin/qris/delete/{id}', [QRISController::class, 'destroy'])->name('admin.qris.delete');

    //QRIS Zakat
    Route::get('/admin/qris/zakat', [QRISZakatController::class, 'index'])->name('admin.qris.zakat');
    Route::post('/admin/qris/zakat/create', [QRISZakatController::class, 'store'])->name('admin.qris.zakat.store');
    Route::delete('/admin/qris/zakat/delete/{id}', [QRISZakatController::class, 'destroy'])->name('admin.qris.zakat.delete');

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

//Infaq untuk User
Route::get('/infaq', [InfaqController::class, 'userPage'])->name('infaq.index');
Route::get('/berinfaq/{infaq}', [InfaqController::class, 'halamanKirimInfaq'])->name('infaq.kirim-infaq');
Route::post('/berinfaq', [InfaqController::class, 'kirimInfaq'])->name('infaq.kirim-infaq.store');
Route::get('/infaq/terima-kasih', function () {
    return view('infaq.thankyou');
})->name('infaq.thankyou');

//Zakat untuk User
Route::get('/zakat', [ZakatController::class, 'userPage'])->name('zakat.index');
Route::get('/berzakat/{zakat}', [ZakatController::class, 'halamanKirimZakat'])->name('zakat.kirim-zakat');
Route::post('/berzakat', [ZakatController::class, 'kirimZakat'])->name('zakat.kirim-zakat.store');
Route::get('/zakat/terima-kasih', function () {
    return view('zakat.thankyou');
})->name('zakat.thankyou');

// Program Dokumentasi untuk User
Route::get('/program', [DokumentasiController::class, 'index'])->name('program.index');
Route::get('/program/{id}', [DetailDokumentasiController::class, 'index'])->name('detail.program');

// Payment (Infaq)
Route::get('/payment-bank-infaq', [PaymentController::class, 'infaqBank'])->name('infaq.payment.bank');
Route::get('/payment-qris-infaq', [PaymentController::class, 'infaqQris'])->name('infaq.payment.qris');

// Payment (Zakat)
Route::get('/payment-bank-zakat', [PaymentController::class, 'zakatBank'])->name('zakat.payment.bank');
Route::get('/payment-qris-zakat', [PaymentController::class, 'zakatQris'])->name('zakat.payment.qris');

require __DIR__ . '/auth.php';