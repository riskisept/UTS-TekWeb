<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

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
    return view('homepage');
});

Route::get('/main', function () {
    return view('main');
});

Route::get('/databarang', [BarangController::class, 'barang']);

Route::get('/databarang/input', [BarangController::class, 'input']);
Route::post('/databarang', [BarangController::class, 'inputproses']);

Route::get('/databarang/edit/{id}', [BarangController::class, 'edit']);
Route::patch('/databarang/{id}', [BarangController::class, 'editproses']);

Route::delete('/databarang/{id}', [BarangController::class, 'hapus']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('main');
})->name('dashboard');

Route::get('/datapegawai', [BarangController::class, 'pegawai']);
