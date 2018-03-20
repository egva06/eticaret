<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Sepet extends Model
{
    protected $table= 'sepet';

    protected $guarded = [];

    public function siparis() {

       return $this->hasOne('App\Models\Siparis');

    }

    public static function aktif_sepet_id() {

        $aktif_sepet=DB::table('sepet as s')
            ->leftJoin('siparis as si' , 'si.sepet_id' , '=','s.id')
            ->where('s.kullanici_id', auth()->id())
            ->whereRaw('si.id is null')
            ->orderByDesc('s.created_at')
            ->select('s.id')
            ->first();

            if (!is_null($aktif_sepet)) {
                return $aktif_sepet->id;

            }


    }

}
