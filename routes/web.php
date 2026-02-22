<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return view('home');
});

Route::get('/mahasiswa', function () {
    return view('mahasiswa');
});

Route::get('/mahasiswa2', [MahasiswaController::class, 'index']);

Route::get('/mahasiswa2/create', [MahasiswaController::class, 'create']);
Route::post('/mahasiswa2/store', [MahasiswaController::class, 'store']);

//crud mahasiswa
Route::get('/mahasiswa3', [MahasiswaController::class, 'crud']);
Route::get('/mahasiswa3/create2', [MahasiswaController::class, 'create2']);
Route::post('/mahasiswa3/store2', [MahasiswaController::class, 'store2']);
Route::get('/mahasiswa3/edit/{id}', [MahasiswaController::class, 'edit']);
Route::post('/mahasiswa3/update/{id}', [MahasiswaController::class, 'update']);
Route::get('/mahasiswa3/delete/{id}', [MahasiswaController::class, 'destroy']);
?>

