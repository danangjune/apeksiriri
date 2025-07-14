<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PusatKotaController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProgramUnggulanController;
use App\Http\Controllers\PesonaKediriController;
use App\Http\Controllers\PenghargaanController;
use App\Http\Controllers\TentangKediriController;
use App\Http\Controllers\PerangkatDaerahController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArtikelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BeritaApiController;
use App\Http\Controllers\FeedbackController;
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

//*************************************** HOME PAGE *************************************************
Route::controller(HomeController::class)->group(function() {
    Route::get('/', 'index')->name('landing');
    Route::get('detil-agenda/{id}', 'detil_agenda')->name('detil_agenda');
    Route::get('/berita/{kategori}', 'berita_bykategori')->name('berita_bykategori');
    Route::post('/feedback', 'store_feedback')->name('feedback.store');
    Route::get('/get-content-hero', 'get_content_hero')->name('get_content_hero');
});

//*************************************** PESERTA APEKSI PAGE *************************************************    
Route::controller(PesertaApeksiController::class)->group(function(){
    Route::get('detil-peserta/{id}', 'index')->name('detil_peserta');
});

//*************************************** SEARCH PAGE *************************************************
Route::controller(SearchController::class)->group(function() {
    Route::get('/search', 'search')->name('search');
});

//*************************************** BERITA PAGE *************************************************
Route::controller(BeritaController::class)->group(function() {
    Route::get('/berita', 'index')->name('berita');
    Route::get('/berita/{slug}/{id}', 'detail_berita')->name('detail_berita');
    Route::get('/berita-luar/{slug}/{id}', 'detail_berita')->name('detail_berita_luar');
});

//*************************************** GALERI PAGE *************************************************
Route::controller(GaleriController::class)->group(function() {
    Route::get('/galeri', 'galeri')->name('galeri');
});

//*************************************** TENTANG KEDIRI PAGE *************************************************
Route::controller(TentangKediriController::class)->group(function() {
    Route::get('/tentang-kediri/{tab?}', 'tentang_kediri')->name('tentang-kediri');
});

//*************************************** PERANGKAT DAERAH PAGE *************************************************
Route::controller(PerangkatDaerahController::class)->group(function() {
    Route::get('/perangkat-daerah/{slug}', 'perangkat_daerah')->name('perangkat-daerah');
    Route::get('/detail-opd/{id}', 'detil_perangkat_daerah')->name('detil_perangkat_daerah');
});

//*************************************** KELURAHAN PAGE *************************************************
Route::controller(KelurahanController::class)->group(function() {
    Route::get('/kelurahan', 'kelurahan')->name('kelurahan');
    Route::get('/get-kelurahan/{id}', 'get_kelurahan')->name('get_kelurahan');
});

//*************************************** PESONA KEDIRI PAGE *************************************************
Route::controller(PesonaKediriController::class)->group(function() {
    Route::get('/pesona-kediri-raya', 'pesona_kediri_raya')->name('pesona_kediri_raya');
    Route::get('/detil-aset/{id}', 'detil_aset')->name('detil_aset');
    Route::get('/detil-wisata/{slug}/{id}', 'detil_wisata')->name('detil_wisata');
});

//*************************************** FASILITAS PAGE *************************************************
Route::controller(FasilitasController::class)->group(function() {
    Route::get('/fasilitas-kota', 'fasilitas_kota')->name('fasilitas-kota');
});

//*************************************** PENGHARGAAN PAGE *************************************************
Route::controller(PenghargaanController::class)->group(function() {
    Route::get('/penghargaan', 'penghargaan')->name('penghargaan');
    Route::get('/detil-penghargaan/{slug}/{id}', 'detil_penghargaan')->name('detil_penghargaan');
    Route::get('/penghargaan/filter', 'filter_tahun')->name('filter_tahun');
});

//*************************************** PENGUMUMAN PAGE *************************************************
Route::controller(PengumumanController::class)->group(function() {
    Route::get('/pengumuman', 'pengumuman')->name('pengumuman');
    Route::get('/detil-pengumuman/{slug}/{id}', 'detil_pengumuman')->name('detil_pengumuman');
});

//*************************************** DOKUMEN PAGE *************************************************
Route::controller(DokumenController::class)->group(function() {
    Route::get('/dokumen', 'dokumen')->name('dokumen');
    Route::get('/dokumen/{fileName}', 'download_dokumen')->name('download_dokumen');
});

