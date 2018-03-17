<?php

namespace App\Http\Controllers;

use App\Kullanici;
use App\Mail\KullaniciKayitMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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

        $this->validate(request(), [

            'adsoyad' => 'required | min:5 | max:60',
            'email'   => 'required | email | unique:kullanici',
            'sifre'   => 'required | confirmed| min:5 | max:15'
        ]);



        $kullanici= Kullanici::create([

            'adsoyad'               => request('adsoyad'),
            'email'                 => request('email'),
            'sifre'                 => Hash::make(request('sifre')),
            'aktivasyon_anahtari'   => Str::random(60),
            'aktif_mi'              => 0
             ]);

            Mail::to(request('email'))->send(new KullaniciKayitMail($kullanici));
            #Önemli Not: Şimdi mail için env dosyasını falan editlemiştik ya
            #bu edit işleminden sonra tarayıcından hata alırsan
            #php artisan config:clear ve config:cache  diyerek bu sorunu çözebilirsin

            auth()->login($kullanici); #Kayıt oluştuğunda otomatik giriş için

            return redirect()->route('anasayfa');

    }

    public function aktiflestir($anahtar) {

        $kullanici=Kullanici::where('aktivasyon_anahtari' , $anahtar)->first();
        if (!is_null($kullanici)) {

            $kullanici->aktivasyon_anahtari = null;
            $kullanici->aktif_mi = 1;
            $kullanici->save();
            return redirect()->to('/')
                ->with('mesaj' , 'Kullanıcı Kaydınız Aktifleştirildi')
                ->with('mesaj_tur' , 'success');


        } else {

            return redirect()->to('/')
                ->with('mesaj' , 'Kullanıcı Kaydınız Aktifleştirilemedi!')
                ->with('mesaj_tur' , 'danger');

        }


    }



}
