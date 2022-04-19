<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengumumenController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix' => 'pengumumen', 'as' => 'pengumumen.'], function(){
    Route::get('/', [PengumumenController::class, 'index'])->name('home');
});
Route::get('/',[pengumumenController::class,'index'])->name('home');
Route::get('/buat',[pengumumenController::class,'create'])->name('pengumuman.tambah-data');
Route::post('/buat-data', [PengumumenController::class, 'store'])->name('pengumuman.buat-data');
Route::get('/edit/{id}', [PengumumenController::class, 'edit'])->name('pengumuman.edit');
Route::post('/update/{id}', [PengumumenController::class, 'update'])->name('pengumuman.update');
Route::delete('/delete/{id}', [PengumumenController::class, 'destroy'])->name('pengumuman.destroy');
Route::get('/detail/{id}', [PengumumenController::class, 'show'])->name('pengumuman.show');