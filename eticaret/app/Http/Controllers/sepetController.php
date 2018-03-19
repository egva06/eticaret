<?php

namespace App\Http\Controllers;

use App\Models\Urun;
use Cart;
use Illuminate\Http\Request;
use Validator;

class sepetController extends Controller
{
    public function index()
    {
        return view('sepet');
    }

    public function ekle() {

        $urun = Urun::find(request('id'));
        Cart::add($urun->id , $urun->urun_adi , 1 , $urun->fiyati, ['slug' => $urun->slug] );

        return redirect()->route('sepet')
            ->with('mesaj_tur' , 'success')
            ->with('mesaj' , 'Ürün Sepete Eklendi');

    }

    public function kaldir($rowid) {

        Cart::remove($rowid);
        return redirect()->route('sepet');

    }

    public function bosalt() {

        Cart::destroy();
        return redirect()->route('sepet');

    }

    public function guncelle($rowid) {

        $validator= Validator::make(request()->all(), [
            'adet' => 'required | numeric | between:1,5'
        ] );

        if ($validator->fails()) {

            session()->flash('mesaj_tur' , 'danger');
            session()->flash('mesaj' , 'Adet Değeri 1 ile 5 Arasında Olmalı!');
            return response()->json(['success' => false]);

        }



        Cart::update($rowid , request('adet'));

        session()->flash('mesaj_tur' , 'success');
        session()->flash('mesaj' , 'Adet bilgisi güncellendi');
        return response()->json(['success' => true]);

    }


}
