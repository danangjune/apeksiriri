<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FasilitasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgressHarianController;
use App\Http\Controllers\LiveReportController;
use App\Http\Controllers\DataPICController;
use App\Http\Controllers\PesertaApeksiController;


Route::get('/welcome', function () {
    return view('welcome');
});

// ------------------------------------- USER ----------------------------------------------------------

//*************************************** LANDING PAGE *************************************************
Route::controller(LandingController::class)->group(function() {
    Route::get('events-badge', 'getBadgeData')->name('getBadgeData');
    Route::get('events-card', 'getCardData')->name('getCardData');
});

 Route::controller(FasilitasController::class)->group(function() {
        Route::get('/fasilitas-kota', 'fasilitas_kota')->name('fasilitas-kota');
    });

//*************************************** HOME PAGE *************************************************
Route::controller(HomeController::class)->group(function() {
    Route::get('/', 'index')->name('landing');
    Route::get('detil-agenda/{id}', 'detil_agenda')->name('detil_agenda');
    Route::get('/berita/{kategori}', 'berita_bykategori')->name('berita_bykategori');
    Route::post('/feedback', 'store_feedback')->name('feedback.store');
    Route::get('/get-content-hero', 'get_content_hero')->name('get_content_hero');
    Route::get('/standbooth/search', 'searchStandBooth')->name('standbooth.search');
    Route::get('/standbooth', 'detailStandBooth');
});

//*************************************** PESERTA APEKSI PAGE *************************************************    
Route::controller(PesertaApeksiController::class)->group(function(){
    Route::get('detil-peserta/{id}', 'index')->name('detil_peserta');
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //*************************************** ADMIN PAGE *************************************************
    Route::controller(UserController::class)->group(function(){
        Route::get('list-user', 'list_user')->name('list_user');
        Route::get('value-user/{id}', 'value_user')->name('value_user');
        Route::post('update-user', 'update_user')->name('update_user');
        Route::post('change-password', 'changePassword');
    });    

    //*************************************** HOME PAGE *************************************************    
    Route::controller(HomeController::class)->group(function(){
        Route::get('banner-beranda', 'banner_beranda')->name('banner_beranda');
        Route::get('update-status-banner/{status}/{id}', 'update_status_banner')->name('update_status_banner');
        Route::post('upload-banner', 'upload_banner')->name('upload_banner');
        Route::get('arsip-banner', 'arsip_banner')->name('arsip_banner');
        Route::post('/hapus-banner/{id}', 'hapus_banner')->name('hapus_banner');
        Route::get('/list-layanan-digital', 'list_layanan_digital')->name('list_layanan_digital');
        Route::post('/update-layanan-digital', 'update_layanan_digital')->name('update_layanan_digital');
        Route::get('/value-layanan-digital/{id}', 'value_layanan_digital')->name('value_layanan_digital');
        Route::post('/hapus-layanan-digital/{id}', 'hapus_layanan_digital')->name('hapus_layanan_digital');
        Route::get('list-banner-promo', 'list_banner_promo')->name('list_banner_promo');
        Route::post('/hapus-banner-promo/{id}', 'hapus_banner_promo')->name('hapus_banner_promo');
        Route::post('/update-banner-promo', 'update_banner_promo')->name('update_banner_promo');
        Route::get('/value-banner-promo/{id}', 'value_banner_promo')->name('value_banner_promo');
    });
    
    
    //*************************************** FASILITAS PAGE *************************************************    
    Route::controller(FasilitasController::class)->group(function() {
        Route::get('/list-fasilitas', 'list_fasilitas')->name('list_fasilitas');
        Route::get('/form-fasilitas/{id}', 'form_fasilitas')->name('form_fasilitas');   
        Route::post('/update-fasilitas', 'update_fasilitas')->name('update_fasilitas'); 
        Route::post('/hapus-fasilitas/{id}', 'hapus_fasilitas')->name('hapus_fasilitas');
        Route::get('/get-sub-kategori', 'get_sub_kategori')->name('get_sub_kategori');
    });
    

    Route::controller(ProgressHarianController::class)->group(function(){
        Route::get('/rangkaian-acara', 'rangkaianAcara')->name('rangkaian-acara');
        Route::get('/detail-rangkaian-acara/{id}', 'detailRangkaianAcara')->name('detail-rangkaian-acara');
        Route::post('/store-progress', 'storeProgress');
        Route::get('/histori-progress/{id}', 'historiProgress')->name('histori-progress');
        Route::delete('/del-progress/{id}', 'deleteProgress');
        // CRUD Rangkaian Kegiatan
        Route::post('/store-rangkaian-acara', 'storeRangkaianAcara');
        Route::post('/update-rangkaian-acara/{id}', 'updateRangkaianAcara');
        Route::delete('/del-rangkaian-acara/{id}', 'delRangkaianAcara');
        // 
        Route::post('/store-det-rangkaian-acara', 'storeDetailRangkaianAcara');
        Route::post('/update-det-rangkaian-acara/{id}', 'updateDetailRangkaianAcara');
        Route::delete('/del-det-rangkaian-acara/{id}', 'delDetailRangkaianAcara');
    });

    Route::controller(LiveReportController::class)->group(function(){
        Route::get('/live-report', 'liveReport')->name('liveReport');
        Route::post('/live-report', 'store');
    });

    Route::controller(DataPICController::class)->group(function(){
        Route::get('/data-pic', 'dataPIC')->name('data-pic');
        Route::post('/store-pic', 'store');
        Route::post('/update-pic/{id}', 'update');
        Route::delete('/delete-pic/{id}', 'delete');
    });

    Route::get('/get-chart-progress', [DashboardController::class, 'getChartDataJsonAPIProgress']);

});

require __DIR__.'/auth.php';
