<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

#Bu controller komutu Route dan gelen isteğin ne yapmasını belirtiyor.
class anasayfaController extends Controller
{
    public function index() {

        return view('anasayfa');
    }
}
