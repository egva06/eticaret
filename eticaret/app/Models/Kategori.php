<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = "kategori"; #Bunu verme sebebimiz sonuna s takısı koyduğundan bulamıyor.

    // protected $fillable = ['kategori_adi' , 'slug']; #Bunu ekleme sebebimiz tinker da create ile ekleme yapabilmek için.

    protected $guarded = []; #bunu eklediğimizde ise tüm alanlara ekleme izni vermiş oluyoruz.

    public function urunler() {

        return $this->belongsToMany('App\Models\urun' , 'kategori_urun');

        #bu kod ile burada kategorinin içerisine ürünleri tanımlayarak doğrudan çekim işlemi yapabilcez.
        #yani burada bir kategori içerisindeki ürünleri çekebilmemizi sağlıyor.

    }

    public function ust_kategori() {

        return $this->belongsTo('App\Models\Kategori' , 'ust_id')->withDefault([
            'kategori_adi' => 'Ana Kategori'

        ]);
    }



}
