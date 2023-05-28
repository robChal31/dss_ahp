<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\AlternatifDetailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\PerhitunganSubkriteriaController;
use App\Http\Controllers\SubkriteriaController;

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

Route::get('/', [KriteriaController::class, 'index']);
Route::get('/kriteria', [KriteriaController::class, 'index']);

Route::post('/kriteria/store', [KriteriaController::class, 'store']);
Route::put('/kriteria/update', [KriteriaController::class, 'update']);
Route::post('/kriteria/edit', [KriteriaController::class, 'edit']);
Route::delete('/kriteria/destroy', [KriteriaController::class, 'destroy']);

Route::get('/subkriteria', [SubkriteriaController::class, 'index']);
Route::post('/subkriteria/store', [SubkriteriaController::class, 'store']);
Route::get('/subkriteria/edit', [SubkriteriaController::class, 'edit']);
Route::put('/subkriteria/update', [SubkriteriaController::class, 'update']);
Route::delete('/subkriteria/destroy', [SubkriteriaController::class, 'destroy']);

Route::get('/siswa', [AlternatifController::class, 'index']);
Route::post('/siswa/store', [AlternatifController::class, 'store']);
Route::get('/siswa/edit', [AlternatifController::class, 'edit']);
Route::put('/siswa/update', [AlternatifController::class, 'update']);
Route::delete('/siswa/destroy', [AlternatifController::class, 'destroy']);

Route::get('/siswa_detail', [AlternatifDetailController::class, 'index']);
Route::post('/siswa_detail/store', [AlternatifDetailController::class, 'store']);
Route::get('/siswa_detail/edit', [AlternatifDetailController::class, 'edit']);
Route::put('/siswa_detail/update', [AlternatifDetailController::class, 'update']);
Route::delete('/siswa_detail/destroy', [AlternatifDetailController::class, 'destroy']);

Route::get('/perhitungan', [PerhitunganController::class, 'index']);
Route::post('/perhitungan/store', [PerhitunganController::class, 'store']);
Route::get('/perhitungan/hasil', [PerhitunganController::class, 'hasil']);
Route::get('/perhitungan/edit', [PerhitunganController::class, 'edit']);
Route::put('/perhitungan/update', [PerhitunganController::class, 'update']);
Route::delete('/perhitungan/destroy', [PerhitunganController::class, 'destroy']);

Route::get('/perhitungan_subkriteria', [PerhitunganSubkriteriaController::class, 'index']);
Route::get('/perhitungan_subkriteria/matrix', [PerhitunganSubkriteriaController::class, 'matrix']);
Route::get('/perhitungan_subkriteria/hasil', [PerhitunganSubkriteriaController::class, 'hasil']);
Route::get('/perhitungan_subkriteria/alternatif', [PerhitunganSubkriteriaController::class, 'alternatif']);
Route::post('/perhitungan_subkriteria/store', [PerhitunganSubkriteriaController::class, 'store']);
Route::get('/perhitungan_subkriteria/edit', [PerhitunganSubkriteriaController::class, 'edit']);
Route::put('/perhitungan_subkriteria/update', [PerhitunganSubkriteriaController::class, 'update']);
Route::delete('/perhitungan_subkriteria/destroy', [PerhitunganSubkriteriaController::class, 'destroy']);
