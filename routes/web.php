<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\RedirectIfAuthenticated;

Route::middleware([RedirectIfAuthenticated::class])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/information', [HomeController::class, 'information'])->name('informasi');
    Route::get('/tas', [AuthController::class, 'tas'])->name('tas');
    Route::get('/loginWub', [AuthController::class, 'loginWub'])->name('loginWub');
    Route::post('/loginWub', [AuthController::class, 'postLogin'])->name('postLogin');
    Route::get('/registerWub', [AuthController::class, 'registerWub'])->name('registerWub');
    Route::post('/registerWub', [AuthController::class, 'postRegister'])->name('register.store');
    Route::prefix('/admin')->group(function () {
        Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
        Route::post('/login', [AdminController::class, 'login']);
    });
});

Route::middleware([Authenticate::class])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [AuthController::class, 'dashboardWub'])->name('wub.dashboardWub');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/pelatihan', [AuthController::class, 'pelatihan'])->name('wub.pelatihan');
    Route::post('/enroll-course/{index}', [AuthController::class, 'enrollCourse'])->name('wub.enrollCourse');
    Route::get('/pelatihan/{index}', [AuthController::class, 'detailWorkshop'])->name('wub.detailWorkshop');
    Route::post('/sub-materi/{index}', [AuthController::class, 'completeSubMateri'])->name('wub.completeThisTask');
    Route::get('/download-materi/{index}', [AuthController::class, 'downloadFile'])->name('wub.downloadFile');
    Route::get('/absensi', [AuthController::class, 'absensi'])->name('wub.absensi');
    Route::post('/absensi', [AuthController::class, 'submitAbsensi'])->name('wub.submitAbsensi');
});
Route::middleware([AdminMiddleware::class])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/announcements/create', [AdminController::class, 'createAnnouncement'])->name('admin.createAnnouncement');
        Route::post('/announcements', [AdminController::class, 'storeAnnouncement'])->name('admin.storeAnnouncement');
        Route::get('/announcements', [AdminController::class, 'listAnnouncements'])->name('admin.listAnnouncements');
        Route::get('/announcements/{id}/edit', [AdminController::class, 'editAnnouncement'])->name('admin.editAnnouncement');
        Route::put('/announcements/{id}', [AdminController::class, 'updateAnnouncement'])->name('admin.updateAnnouncement');
        Route::delete('admin/announcements/{id}', [AdminController::class, 'deleteAnnouncement'])->name('admin.deleteAnnouncement');
        Route::get('/news/create', [AdminController::class, 'createNews'])->name('admin.createIklan');
        Route::post('/news', [AdminController::class, 'storeNews'])->name('admin.storeNews');
        Route::get('/news', [AdminController::class, 'listNews'])->name('admin.listNews');
        Route::get('/workshop', [AdminController::class, 'listWorkshop'])->name('admin.listWorkshop');
        Route::get('/news/{id}/edit', [AdminController::class, 'editNews'])->name('admin.editNews');
        Route::put('/news/{id}', [AdminController::class, 'updateNews'])->name('admin.updateNews');
        Route::delete('/news/{id}', [AdminController::class, 'deleteNews'])->name('admin.deleteNews');
        Route::get('/pelatihan/create', [AdminController::class, 'createPelatihan'])->name('admin.createPelatihan');
        Route::post('/pelatihan', [AdminController::class, 'storePelatihan'])->name('admin.storePelatihan');
        Route::get('/pelatihan/add-material', [AdminController::class, 'addMaterial'])->name('admin.createMaterial');
        Route::get('/pelatihan/remove-material/{index}', [AdminController::class, 'removeMaterial'])->name('admin.removeMaterial');
        Route::get('/workshop/{index}/edit', [AdminController::class, 'editWorkshop'])->name('admin.editWorkshop');
        Route::post('/workshop/{index}/update', [AdminController::class, 'updateWorkshop'])->name('admin.updateWorkshop');
        Route::post('/workshop/{index}', [AdminController::class, 'deleteWorkshop'])->name('admin.deleteWorkshop');
        Route::get('/pelatihan/add-sub-material/{index}', [AdminController::class, 'addSubMaterial'])->name('admin.addSubMaterial');
        Route::get('/pelatihan/remove-sub-material/{index}/{subIndex}', [AdminController::class, 'removeSubMaterial'])->name('admin.removeSubMaterial');
        Route::get('/materi/create', [AdminController::class, 'createMateri'])->name('admin.createMateri');
        Route::get('/absensi', [AdminController::class, 'listAbsensi'])->name('admin.listAbsensi');
        Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    });
});

require __DIR__ . '/auth.php';
