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

/*

Route::get('/', function () {
    return view('welcome');
});

*/

#Bu komut ile tarayıcıya / dan sonra merhaba yazdığımızda istediğimiz metni yazdırabiliyoruz.

Route::get('/merhaba' , function (){

   return "Merhaba!!!";
});

#Json formatında veri gönderme işlemi

Route::get('/api/v3/' , function (){

    return ['mesaj' => 'Merhaba'];
});


#Parametre ile route kullanımı

Route::get('/urun/{urunadi}/{id}',function ($urunadi, $id){

    return "Ürün Adı: $id $urunadi";
});

#######Controller

#Route ile controller kullanımı


Route::get('/' , 'anasayfaController@index');

