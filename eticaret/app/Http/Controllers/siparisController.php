<?php

namespace App\Http\Controllers;

use App\Models\Siparis;
use Illuminate\Http\Request;

class siparisController extends Controller
{
    public function index() {

        $siparisler=Siparis::with('sepet')->orderByDesc('created_at')->get();
        return view('siparisler' , compact('siparisler'));
    }

    public function detay($id) {

        return view('siparis');
    }
}
