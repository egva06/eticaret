<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = "kategori"; #Bunu verme sebebimiz sonuna s takısı koyduğundan bulamıyor.

    // protected $fillable = ['kategori_adi' , 'slug']; #Bunu ekleme sebebimiz tinker da create ile ekleme yapabilmek için.

    protected $guarded = []; #bunu eklediğimizde ise tüm alanlara ekleme izni vermiş oluyoruz.
}
