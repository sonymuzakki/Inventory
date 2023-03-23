<?php

use App\Models\Inventory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\InventoryController;

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

Route::get('/users', function () {
    return view('Frontend.index');
})->name('users');

Route::controller(FrontendController::class)->group(function () {
    Route::get('/users', 'index')->name('users')->middleware(['auth','verified']);
    // Route::post('/users-store', 'store')->name('store')->middleware(['auth','verified']);
    Route::post('/request', 'RequestStore')->name('request');
});

// Route::get('/dashboard', function () {
//      return view('admin.index');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout')->middleware(['auth','verified']);
    Route::get('/profile', 'profile')->name('admin.profile')->middleware('role:admin');
    Route::get('/editProfile', 'editProfile')->name('edit.profile')->middleware('role:admin');
    Route::post('/storeProfile', 'storeProfile')->name('store.profile')->middleware('role:admin');
});

Route::controller(InventoryController::class)->group(function () {
    Route::get('/Index','InventarisAll')->name('invetaris.all')->middleware('role:admin');
    Route::get('/Inventaris-Add','InventarisAdd')->name('invetaris.add')->middleware('role:admin');
    Route::post('/Inventaris-store','InventarisStore')->name('invetaris.store')->middleware('role:admin');
    Route::get('/InventarisEdit-{id}','InventarisEdit')->name('inventaris.edit')->middleware('role:admin');
    Route::put('/InventarisUpdate/{id}','InventarisUpdate')->name('inventaris.update')->middleware('role:admin');
    Route::get('/InventarisDelete-{id}','InventarisDelete')->name('invetaris.delete')->middleware('role:admin');
    Route::get('/InventarisDetails-{id}','InventarisDetails')->name('invetaris.details')->middleware('role:admin');
});


    Route::controller(MasterController::class)->group(function () {
    Route::get('/jenis-all', 'jenisAll')->name('jenis.all')->middleware('role:admin');
    Route::get('/jenis-add', 'jenisAdd')->name('jenis.add')->middleware('role:admin');
    Route::post('/jenis-store', 'jenisStore')->name('jenis.store')->middleware('role:admin');
    Route::get('/jenis-delete{id}', 'jenisDelete')->name('jenis.delete')->middleware('role:admin');
    Route::get('/jenis-edit{id}', 'jenisEdit')->name('jenis.edit')->middleware('role:admin');
    Route::post('/jenisUpdate','jenisUpdate')->name('jenis.update')->middleware('role:admin');

    Route::get('/Divisi-All', 'divisiAll')->name('divisi.all')->middleware('role:admin');
    Route::get('/divisi-add', 'divisiAdd')->name('divisi.add')->middleware('role:admin');
    Route::post('/divisi-store', 'divisiStore')->name('divisi.store')->middleware('role:admin');
    Route::get('/divisi-delete{id}', 'divisiDelete')->name('divisi.delete')->middleware('role:admin');
    Route::get('/divisiEdit-{id}','divisiEdit')->name('divisi.edit')->middleware('role:admin');
    Route::post('/divisiUpdate','DivisiUpdate')->name('divisi.update')->middleware('role:admin');

    Route::get('/lokasi-All', 'lokasiAll')->name('lokasi.all')->middleware('role:admin');
    Route::get('/lokasi-add', 'lokasiAdd')->name('lokasi.add')->middleware('role:admin');
    Route::post('/lokasi-store', 'lokasiStore')->name('lokasi.store')->middleware('role:admin');
    Route::get('/lokasi-delete{id}', 'lokasiDelete')->name('lokasi.delete')->middleware('role:admin');
    // Route::get('/lokasiEdit-{id}','lokasiEdit')->name('lokasi.edit')->middleware('role:admin');
    Route::post('/lokasiUpdate','lokasiUpdate')->name('lokasi.update')->middleware('role:admin');
    Route::post('/lokasi-edit-{id}','lokasiEdit')->name('lokasi.edit')->middleware('role:admin');

    Route::get('/user-All', 'userAll')->name('user.all')->middleware('role:admin');
    Route::get('/user-Add', 'userAdd')->name('user.add')->middleware('role:admin');
    Route::post('/user-store', 'userStore')->name('user.store')->middleware('role:admin');
    Route::get('/user-delete{id}', 'userDelete')->name('user.delete')->middleware('role:admin');
    Route::get('/userEdit-{id}','userEdit')->name('user.edit')->middleware('role:admin');
    Route::PUT('/userUpdate','userUpdate')->name('user.update')->middleware('role:admin');
});

Route::controller(HistoryController::class)->group(function () {
    Route::get('/request-all', 'HistoryAll')->name('request.all')->middleware('role:admin');
    Route::get('/request-add', 'RequestAdd')->name('request.add')->middleware('role:admin');
    Route::post('/request-store', 'RequestStore')->name('request.store')->middleware('role:admin');
    Route::get('/request-proses', 'RequestPending')->name('request.pending')->middleware('role:admin');
    Route::get('/history-proses-{id}', 'historyProses')->name('history.proses')->middleware('role:admin');
    Route::PUT('/history-update/{id}', 'historyUpdate')->name('history.update')->middleware('role:admin');
    Route::get('/history-approved-{id}', 'historyApprove')->name('history.approve')->middleware('role:admin');

    Route::get('/history-approved-Dsh/{id}', 'historyApproveDashboard')->name('history.approvedsh')->middleware('role:admin');

    Route::get('/get-jenis/{id}', 'getJenis')->name('getJenis')->middleware('role:admin');
    // Route::get('/proses-all', 'prosesAll')->name('proses.all');
    // Route::get('/proses-add', 'prosesAdd')->name('proses.add');
    // Route::post('/proses-store', 'prosesStore')->name('proses.store');
    // Route::get('/proses-delete{id}', 'prosesDelete')->name('proses.delete');

});

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard')->middleware('role:admin');
});

// Route::post('DivisiUpdate',[MasterController::class,'DivisiUpdate'])->name('divisi.updaten');

// Route::middleware(['auth', 'user-access:user'])->group(function () {
//     Route::get('/profile', [ProfileController::class, 'profile'])->name('admin.profile');
//     Route::get('/editProfile', [ProfileController::class, 'editProfile'])->name('edit.profile');
//     Route::get('/storeProfile', [ProfileController::class, 'storeProfiel'])->name('store.profile');
//     Route::get('/admin/logout', [ProfileController::class, 'destroy'])->name('admin.logout');
// });

require __DIR__.'/auth.php';

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');