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
    Route::delete('/kaldir/{rowid}' , 'sepetController@kaldir')->name('sepet.kaldir');
    Route::delete('/bosalt' , 'sepetController@bosalt')->name('sepet.bosalt');
    Route::patch('/guncelle/{rowid}' , 'sepetController@guncelle')->name('sepet.guncelle');

});

Route::get('/odeme' , 'odemeController@index')->name('odeme');
Route::post('/odeme' , 'odemeController@odemeyap')->name('odeme.yap');

Route::group(['middleware' => 'auth'], function (){


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

Route::group(['prefix' => 'yonetim' , 'namespace' => 'Yonetim'], function (){
    Route::redirect('/' , 'yonetim/oturumac');
    Route::match(['get' , 'post'],'/oturumac' , 'kullaniciController@oturumac')->name('yonetim.oturumac');

    Route::get('/oturumukapat' , 'kullaniciController@oturumukapat')->name('yonetim.oturumukapat');

    Route::group(['middleware' => 'yonetim' ], function (){
        Route::get('/anasayfa' , 'anasayfaController@index')->name('yonetim.anasayfa');

        Route::group(['prefix' => 'kullanici'] , function (){
           Route::match(['get' , 'post'] , '/' , 'kullaniciController@index')->name('yonetim.kullanici');
           Route::get('/yeni' , 'kullaniciController@form')->name('yonetim.kullanici.yeni');
           Route::get('/duzenle/{id}' , 'kullaniciController@form')->name('yonetim.kullanici.duzenle');
           Route::post('/kaydet/{id?}' , 'kullaniciController@kaydet')->name('yonetim.kullanici.kaydet');
           Route::get('/sil/{id}' , 'kullaniciController@sil')->name('yonetim.kullanici.sil');

        });

        Route::group(['prefix' => 'kategori'] , function (){
            Route::match(['get' , 'post'] , '/' , 'kategoriController@index')->name('yonetim.kategori');
            Route::get('/yeni' , 'kategoriController@form')->name('yonetim.kategori.yeni');
            Route::get('/duzenle/{id}' , 'kategoriController@form')->name('yonetim.kategori.duzenle');
            Route::post('/kaydet/{id?}' , 'kategoriController@kaydet')->name('yonetim.kategori.kaydet');
            Route::get('/sil/{id}' , 'kategoriController@sil')->name('yonetim.kategori.sil');

        });


    });

});
