<?php

namespace App\Http\Controllers;

use App\Models\Urun;
use Illuminate\Http\Request;

class urunController extends Controller
{
    public function index($slug_urunadi) {

        $urun= Urun::where('slug' , $slug_urunadi)->firstOrFail();


        return view('urun' , compact('urun'));
    }
}
