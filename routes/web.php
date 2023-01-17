<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProfileController;
use App\Models\Inventory;

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

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::controller(InventoryController::class)->group(function () {
    Route::get('/Inventaris','InventarisAll')->name('invetaris.all');
    Route::get('/Inventaris-add','InventarisAdd')->name('invetaris.add');
    Route::post('/Inventaris-store','InventarisStore')->name('invetaris.store');
    Route::get('/InventarisEdit-{id}','InventarisEdit')->name('inventaris.edit');
    Route::post('/InventarisUpdate','InventarisUpdate')->name('invetaris.update');
    Route::get('/InventarisDelete-{id}','InventarisDelete')->name('invetaris.delete');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/profile', 'profile')->name('admin.profile');
    Route::get('/editProfile', 'editProfile')->name('edit.profile');
    Route::post('/storeProfile', 'storeProfile')->name('store.profile');
});

// Route::controller(InventoryController::class)->group(function () {
//     Route::get('/form-inventaris', 'formInventaris')->name('form.inventaris');
//     Route::get('/data-inventaris', 'InventoryAll')->name('data.inventaris');
//     Route::get('/add-inventaris', 'InventoryAdd')->name('add.inventaris');
//     Route::post('/store-inventaris', 'StoreInventory ')->name('store.inventaris');
// });

require __DIR__.'/auth.php';