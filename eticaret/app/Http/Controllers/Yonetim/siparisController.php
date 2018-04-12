<?php

namespace App\Http\Controllers\Yonetim;

use App\Models\Kategori;
use App\Models\UrunDetay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Urun;
use App\Models\Siparis;
class siparisController extends Controller
{
    public function index()
    {

        if (request()->filled('aranan')) {

            request()->flash(); // Bu Komut Arama yaptığımızda en son ne aradıysak inputta kalmasını sağlar
            $aranan = request('aranan');
            $list = Siparis::where('adsoyad', 'like', "%$aranan%")
                ->orWhere('banka', 'like', "%$aranan%")
                ->orderByDesc('id')
                ->paginate(8)
                ->appends('aranan', $aranan);

        } else {

            $list = Siparis::orderByDesc('id')->paginate(8);
        }


        return view('yonetim.siparis.index', compact('list'));

    }

    public function form($id = 0)
    {


        if ($id > 0) {
            $entry = Siparis::with('sepet.sepet_urunler.urun')->find($id);



        }

        return view('yonetim.siparis.form', compact('entry'));
    }

    public function kaydet($id = 0)
    {




        $this->validate(request(), [
            'adsoyad' => 'required',
            'adres' => 'required',
            'telefon' => 'required',
            'ceptelefonu' => 'required',
            'durum' => 'required'

        ]);

        $data = request()->only('adsoyad', 'adres', 'telefon', 'ceptelefonu' , 'durum');


        if ($id > 0) {

            $entry = Siparis::where('id', $id)->firstOrFail();
            $entry->update($data);


        }


        return redirect()
            ->route('yonetim.siparis.duzenle', $entry->id)
            ->with('mesaj', ('Güncellendi'))
            ->with('mesaj_tur', 'success');
    }

    public function sil($id)
    {

        $urun = Urun::find($id);
        $urun->kategoriler()->detach();
        $urun->detay()->delete();
        $urun->delete();

        return redirect()
            ->route('yonetim.urun')
            ->with('mesaj', 'Ürün Silindi')
            ->with('mesaj_tur', 'success');

    }
}
