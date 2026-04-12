<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
       protected $fillable = [
        'nama_asli',
        'path_file',
        'tipe_file',
        'ukuran',  ];
}
