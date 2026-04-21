<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
      protected $fillable = [
        'nama_asli',
        'path_original',
        'path_resize',
        'path_crop',
    ];
}
