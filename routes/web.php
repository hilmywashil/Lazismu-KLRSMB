<?php

use App\Http\Controllers\DetailDokumentasiController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\InfaqController;
use App\Http\Controllers\TypeController;
use App\Models\DetailDokumentasi;
use App\Models\Dokumentasi;
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
        'types' => Type::take(3)->get(),
        'dokumentasis' => Dokumentasi::take(5)->get(),
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
    // Donasi
    Route::get('/donasi', [DonationController::class, 'index']);

    // Infaq
    Route::get('/infaq', [InfaqController::class, 'index']);
    Route::get('/infaq/create', [InfaqController::class, 'create'])->name('infaq.create');
    Route::post('/infaq/create', [InfaqController::class, 'store'])->name('infaq.store');
});

// Payment (Donasi)
Route::get('/payment-bank', [DonationController::class, 'paymentBank']);
Route::get('/payment-qris', [DonationController::class, 'paymentQRIS']);
Route::get('/donasi/create', [DonationController::class, 'create'])->name('donasi.create');
Route::post('/donasi/create', [DonationController::class, 'store'])->name('donasi.store');

// Payment (Infaq)
Route::get('/payment-bank-infaq', [InfaqController::class, 'paymentBank'])->name('infaq.payment.bank');
Route::get('/payment-qris-infaq', [InfaqController::class, 'paymentQRIS'])->name('infaq.payment.qris');

// Resource route
Route::resource('/donasi-disini', TypeController::class);
Route::resource('/infaq-disini', TypeController::class);

Route::get('/dokumentasi', [DokumentasiController::class, 'index'])->name('dokumentasi.index');
Route::get('/dokumentasi/create', [DokumentasiController::class, 'create'])->name('dokumentasi.create');
Route::post('/dokumentasi', [DokumentasiController::class, 'store'])->name('dokumentasi.store');

Route::post('/dokumentasi/add-gambar', [DetailDokumentasi::class, 'store'])->name('dokumentasi.gambar');
Route::get('/dokumentasi/{id}', [DetailDokumentasiController::class, 'index'])->name('detail.dokumentasi');

require __DIR__ . '/auth.php';