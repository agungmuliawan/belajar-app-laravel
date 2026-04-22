<?php

namespace App\Http\Controllers;

use App\Events\TugasDikirim;

class SubmitTugasController extends Controller
{
public function submit()
{
    event(new TugasDikirim("Agung", "Machine Learning"));
    return "OK";
}
}