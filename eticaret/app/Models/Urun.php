<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Urun extends Model
{
    protected $table = 'urun';
    protected $guarded = [];


    public function kategoriler() {

        return $this->belongsToMany('App\Models\Kategori' , 'kategori_urun');
        # Kategorilerin modelinde yaptığımız gibi buradada ürünlerdeki kategorileri çekebilcez.



    }


}
