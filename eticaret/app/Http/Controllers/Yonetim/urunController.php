<?php

namespace App\Http\Controllers\Yonetim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Urun;

class urunController extends Controller
{
    public function index()
    {

        if (request()->filled('aranan')) {

            request()->flash(); // Bu Komut Arama yaptığımızda en son ne aradıysak inputta kalmasını sağlar
            $aranan = request('aranan');
            $list = Urun::where('urun_adi', 'like', "%$aranan%")
                ->orWhere('aciklama', 'like', "%$aranan%")
                ->orderByDesc('id')
                ->paginate(8)
                ->appends('aranan', $aranan);

        } else {

            $list = Urun::orderByDesc('id')->paginate(8);
        }


        return view('yonetim.urun.index', compact('list'));

    }

    public function form($id = 0)
    {

        $entry = new Urun;
        if ($id > 0) {
            $entry = Urun::find($id);

        }
        return view('yonetim.urun.form', compact('entry'));
    }

    public function kaydet($id = 0)
    {

        $data = request()->only('urun_adi', 'slug', 'aciklama', 'fiyati');
        if (!request()->filled('slug')) {

            $data['slug'] = str_slug(request('urun_adi'));
            request()->merge(['slug' => $data['slug']]);

        }

        $this->validate(request(), [
            'urun_adi' => 'required',
            'fiyati' => 'required',
            'slug' => (request('original_slug') != request('slug') ? 'unique:urun,slug' : '')

        ]);

        $data_detay = request()->only('goster_slider', 'goster_gunun_firsati', 'goster_one_cikan', 'goster_cok_satan', 'goster_indirimli');

        if ($id > 0) {

            $entry = Urun::where('id', $id)->firstOrFail();
            $entry->update($data);

            $entry->detay()->update($data_detay);

        } else {

            $entry = Urun::create($data);
            $entry->detay()->create($data_detay);

        }

        return redirect()
            ->route('yonetim.urun.duzenle', $entry->id)
            ->with('mesaj', ($id > 0 ? 'Güncellendi' : 'Kaydedildi'))
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
