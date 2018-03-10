<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

#Bu controller komutu Route dan gelen isteğin ne yapmasını belirtiyor.
class anasayfaController extends Controller
{

   /* public function index() {

        return view('anasayfa');
    }  */

    #View e Dizi değişken gönderimi

    public function index() {

        $isim="ozan";

        #isimler değişkenini viewdeki foreach döngüsü için tanımlıyorum.

        $isimler=['ozan','büşra','ali'];

        $kullanicilar=[
            ['id'=>1 , 'kullanici_adi' => 'ozan'],
            ['id'=>2 , 'kullanici_adi' => 'büşra'],
            ['id'=>3 , 'kullanici_adi' => 'jale'],
            ['id'=>4 , 'kullanici_adi' => 'duygu'],
            ['id'=>5 , 'kullanici_adi' => 'hazal']


        ];

        return view('anasayfa' , compact('isim' ,'isimler' , 'kullanicilar'));

        #return view('anasayfa') -> with(['isim' =>$isim] );
    }





}



