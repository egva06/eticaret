@extends('yonetim.layouts.master')
@section('title' , 'Siparişler')
@section('content')




    <form action="{{ route('yonetim.siparis.kaydet' , @$entry->id) }}" method="post">
        {{ csrf_field() }}

        <div class="pull-right">
            <button type="submit" class="btn btn-primary">
                {{ @$entry->id>0 ? "Güncelle" : "Kaydet" }}
            </button>
        </div>

        <h1 class="sub-header">
            Sipariş {{ @$entry->id>0 ? "Düzenle" : "Ekle" }}
        </h1>

        @include('layouts.partials.errors')


        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="adsoyad">Ad Soyad</label>
                    <input type="text" class="form-control" id="adsoyad" placeholder="Ad Soyad" name="adsoyad"
                           value="{{ old('adsoyad' , $entry->adsoyad) }}">
                </div>
            </div>


            <div class="col-md-4">
                <div class="form-group">
                    <label for="telefon">Telefon</label>

                    <input type="text" class="form-control" id="telefon" placeholder="telefon" name="telefon"
                           value="{{  old('telefon' , $entry->telefon) }}">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="ceptelefonu">Cep Telefon</label>

                    <input type="text" class="form-control" id="ceptelefonu" placeholder="ceptelefonu" name="ceptelefonu"
                           value="{{  old('ceptelefonu' , $entry->ceptelefonu) }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="adres">Adres</label>

                    <input type="text" class="form-control" id="adres" placeholder="adres" name="adres"
                           value="{{  old('adres' , $entry->adres) }}">
                </div>
            </div>
        </div>




        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="durum">Durum</label>
                    <select name="durum" class="form-control" id="durum">


                        <option {{ old('durum' , $entry->durum) == 'Siparişiniz Alındı' ? 'selected' : '' }}>Siparişiniz Alındı</option>
                        <option {{ old('durum' , $entry->durum) == 'Ödeme Onaylandı' ? 'selected' : '' }}>Ödeme Onaylandı</option>
                        <option {{ old('durum' , $entry->durum) == 'Kargoya Verildi' ? 'selected' : '' }}>Kargoya Verildi</option>
                        <option {{ old('durum' , $entry->durum) == 'Sipariş Tamamlandı' ? 'selected' : '' }}>Sipariş Tamamlandı</option>

                    </select>
                </div>
            </div>
        </div>



    </form>

@endsection


