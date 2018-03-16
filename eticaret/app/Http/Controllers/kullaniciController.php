<?php

namespace App\Http\Controllers;

use App\Kullanici;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class kullaniciController extends Controller
{
    public function giris_form() {

        return view('kullanici.oturumac');
    }

    public function kaydol_form() {

        return view('kullanici.kaydol');
    }

    public function kaydol() {

        $kullanici= Kullanici::create([

            'adsoyad'               => request('adsoyad'),
            'email'                 => request('email'),
            'sifre'                 => Hash::make(request('sifre')),
            'aktivasyon_anahtari'   => Str::random(60),
            'aktif_mi'              => 0
             ]);

            auth()->login($kullanici); #Kayıt oluştuğunda otomatik giriş için

            return redirect()->route('anasayfa');

    }

}
