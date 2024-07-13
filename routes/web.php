<?php

use App\Http\Controllers\Backsite\AgendaController;
use App\Http\Controllers\Backsite\BeritaController;
use App\Http\Controllers\Backsite\BiayaController;
use App\Http\Controllers\Backsite\DashboardController;
use App\Http\Controllers\Backsite\FasilitasController;
use App\Http\Controllers\Backsite\FeedbackController;
use App\Http\Controllers\Backsite\GaleriController;
use App\Http\Controllers\Backsite\JabatanController;
use App\Http\Controllers\Backsite\MuridController;
use App\Http\Controllers\Backsite\PengurusController;
use App\Http\Controllers\Backsite\PermissionController;
use App\Http\Controllers\Backsite\RoleController;
use App\Http\Controllers\Backsite\TransaksiController;
use App\Http\Controllers\Backsite\UserController;
use App\Http\Controllers\Frontsite\AgendaController as FrontsiteAgendaController;
use App\Http\Controllers\Frontsite\BeritaController as FrontsiteBeritaController;
use App\Http\Controllers\Frontsite\FasilitasController as FrontsiteFasilitasController;
use App\Http\Controllers\Frontsite\GaleriController as FrontsiteGaleriController;
use App\Http\Controllers\Frontsite\HomeController;
use App\Http\Controllers\Frontsite\PendaftaranController;
use App\Http\Controllers\Frontsite\PengurusController as FrontsitePengurusController;
use App\Http\Controllers\Frontsite\ProfilController;
use App\Http\Controllers\Frontsite\TransaksiController as FrontsiteTransaksiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Backsite Page Start
Route::group(['prefix' => 'backsite', 'as' => 'backsite.', 'middleware' => ['auth:sanctum', 'verified']], function(){

    // Dasboard Page
    Route::resource('dashboard', DashboardController::class);

    // User Page
    Route::resource('user', UserController::class);

    // Biaya Page
    Route::resource('biaya', BiayaController::class);

    // Jabatan Page
    Route::resource('jabatan', JabatanController::class);

    // Permission Page
    Route::resource('permission', PermissionController::class);

    // Role Page
    Route::resource('role', RoleController::class);

    // Berita Page
    Route::get('berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::post('berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('berita/{berita}', [BeritaController::class, 'show'])->name('berita.show');
    Route::put('berita/{berita}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('berita/{berita}', [BeritaController::class, 'destroy'])->name('berita.destroy');
    Route::get('berita/{berita}/edit', [BeritaController::class, 'edit'])->name('berita.edit');

    // Berita Page
    Route::get('fasilitas', [FasilitasController::class, 'index'])->name('fasilitas.index');
    Route::post('fasilitas', [FasilitasController::class, 'store'])->name('fasilitas.store');
    Route::get('fasilitas/{fasilitas}', [FasilitasController::class, 'show'])->name('fasilitas.show');
    Route::put('fasilitas/{fasilitas}', [FasilitasController::class, 'update'])->name('fasilitas.update');
    Route::delete('fasilitas/{fasilitas}', [FasilitasController::class, 'destroy'])->name('fasilitas.destroy');
    Route::get('fasilitas/{fasilitas}/edit', [FasilitasController::class, 'edit'])->name('fasilitas.edit');

    // Galeri Page
    Route::resource('galeri', GaleriController::class);

    // Murid Page
    Route::resource('murid', MuridController::class);

    // Pengurus Page
    Route::get('pengurus', [PengurusController::class, 'index'])->name('pengurus.index');
    Route::post('pengurus', [PengurusController::class, 'store'])->name('pengurus.store');
    Route::get('pengurus/{pengurus}', [PengurusController::class, 'show'])->name('pengurus.show');
    Route::put('pengurus/{pengurus}', [PengurusController::class, 'update'])->name('pengurus.update');
    Route::delete('pengurus/{pengurus}', [PengurusController::class, 'destroy'])->name('pengurus.destroy');
    Route::get('pengurus/{pengurus}/edit', [PengurusController::class, 'edit'])->name('pengurus.edit');

});
// Backsite Page End

// Frontsite Page Start

// Home
Route::get('/', [HomeController::class, 'index'])->name('index');

// Berita
Route::get('berita', [FrontsiteBeritaController::class, 'index'])->name('berita');

// Fasilitas
Route::get('fasilitas', [FrontsiteFasilitasController::class, 'index'])->name('fasilitas');

// Galeri
Route::get('galeri', [FrontsiteGaleriController::class, 'index'])->name('galeri');

// Profil
Route::get('profil', [ProfilController::class, 'index'])->name('profil');

// Pengurus
Route::get('pengurus', [FrontsitePengurusController::class, 'index'])->name('pengurus');

// Pendaftaran
Route::get('pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran');

// Frontsite Page End
