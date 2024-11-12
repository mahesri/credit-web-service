<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Routing segiEmpat

Route::get('segi-empat/input', 
[\App\Http\Controllers\SegiEmpatController::class, 'inputSegiEmpat'])->name('segi-empat.inputSegiEmpat');

Route::get('segi-empat/hasil', [\App\Http\Controllers\SegiEmpatController::class, 'hasil'])->name('segi-empat.hasil');

Route::get('segi-empat/inputBalok', 
[\App\Http\Controllers\SegiEmpatController::class, 
'inputBalok' ])->name('segi-empat.inputSegitEmpat');

Route::get('segi-empat/hasilBalok', 
[\App\Http\Controllers\SegiEmpatController::class, 'hasilBalok'])->name('segi-empat.hasilBalok');

// Routing segiTiga

Route::get('segi-tiga/input',
[\App\Http\Controllers\SegiTigaController::class, 'inputSegiTiga'])->name('segi-tiga.inputSegiTiga');

Route::get('segi-tiga/hasil',
[\App\Http\Controllers\SegiTigaController::class, 'hasil'])->name('segi-tiga.hasil');

// Routing segiTiga limas

Route::get('segi-tiga/inputLimas',
[\App\Http\Controllers\SegiTigaController::class, 'inputLimas'])->name('segi-tiga.inputLimas');


Route::get('segi-tiga/hasilLimas',
[\App\Http\Controllers\SegiTigaController::class,
'hasilLimas'])->name('segi-tiga.hasilLimas');

// Belajar konfigurasi View 

// Route::get('propinsi', 
// [\App\Http\Controllers\PropinsiController::class, 'propinsi'])->name('propinsi.propinsi');


use App\Http\Controllers\PropinsiController;

Route::resource('propinsi', PropinsiController::class);

use App\Http\Controllers\KotaController;

Route::resource('kota', KotaController::class);

use \App\Http\Controllers\PinjamanController;
Route::resource('pinjaman', PinjamanController::class);

// Route::get('pinjaman',[PinjamanController::class,'index']);

Route::get('pinjaman/create',[PinjamanController::class,
'create'])->name('pinjaman.create');

Route::get('pinjaman/create',[PinjamanController::class,
'create'])->name('pinjaman.create');

Route::get('pinjaman/angsuran/{id}',[PinjamanController::class,
'angsuran'])->name('pinjaman.angsuran');

Route::get('pinjaman/transAngsuran/{id}',[PinjamanController::class,
'transAngsuran'])->name('pinjaman.transAngsuran');

Route::PUT('pinjaman/storeAngsuran/{id}',[PinjamanController::class,
'storeAngsuran'])->name('pinjaman.storeAngsuran');

