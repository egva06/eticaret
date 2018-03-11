<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class siparisController extends Controller
{
    public function index() {

        return view('siparisler');
    }
}
