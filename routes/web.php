<?php

use App\Models\Inventory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\RequestController;

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
    return view('auth.login');
});


Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/profile', 'profile')->name('admin.profile');
    Route::get('/editProfile', 'editProfile')->name('edit.profile');
    Route::post('/storeProfile', 'storeProfile')->name('store.profile');
});

Route::controller(InventoryController::class)->group(function () {
    Route::get('/Inventaris','InventarisAll')->name('invetaris.all');
    Route::get('/Inventaris-add','InventarisAdd')->name('invetaris.add');
    Route::post('/Inventaris-store','InventarisStore')->name('invetaris.store');
    Route::get('/InventarisEdit-{id}','InventarisEdit')->name('inventaris.edit');
    Route::post('/InventarisUpdate','InventarisUpdate')->name('invetaris.update');
    Route::get('/InventarisDelete-{id}','InventarisDelete')->name('invetaris.delete');
    Route::get('/InventarisDetails{id}','InventarisDetails')->name('invetaris.details');

});

    Route::controller(MasterController::class)->group(function () {
    Route::get('/jenis-all', 'jenisAll')->name('jenis.all');
    Route::get('/jenis-add', 'jenisAdd')->name('jenis.add');
    Route::post('/jenis-store', 'jenisStore')->name('jenis.store');
    Route::get('/jenis-delete{id}', 'jenisDelete')->name('jenis.delete');
    Route::get('/jenis-details{id}', 'jenisDetails')->name('jenis.details');


    Route::get('/Divisi-All', 'divisiAll')->name('divisi.all');
    Route::get('/divisi-add', 'divisiAdd')->name('divisi.add');
    Route::post('/divisi-store', 'divisiStore')->name('divisi.store');
    Route::get('/divisi-delete{id}', 'divisiDelete')->name('divisi.delete');
    Route::get('/divisiEdit-{id}','divisiEdit')->name('divisi.edit');
    Route::post('/divisiUpdate{id}','DivisiUpdate')->name('divisi.update');


    Route::get('/lokasi-All', 'lokasiAll')->name('lokasi.all');
    Route::get('/lokasi-add', 'lokasiAdd')->name('lokasi.add');
    Route::post('/lokasi-store', 'lokasiStore')->name('lokasi.store');
    Route::get('/lokasi-delete{id}', 'lokasiDelete')->name('lokasi.delete');
    Route::get('/lokasiEdit-{id}','lokasiEdit')->name('lokasi.edit');
    Route::post('/lokasiUpdate','lokasiUpdate')->name('lokasi.update');

});

Route::controller(HistoryController::class)->group(function () {
    Route::get('/request-all', 'HistoryAll')->name('request.all');
    Route::get('/request-add', 'RequestAdd')->name('request.add');
    Route::post('/request-store', 'RequestStore')->name('request.store');

    Route::get('/proses-all', 'prosesAll')->name('proses.all');
    Route::get('/proses-add', 'prosesAdd')->name('proses.add');
    Route::post('/proses-store', 'prosesStore')->name('proses.store');

});

require __DIR__.'/auth.php';