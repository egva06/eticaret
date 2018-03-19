<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siparis extends Model
{
    protected $table = 'siparis';
    protected $fillable= ['sepet_id' , 'siparis_tutari' , 'banka' , 'taksit_sayisi' , 'durum' ,'adsoyad',
     'adres','telefon','ceptelefonu'];

    public function sepet() {

        return $this->belongsTo('App\Models\Sepet');

    }
}
