<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/information', [HomeController::class, 'information'])->name('informasi');
Route::get('/tas', [AuthController::class, 'tas'])->name('tas');
Route::get('/loginWub', [AuthController::class, 'loginWub'])->name('loginWub');
Route::post('/loginWub', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('/registerWub', [AuthController::class, 'registerWub'])->name('registerWub');
Route::post('/registerWub', [AuthController::class, 'postRegister'])->name('register.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [AuthController::class, 'dashboardWub'])->middleware('auth')->name('wub.dashboardWub');
Route::get('/pelatihan', [AuthController::class, 'pelatihan'])->middleware('auth')->name('wub.pelatihan');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login']);
Route::middleware(['auth:admin', 'check_if_admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/announcements/create', [AdminController::class, 'createAnnouncement'])->name('admin.createAnnouncement');
    Route::post('/announcements', [AdminController::class, 'storeAnnouncement'])->name('admin.storeAnnouncement');
    Route::get('admin/announcements', [AdminController::class, 'listAnnouncements'])->name('admin.listAnnouncements');
    Route::get('admin/announcements/{id}/edit', [AdminController::class, 'editAnnouncement'])->name('admin.editAnnouncement');
    Route::put('admin/announcements/{id}', [AdminController::class, 'updateAnnouncement'])->name('admin.updateAnnouncement');
    Route::delete('admin/announcements/{id}', [AdminController::class, 'deleteAnnouncement'])->name('admin.deleteAnnouncement');
    Route::get('/news/create', [AdminController::class, 'createNews'])->name('admin.createIklan');
    Route::post('/news', [AdminController::class, 'storeNews'])->name('admin.storeNews');
    Route::get('admin/news', [AdminController::class, 'listNews'])->name('admin.listNews');
    Route::get('admin/news/{id}/edit', [AdminController::class, 'editNews'])->name('admin.editNews');
    Route::put('admin/news/{id}', [AdminController::class, 'updateNews'])->name('admin.updateNews');
    Route::delete('admin/news/{id}', [AdminController::class, 'deleteNews'])->name('admin.deleteNews');
    Route::get('/pelatihan/create', [AdminController::class, 'createPelatihan'])->name('admin.createPelatihan');
    Route::get('/materi/create', [AdminController::class, 'createMateri'])->name('admin.createMateri');
    Route::post('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
});

require __DIR__.'/auth.php';
