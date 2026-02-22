<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Jalankan saat migrate
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();                    // kolom id auto increment
            $table->string('nama');          // kolom nama
            $table->string('nim')->unique(); // kolom nim, tidak boleh sama
            $table->string('jurusan');       // kolom jurusan
            $table->timestamps();            // kolom created_at & updated_at
        });
    }

    // Jalankan saat migrate:rollback (hapus tabel)
    public function down()
    {
        Schema::dropIfExists('mahasiswas');
    }
};