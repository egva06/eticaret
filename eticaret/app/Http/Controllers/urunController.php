<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class urunController extends Controller
{
    public function index($slug_urunadi) {

        return view('urun');
    }
}
