<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\Anggota\LAnggotaController;
use App\Http\Controllers\Anggota\LoginAnggotaController;



/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */

Route::prefix('')
    ->group(function () {
        Route::get('/', [App\Http\Controllers\BerandaController::class , 'index'])
            ->name('beranda');
        Route::get('/keanggotaan1', [App\Http\Controllers\AnggotaController::class , 'index'])
            ->name('anggota');
        Route::get('/informasi', [App\Http\Controllers\InformasiController::class , 'index'])
            ->name('informasi');
        Route::get('/showdetail/{id}', '\App\Http\Controllers\DetailBeritaController@showdetail')
            ->name('detail_berita');

        Route::get('/LoginAnggota', [App\Http\Controllers\Anggota\LoginAnggotaController::class , 'index'])
            ->name('LoginAnggota');
        Route::get('/anggota', [LoginAnggotaController::class , 'cekLogin'])
            ->name('pages.anggota.dashboard');

    });


Route::group(['middleware' => ['AuthCheck']], function () {
    Route::get('/anggota', [App\Http\Controllers\Anggota\LoginAnggotaController::class , 'cekLogin'])
        ->name('pages.anggota.dashboard');
    Route::resource('kta_sbu', '\App\Http\Controllers\Anggota\KtaSbuController');
    Route::resource('sbu_konstruksi', '\App\Http\Controllers\Anggota\SbuKonstruksiController');
    Route::resource('sbu_nonkonstruksi', '\App\Http\Controllers\Anggota\SbuNonKonstruksiController');
    Route::resource('pembayaran_kta_sbu', '\App\Http\Controllers\Anggota\PembayaranKtaSbuController');

});
// Route::get('/LoginAnggota', [App\Http\Controllers\Anggota\LoginAnggotaController::class , 'index'])
//     ->name('LoginAnggota');

// Route::prefix('anggota')->name('anggota.')->group(function () {
//     Route::middleware(['guest:anggota'])->group(function () {
//             Route::view('/LoginAnggota', 'pages.anggota.LoginAnggota')->name('LoginAnggota');
//             Route::post('/check', [LAnggotaController::class , 'check'])->name('check');
//         }
//         );
//         Route::middleware(['auth:anggota'])->group(function () {
//             Route::view('/anggota', 'pages.anggota.dashboard')->name('anggota');
//             Route::post('/logout', [LAnggotaController::class , 'logout'])->name('logout');
//         }
//         );
//     });



Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\DashboardController::class , 'index'])
            ->name('dashboard');

        Route::resource('agama', '\App\Http\Controllers\Admin\AgamaController');
        Route::resource('struktur-organisasi', '\App\Http\Controllers\Admin\StrukturOrganisasiController');
        Route::resource('rekening', '\App\Http\Controllers\Admin\RekeningPembayaranController');
        Route::resource('jabatan', '\App\Http\Controllers\Admin\JabatanController');
        Route::resource('data_pengurus', '\App\Http\Controllers\Admin\DataPengurusController');
        Route::resource('foto-pengurus', '\App\Http\Controllers\Admin\FotoPengurusController');
        Route::resource('tentang_kami', '\App\Http\Controllers\Admin\ProfilController');
        Route::resource('berita', '\App\Http\Controllers\Admin\BeritaController');
        Route::resource('agenda', '\App\Http\Controllers\Admin\AgendaController');
        Route::resource('kategori_download', '\App\Http\Controllers\Admin\KategoriDownloadController');
        Route::resource('download', '\App\Http\Controllers\Admin\DownloadController');
        Route::resource('provinsi', '\App\Http\Controllers\Admin\ProvinsiController');
        Route::resource('kota_kabupaten', '\App\Http\Controllers\Admin\KotaKabupatenController');
        Route::resource('Klasifikasi_SBU_Konstruksi', '\App\Http\Controllers\Admin\KlasifikasiSBUKonstruksiController');
        Route::resource('Klasifikasi_SBU_Non_Konstruksi', '\App\Http\Controllers\Admin\KlasifikasiSBUNonKonstruksiController');
        Route::resource('Sub_Klasifikasi_SBU_Konstruksi', '\App\Http\Controllers\Admin\Sub_Klasifikasi_SBU_KonstruksiController');
        Route::resource('SubKlasifikasiSBUNon_Konstruksi', '\App\Http\Controllers\Admin\Sub_Klasifikasi_SBU_Non_KonstruksiController');
        Route::resource('sub_konstruksi', '\App\Http\Controllers\Admin\SubKonstruksiController');
        Route::resource('sub_non_konstruksi', '\App\Http\Controllers\Admin\SubNonKonstruksiController');
        Route::resource('pembayaran_perpanjang_kta', '\App\Http\Controllers\Admin\PembayaranKtaController');
        Route::resource('administrator', '\App\Http\Controllers\Admin\AdministratorController')->middleware(['auth', 'superadmin']);

        Route::resource('data_perusahaan', '\App\Http\Controllers\Admin\DataPerusahaanController');
        Route::get('/data_perusahaan/{id}/editkta', '\App\Http\Controllers\Admin\DataPerusahaanController@editkta')
            ->name('data_perusahaan.editkta');
        Route::put('/updatekta/{id}', '\App\Http\Controllers\Admin\DataPerusahaanController@updatekta')
            ->name('data_perusahaan.updatekta');
        Route::delete('/data_perusahaan/{id}/destroyKta', '\App\Http\Controllers\Admin\DataPerusahaanController@destroyKta')
            ->name('data_perusahaan.destroyKta');

        Route::resource('tambah_kta', '\App\Http\Controllers\Admin\TambahKtaController');

        Route::get('/ubah_password/{id}/editPsw', '\App\Http\Controllers\Admin\ChangePasswordController@index')
            ->name('ubah_password.editPsw');
        Route::put('/ubah_password/{id}', '\App\Http\Controllers\Admin\ChangePasswordController@store')->name('change.password');


    });
Auth::routes();


Route::match (["GET", "POST"], "/register", function () {
    return redirect("/login");
})->name("register");


Route::get('/home', [App\Http\Controllers\HomeController::class , 'index'])->name('home');
Route::get('Ckeditor/upload', [App\Http\Controllers\CkeditorController::class , 'upload'])->name('ckeditor.upload');