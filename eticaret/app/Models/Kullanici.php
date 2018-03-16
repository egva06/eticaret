<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Kullanici extends Authenticatable
{
    protected $fillable = [
        'adsoyad', 'email', 'sifre', 'aktivasyon_anahtari','aktif_mi'
    ];

    protected $table = 'kullanici';

    protected $hidden = [
        'sifre', 'aktivasyon_anahtari',
    ];
}
