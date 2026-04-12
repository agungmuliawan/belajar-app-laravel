<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();                          // kolom id, auto increment
            $table->string('nama_asli');           // nama file aslinya, misal: foto.jpg
            $table->string('path_file');           // lokasi file di storage
            $table->string('tipe_file', 10);       // ekstensi: jpg, png, pdf
            $table->unsignedBigInteger('ukuran');  // ukuran file dalam bytes
            $table->timestamps();                  // otomatis buat created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('files'); // hapus tabel saat rollback
    }
};