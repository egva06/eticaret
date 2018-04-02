<?php

namespace App\Http\Controllers\Yonetim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class anasayfaController extends Controller
{
    public function index() {

        return view('yonetim.anasayfa');
    }
}
