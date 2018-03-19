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

Route::get('/' , 'anasayfaController@index')->name('anasayfa');

Route::get('/kategori/{slug_kategoriadi}' , 'kategoriController@index')->name('kategori');
Route::get('/urun/{slug_urunadi}' , 'urunController@index')->name('urun');

Route::post('/ara' , 'urunController@ara')->name('urun_ara');

Route::get('/ara' , 'urunController@ara')->name('urun_ara'); #bu get değerini sayfalamada bir sonraki sayfaya tıkladığımızda gidebilsin diye yazıyoruz.

Route::group(['prefix' => 'sepet' ] , function (){
    Route::get('/' , 'sepetController@index')->name('sepet');
    Route::post('/ekle' , 'sepetController@ekle')->name('sepet.ekle');


});




Route::group(['middleware' => 'auth'], function (){

    Route::get('/odeme' , 'odemeController@index')->name('odeme');
    Route::get('/siparisler' , 'siparisController@index')->name('siparisler');
    Route::get('/siparisler/{id}' , 'siparisController@detay')->name('siparis');

});



Route::group(['prefix'=> 'kullanici'], function (){

    Route::get('/oturumac' , 'kullaniciController@giris_form')->name('kullanici.oturumac');
    Route::post('/oturumac' , 'kullaniciController@giris');
    Route::get('/kaydol' , 'kullaniciController@kaydol_form')->name('kullanici.kaydol');
    Route::get('/aktiflestir/{anahtar}' , 'kullaniciController@aktiflestir')->name('aktiflestir');
    Route::post('/kaydol' , 'kullaniciController@kaydol');
    Route::post('/oturumukapat' , 'kullaniciController@oturumukapat')->name('kullanici.oturumukapat');

});
