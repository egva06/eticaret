<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class anasayfaController extends Controller
{
    public function index() {
        #take ile 8 tane çek diyoruz.
        $kategoriler = Kategori::all()->take(8); #veritabanındaki verileri değişkene aktarıp aşağıda ise view e yolluyoruz.

        return view('anasayfa' , compact('kategoriler'));
    }
}
