<?php

use App\Http\Middleware\Authenticate;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PublicController;

Route::middleware([RedirectIfAuthenticated::class])->group(function () {
    Route::get('/', [PublicController::class, 'portal'])->name('portal');
    Route::get('/loginUser', [PublicController::class, 'loginPortal'])->name('loginPortal');
    Route::post('/loginPost', [PublicController::class, 'postLogin'])->name('postLogin');
    Route::get('/registerUser', [PublicController::class, 'registerPortal'])->name('registerPortal');
    Route::post('/registerUser', [PublicController::class, 'postRegister'])->name('postRegister');
});

Route::middleware([Authenticate::class])->group(function () {
    Route::get('/home', [PublicController::class, 'home'])->name('home');
    Route::get('/profile', [PublicController::class, 'profile'])->name('profile');
    Route::get('/pelayanan', [PublicController::class, 'services'])->name('pelayanan');
    Route::get('/berita', [PublicController::class, 'news'])->name('berita');
    Route::get('/berita/{id}', [PublicController::class, 'newsDetail'])->name('berita.detail');
    Route::get('/kontak', [PublicController::class, 'contact'])->name('kontak');
    Route::post('/send-email', [PublicController::class, 'sendEmail'])->name('sendEmail');
    Route::post('/logout', [PublicController::class, 'logout'])->name('logout');
});
Route::middleware([AdminMiddleware::class])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/berita', [BeritaController::class, 'index'])->name('admin.berita');
        Route::get('/berita/create', [BeritaController::class, 'create'])->name('admin.berita.create');
        Route::post('/berita', [BeritaController::class, 'store'])->name('admin.berita.store');
        Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('admin.berita.destroy');
    });
});

require __DIR__ . '/auth.php';
