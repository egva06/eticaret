<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Kullanici extends Authenticatable
{
    protected $fillable = [
        'adsoyad', 'email', 'sifre', 'aktivasyon_anahtari','aktif_mi','yonetici_mi'
    ];

    protected $table = 'kullanici';

    protected $hidden = [
        'sifre', 'aktivasyon_anahtari',
    ];

    public function getAuthPassword()
    {
        return $this->sifre;

    }

    public function detay() {

        return $this->hasOne('App\Models\KullaniciDetay');
    }

}
