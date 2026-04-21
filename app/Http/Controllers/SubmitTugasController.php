<?php

namespace App\Http\Controllers;
use App\Events\TugasDikirim; // Pastikan untuk mengimpor event yang telah dibuat

use Illuminate\Http\Request;

class SubmitTugasController extends Controller
{
     public function submit()
    {
        event(new TugasDikirim("Agung", "Machine Learning"));
        return "Tugas berhasil dikirim!";
    }
}
