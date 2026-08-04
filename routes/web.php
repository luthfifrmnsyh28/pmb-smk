<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Artisan;

Route::get('/run-migrate', function () {
    Artisan::call('migrate --force');
    return 'MIGRATION DONE';
});

/*
|--------------------------------------------------------------------------
| Controllers
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PengumumanController;

use App\Http\Controllers\Admin\SettingController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\GelombangController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KategoriGaleriController;
use App\Http\Controllers\KepalaSekolahController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\WebsiteBeritaController;

use App\Http\Controllers\Siswa\PendaftaranController;

/*
|--------------------------------------------------------------------------
| Website
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/berita', [WebsiteBeritaController::class, 'index'])
    ->name('website.berita');

Route::get('/berita/{slug}', [WebsiteBeritaController::class, 'show'])
    ->name('website.berita.show');

/*
|--------------------------------------------------------------------------
| PENGUMUMAN (PUBLIC)
|--------------------------------------------------------------------------
*/

Route::get('/pengumuman', [PengumumanController::class, 'index'])
    ->name('pengumuman');

Route::post('/pengumuman', [PengumumanController::class, 'cek'])
    ->name('pengumuman.cek');

/*
|--------------------------------------------------------------------------
| Authentication Required
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/dashboard-siswa', [DashboardController::class, 'siswa'])
        ->name('dashboard.siswa');

    /*
    |--------------------------------------------------------------------------
    | Master PMB
    |--------------------------------------------------------------------------
    */

    Route::resource('jurusan', JurusanController::class);
    Route::resource('gelombang', GelombangController::class);
    Route::resource('pendaftar', PendaftarController::class);

    /*
    |--------------------------------------------------------------------------
    | Export & Verifikasi
    |--------------------------------------------------------------------------
    */

    Route::get('/pendaftar-export', [PendaftarController::class, 'exportExcel'])
        ->name('pendaftar.export');

    Route::put('/pendaftar/{pendaftar}/terima', [PendaftarController::class, 'terima'])
        ->name('pendaftar.terima');

    Route::put('/pendaftar/{pendaftar}/tolak', [PendaftarController::class, 'tolak'])
        ->name('pendaftar.tolak');

    Route::get('/pendaftar/{pendaftar}/cetak', [PendaftarController::class, 'cetak'])
        ->name('pendaftar.cetak');

    Route::get('/pendaftar/{pendaftar}/kartu', [PendaftarController::class, 'kartu'])
        ->name('pendaftar.kartu');

    /*
    |--------------------------------------------------------------------------
    | Website CMS
    |--------------------------------------------------------------------------
    */

    Route::resource('slider', SliderController::class);

    Route::get('/admin/kepala-sekolah', [KepalaSekolahController::class, 'edit'])
        ->name('kepala-sekolah.edit');

    Route::put('/admin/kepala-sekolah', [KepalaSekolahController::class, 'update'])
        ->name('kepala-sekolah.update');

    Route::resource('visi-misi', VisiMisiController::class)
        ->except(['create', 'store', 'show', 'destroy']);

    Route::resource('guru', GuruController::class);
    Route::resource('kategori-galeri', KategoriGaleriController::class);
    Route::resource('galeri', GaleriController::class);

    Route::resource('admin-berita', BeritaController::class);

    /*
    |--------------------------------------------------------------------------
    | User Management
    |--------------------------------------------------------------------------
    */

    Route::resource('user', UserController::class);

    Route::put('/user/{user}/reset-password', [UserController::class, 'resetPassword'])
        ->name('user.reset-password');

    /*
    |--------------------------------------------------------------------------
    | Pendaftaran Siswa
    |--------------------------------------------------------------------------
    */

    Route::get('/pendaftaran-saya', [PendaftaranController::class, 'index'])
        ->name('pendaftaran.saya');

    Route::post('/pendaftaran-saya', [PendaftaranController::class, 'store'])
        ->name('pendaftaran.store');

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | Website Setting
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/setting', [SettingController::class, 'edit'])
        ->name('setting.edit');

    Route::put('/admin/setting', [SettingController::class, 'update'])
        ->name('setting.update');
});

require __DIR__.'/auth.php';