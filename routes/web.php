<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;  
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ImageController;


Route::get('/', function () {
    return view('home');
});

Route::get('/mahasiswa', function () {
    return view('mahasiswa');
});

Route::get('/mahasiswa2', [MahasiswaController::class, 'index']);

Route::get('/mahasiswa2/create', [MahasiswaController::class, 'create']);
Route::post('/mahasiswa2/store', [MahasiswaController::class, 'store']);

//crud mahasiswa eloquent
Route::get('/mahasiswa3', [MahasiswaController::class, 'crud']);
Route::get('/mahasiswa3/create2', [MahasiswaController::class, 'create2']);
Route::post('/mahasiswa3/store2', [MahasiswaController::class, 'store2']);
Route::get('/mahasiswa3/edit/{id}', [MahasiswaController::class, 'edit']);
Route::post('/mahasiswa3/update/{id}', [MahasiswaController::class, 'update']);
Route::get('/mahasiswa3/delete/{id}', [MahasiswaController::class, 'destroy']);

//crud mahasiswa query builder 3
Route::get('/mahasiswa4', [MahasiswaController::class, 'crud3']);
//Route::get('/mahasiswa4/create2', [MahasiswaController::class, 'create3']);
Route::post('/mahasiswa4/store4', [MahasiswaController::class, 'store4']);
Route::get('/mahasiswa4/edit/{id}', [MahasiswaController::class, 'edit3']);
Route::post('/mahasiswa4/update/{id}', [MahasiswaController::class, 'update3']);
Route::get('/mahasiswa4/delete/{id}', [MahasiswaController::class, 'destroy3']);


// routes/web.php
Route::get('/files', [FileController::class, 'index'])->name('files.index');
Route::post('/files/upload', [FileController::class, 'upload'])->name('files.upload');
Route::get('/files/download/{id}', [FileController::class, 'download'])->name('files.download');
Route::delete('/files/hapus/{id}', [FileController::class, 'hapus'])->name('files.hapus');

Route::get('/files/cetak-pdf', [FileController::class, 'cetakPdf'])->name('files.cetak-pdf');

Route::get('/images', [ImageController::class, 'index'])->name('images.index');
Route::post('/images/upload', [ImageController::class, 'upload'])->name('images.upload');
Route::delete('/images/hapus/{id}', [ImageController::class, 'hapus'])->name('images.hapus');
?>

