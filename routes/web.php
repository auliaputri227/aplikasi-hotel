<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\resepsionisController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/index', function () {
//     return view('index');
// });

// Route::get('/fasilitas', function () {
//     return view('fasilitas');
// });

Route::get('/kamars', [GuestController::class, 'kamar'])->name('kamars');
Route::get('/index', [GuestController::class, 'index'])->name('index');
Route::get('/fasilitas', [GuestController::class, 'fasilitas'])->name('fasilitas');
Route::post('reservasi-stores', [GuestController::class, 'stored_reser'])->name('stored_res');
Route::get('detail-reservasi/{id}', [GuestController::class, 'detail_res'])->name('detail-res');
Route::get('/download/{id}', [GuestController::class, 'downloadBukti'])->name('download');


// Route::get('/home', function () {
//     return view('main-template');
// });

// Route::get('/admin', function () {
//     return view('admin.dashboard');
// });

// Route::get('/resepsionis', function () {
//     return view('resepsionis.dashboard');
// });
Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/kamar', [App\Http\Controllers\AdminController::class, 'kamar'])->name('kamar');
Route::get('/kamar/edit/{id}', [adminController::class, 'edit_kamar'])->name('edit_kamar');
Route::post('/kamar/update/{id}', [adminController::class, 'kamar_update'])->name('kamar_update');
Route::get('/kamar/tambah', [adminController::class, 'tambah_kamar'])->name('tambah_kamar');
Route::post('/kamar/stored', [adminController::class, 'kamar_stored'])->name('kamar_stored');
Route::delete('/kamar/delete/{id}', [adminController::class, 'kamar_destroy'])->name('kamar_destroy');

Route::get('/fasilitas-kamar', [App\Http\Controllers\AdminController::class, 'faska'])->name('faska');
Route::get('/fasilitas-kamar/edit/{id}', [App\Http\Controllers\AdminController::class, 'edit_faska'])->name('edit_faska');
Route::post('/fasilitas-kamar/update/{id}', [adminController::class, 'faska_update'])->name('faska_update');
Route::get('/fasilitas-kamar/tambah', [adminController::class, 'faska_tambah'])->name('faska_tambah');
Route::post('/fasilitas-kamar/stored', [adminController::class, 'faska_stored'])->name('faska_stored');
Route::delete('/fasilitas-kamar/delete/{id}', [adminController::class, 'faska_destroy'])->name('faska_destroy');

Route::get('/fasilitas-hotel/edit/{id}', [App\Http\Controllers\AdminController::class, 'edit_fasha'])->name('edit_fasha');
Route::get('/fasilitas-hotel', [App\Http\Controllers\AdminController::class, 'fasha'])->name('fasha');
Route::post('/fasilitas-hotel/update/{id}', [adminController::class, 'fasha_update'])->name('fasha_update');
Route::get('/fasilitas-hotel/tambah', [adminController::class, 'fasha_tambah'])->name('fasha_tambah');
Route::post('/fasilitas-hotel/stored', [adminController::class, 'fasha_stored'])->name('fasha_stored');
Route::delete('/fasilitas-hotel/delete/{id}', [adminController::class, 'fasha_destroy'])->name('fasha_destroy');


Route::get('/daftar-tamu', [ResepsionisController::class, 'daftar'])->name('daftar');
Route::post('/daftar-tamu/check-in/{id}', [ResepsionisController::class, 'checkin'])->name('checkin');
Route::get('/export-pdf',[ResepsionisController::class, 'exportPdf'])->name('export-pdf');
