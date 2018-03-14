<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class anasayfaController extends Controller
{
    public function index() {
        #take ile 8 tane çek diyoruz.
       // $kategoriler = Kategori::all()->take(8); #veritabanındaki verileri değişkene aktarıp aşağıda ise view e yolluyoruz.

       $kategoriler=Kategori::whereRaw('ust_id is null')->take(8)->get();
       #burada ise sadece ana kategorileri listelettik

        return view('anasayfa' , compact('kategoriler'));
    }
}
