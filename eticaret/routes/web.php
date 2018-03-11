<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('anasayfa');
});

Route::get('/kategori/{slug_kategoriadi}' , 'kategoriController@index')->name('kategori');
Route::get('/urun/{slug_urunadi}' , 'urunController@index')->name('urun');
Route::get('/sepet' , 'sepetController@index')->name('sepet');
Route::get('/odeme' , 'odemeController@index')->name('odeme');
Route::get('/siparisler' , 'siparisController@index')->name('siparisler');
Route::get('/siparisler/{id}' , 'siparisController@detay')->name('siparis');

Route::group(['prefix'=> 'kullanici'], function (){

    Route::get('/oturumac' , 'kullaniciController@giris_form')->name('kullanici.oturumac');
    Route::get('/kaydol' , 'kullaniciController@kaydol_form')->name('kullanici.kaydol');

});