//*************************************** VIDEO PAGE *************************************************
Route::controller(VideoController::class)->group(function() {
    Route::get('/video', 'video')->name('video');
});

//*************************************** LAYANAN PAGE *************************************************
Route::controller(LayananController::class)->group(function() {
    Route::get('/layanan-publik', 'layanan_publik')->name('layanan_publik');
});

//*************************************** ARTIKEL PAGE *************************************************
Route::controller(ArtikelController::class)->group(function() {
    Route::get('/artikel', 'artikel')->name('artikel');
    Route::get('/artikel/{slug}/{id}', 'detail_artikel')->name('detail_artikel');
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

    //*************************************** LANDING PAGE *************************************************    
    Route::controller(LandingController::class)->group(function(){
        // LAYANAN TERPADU
        Route::get('layanan-terpadu', 'layanan_terpadu')->name('layanan_terpadu');
        Route::post('banner-layanan', 'banner_layanan')->name('banner_layanan');
        Route::get('value-banner-layanan/{id}', 'value_banner_layanan')->name('value_banner_layanan');
        Route::post('arsip-banner-layanan/{id}', 'arsip_banner_layanan')->name('arsip_banner_layanan');
        Route::get('list-arsip-banner-layanan', 'list_arsip_banner_layanan')->name('list_arsip_banner_layanan');
        Route::post('hapus-banner-layanan/{id}', 'hapus_banner_layanan')->name('hapus_banner_layanan');
    
        // KALENDER ACARA
        Route::get('kalender-acara', 'kalender_acara')->name('kalender_acara');
        Route::get('form-kalender-acara/{id}', 'form_kalender_acara')->name('form_kalender_acara');
        Route::post('update-kalender-acara', 'update_kalender_acara')->name('update_kalender_acara');
        Route::post('hapus-kalender-acara/{id}', 'hapus_kalender_acara')->name('hapus_kalender_acara');
        Route::get('get-acara-details', 'get_acara_details')->name('get_acara_details');
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
    
    //*************************************** BERITA PAGE *************************************************    
    Route::controller(BeritaController::class)->group(function(){
        Route::get('/list-kategori-berita', 'list_kategori_berita')->name('list_kategori');
        Route::post('/update-kategori', 'update_kategori')->name('update_kategori');
        Route::get('/valuekategori/{id}', 'valuekategori')->name('valuekategori');
        Route::post('/hapus-kategori/{id}', 'hapus_kategori')->name('hapus_kategori');
        Route::get('/form-berita/{id}', 'form_berita')->name('form_berita');
        Route::post('update-berita', 'update_berita')->name('update_berita');
        Route::get('/list-berita', 'list_berita')->name('list_berita');
        Route::post('/hapus-berita/{id}', 'hapus_berita')->name('hapus_berita');
        Route::get('/update-status-berita/{status}/{id}', 'update_status_berita')->name('update_status_berita');
        Route::get('/list-berita-luar', 'list_berita_luar')->name('list_berita_luar');
        Route::get('/form-berita-luar/{id}', 'form_berita_luar')->name('form_berita_luar');
        Route::post('update-berita-luar', 'update_berita_luar')->name('update_berita_luar');
        Route::get('/update-status-berita-luar/{status}/{id}', 'update_status_berita_luar')->name('update_status_berita_luar');
        Route::post('/hapus-berita-luar/{id}', 'hapus_berita_luar')->name('hapus_berita_luar');
    });

    //*************************************** GALERI PAGE *************************************************    
    Route::controller(GaleriController::class)->group(function(){
        Route::get('/list-galeri', 'list_galeri')->name('list_galeri');
        Route::get('/form-galeri/{id}', 'form_galeri')->name('form_galeri');
        Route::get('/data-foto/{id}', 'data_foto')->name('data_foto');
        Route::post('dropzone/store', 'dropzoneStore')->name('dropzone.store');
        Route::post('/update-album', 'update_album')->name('update_album');
        Route::post('/hapus-foto/{id}', 'hapus_foto')->name('hapus_foto');
        Route::post('/hapus-album/{id}', 'hapus_album')->name('hapus_album');
    });
    
    //*************************************** PROFIL PAGE *************************************************    
    Route::controller(ProfilController::class)->group(function() {
        Route::get('/profil-kota-editor/{id}', 'profil_kota_editor')->name('profil_kota_editor');
        Route::get('/deskripsi-kota-editor/{id}', 'deskripsi_kota_editor')->name('deskripsi_kota-editor');
        Route::post('/update-profil-kota', 'update_profil_kota')->name('update_profil_kota');
    });
    
    //*************************************** PERANGKAT DAERAH PAGE *************************************************    
    Route::controller(PerangkatDaerahController::class)->group(function() {
        // OPD
        Route::get('/list-opd', 'list_opd')->name('list_opd');
        Route::get('/form-opd/{id}', 'form_opd')->name('form-opd');
        Route::post('/update-opd', 'update_opd')->name('update_opd');
        Route::post('/hapus-opd/{id}', 'hapus_opd')->name('hapus_opd');
        // Jabatan
        Route::get('/list-jabatan', 'list_jabatan')->name('list_jabatan');
        Route::post('/update-jabatan', 'update_jabatan')->name('update_jabatan');
        Route::get('/value-jabatan/{id}', 'value_jabatan')->name('value_jabatan');
        Route::post('/hapus-jabatan/{id}', 'hapus_jabatan')->name('hapus_jabatan');
        // Kategori OPD
        Route::get('/list-kategori-opd', 'list_kategori_opd')->name('list_kategori_opd');
        Route::post('/update-kategori-opd', 'update_kategori_opd')->name('update_kategori_opd');
        Route::get('/value-kategori-opd/{id}', 'value_kategori_opd')->name('value_kategori_opd');
        Route::post('/hapus-kategori-opd/{id}', 'hapus_kategori_opd')->name('hapus_kategori_opd');
    });
    
    //*************************************** TENTANG KEDIRI PAGE *************************************************    
    Route::controller(TentangKediriController::class)->group(function() {
        // Sejarah
        Route::get('/list-sejarah', 'list_sejarah')->name('list_sejarah');
        Route::post('/update-sejarah', 'update_sejarah')->name('update_sejarah');
        Route::get('/form-sejarah/{id}', 'form_sejarah')->name('form-sejarah');
        Route::post('/hapus-sejarah/{id}', 'hapus_sejarah')->name('hapus_sejarah');
        // Visi Misi
        Route::get('/form-visimisi', 'form_visimisi')->name('form_visimisi');
        Route::post('/update-visimisi', 'update_visimisi')->name('update_visimisi');
        Route::get('/valuemisi/{id}', 'valuemisi')->name('valuemisi');
        Route::post('/hapus-misi/{id}', 'hapus_misi')->name('hapus_misi');
        // Profil Pimpinan
        Route::get('/list-pimpinan', 'list_pimpinan')->name('list_pimpinan');
        Route::get('/form-pimpinan/{id}', 'form_pimpinan')->name('form-pimpinan');
        Route::post('/update-pimpinan', 'update_pimpinan')->name('update_pimpinan');
        Route::post('/hapus-pimpinan/{id}', 'hapus_pimpinan')->name('hapus_pimpinan');
    });

    //*************************************** KELURAHAN PAGE *************************************************    
    Route::controller(KelurahanController::class)->group(function() {
        Route::post('/update-kelurahan', 'update_kelurahan')->name('update_kelurahan');
        Route::get('/list-kelurahan', 'list_kelurahan')->name('list_kelurahan');
        Route::get('/value-kelurahan/{id}', 'value_kelurahan')->name('value_kelurahan');
        Route::get('/sync-kelurahan', 'sync_kelurahan')->name('sync_kelurahan');
        Route::get('/sync-kecamatan', 'sync_kecamatan')->name('sync_kecamatan');
    });
    
    //*************************************** FASILITAS PAGE *************************************************    
    Route::controller(FasilitasController::class)->group(function() {
        Route::get('/list-fasilitas', 'list_fasilitas')->name('list_fasilitas');
        Route::get('/form-fasilitas/{id}', 'form_fasilitas')->name('form_fasilitas');   
        Route::post('/update-fasilitas', 'update_fasilitas')->name('update_fasilitas'); 
        Route::post('/hapus-fasilitas/{id}', 'hapus_fasilitas')->name('hapus_fasilitas');
        Route::get('/get-sub-kategori', 'get_sub_kategori')->name('get_sub_kategori');
    });
    
    //*************************************** PROGRAM UNGGULAN PAGE *************************************************    
    Route::controller(ProgramUnggulanController::class)->group(function() {
        Route::get('/list-program-unggulan', 'list_program_unggulan')->name('list_program_unggulan');
        Route::get('/form-program-unggulan/{id}', 'form_program_unggulan')->name('form-program-unggulan');
        Route::post('/update-program-unggulan', 'update_program_unggulan')->name('update_program_unggulan');
        Route::post('/hapus-program-unggulan/{id}', 'hapus_program_unggulan')->name('hapus_program_unggulan');
    });
    
    //*************************************** PESONA KEDIRI PAGE *************************************************    
    Route::controller(PesonaKediriController::class)->group(function() {
        Route::get('/form-pesona-kediri', 'form_pesona_kediri')->name('form_pesona_kediri');
        Route::post('/update-pesona-kediri', 'update_pesona_kediri')->name('update_pesona_kediri');
        Route::get('/ada-apa-kediri', 'ada_apa_kediri')->name('ada_apa_kediri');
        Route::get('/form-ada-apa/{id}', 'form_ada_apa')->name('form_ada_apa');
        Route::post('/update-aset', 'update_aset')->name('update_aset');
        Route::post('/hapus-aset/{id}', 'hapus_aset')->name('hapus_aset');
        Route::get('/list-kategori-aset', 'list_kategori_aset')->name('list_kategori_aset');
        Route::post('/update-kategori-aset', 'update_kategori_aset')->name('update_kategori_aset');
        Route::get('/value-kategori-aset/{id}', 'value_kategori_aset')->name('value_kategori_aset');
        Route::post('/hapus-kategori-aset/{id}', 'hapus_kategori_aset')->name('hapus_kategori_aset');
    });
    
    //*************************************** PENGHARGAAN PAGE *************************************************    
    Route::controller(PenghargaanController::class)->group(function() {
        Route::get('/list-penghargaan', 'list_penghargaan')->name('list_penghargaan');
        Route::get('/form-penghargaan/{id}', 'form_penghargaan')->name('form_penghargaan');
        Route::post('/update-penghargaan', 'update_penghargaan')->name('update_penghargaan');
        Route::post('/hapus-penghargaan/{id}', 'hapus_penghargaan')->name('hapus_penghargaan');
    });
    
    //*************************************** PENGUMUMAN PAGE *************************************************    
    Route::controller(PengumumanController::class)->group(function(){
        Route::get('/list-pengumuman', 'list_pengumuman')->name('list_pengumuman');
        Route::get('/form-pengumuman/{id}', 'form_pengumuman')->name('form_pengumuman');
        Route::post('/update-pengumuman', 'update_pengumuman')->name('update_pengumuman');
        Route::get('/update-status-pengumuman/{status}/{id}', 'update_status_pengumuman')->name('update_status_pengumuman');
        Route::post('/hapus-pengumuman/{id}', 'hapus_pengumuman')->name('hapus_pengumuman');
    });
    
    //*************************************** DOKUMEN PAGE *************************************************    
    Route::controller(DokumenController::class)->group(function(){
        Route::get('/list-dokumen', 'list_dokumen')->name('list_dokumen');
        Route::get('/form-dokumen/{id}', 'form_dokumen')->name('form_dokumen');
        Route::post('/update-dokumen', 'update_dokumen')->name('update_dokumen');
        Route::get('/update-status-dokumen/{status}/{id}', 'update_status_dokumen')->name('update_status_dokumen');
        Route::post('/hapus-dokumen/{id}', 'hapus_dokumen')->name('hapus_dokumen');
    });    

    //*************************************** ARTIKEL PAGE *************************************************    
    Route::controller(ArtikelController::class)->group(function(){
        Route::get('/list-artikel', 'list_artikel')->name('list_artikel');
        Route::get('/form-artikel/{id}', 'form_artikel')->name('form_artikel');
        Route::post('/update-artikel', 'update_artikel')->name('update_artikel');
        Route::get('/update-status-artikel/{status}/{id}', 'update_status_artikel')->name('update_status_artikel');
        Route::post('/hapus-artikel/{id}', 'hapus_artikel')->name('hapus_artikel');
    });

    //*************************************** FEEDBACK PAGE *************************************************    
    Route::controller(FeedbackController::class)->group(function(){
        Route::get('/list-feedback', 'list_feedback')->name('list_feedback');
    });

    Route::controller(ProgressHarianController::class)->group(function(){
        Route::get('/rangkaian-acara', 'rangkaianAcara')->name('rangkaian-acara');
        Route::get('/detail-rangkaian-acara/{id}', 'detailRangkaianAcara')->name('detail-rangkaian-acara');
        Route::post('/store-progress', 'storeProgress');
        Route::get('/histori-progress/{id}', 'historiProgress')->name('histori-progress');
        Route::delete('/del-progress/{id}', 'deleteProgress');
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

});

require __DIR__.'/auth.php';
