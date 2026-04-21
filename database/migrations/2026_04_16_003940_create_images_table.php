<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
      Schema::create('images', function (Blueprint $table) {
    $table->id();
    $table->string('nama_asli');
    $table->string('path_original');  // file asli
    $table->string('path_resize');    // hasil resize
    $table->string('path_crop');      // hasil crop
    $table->timestamps();
});
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
