@extends('yonetim.layouts.master')
@section('title' , 'Kullanici')
@section('content')




<form action="{{ route('yonetim.kullanici.kaydet' , @$entry->id) }}" method="post">
    {{ csrf_field() }}

    <div class="pull-right">
        <button type="submit" class="btn btn-primary">
            {{ @$entry->id>0 ? "Güncelle" : "Kaydet" }}
        </button>
    </div>

    <h1 class="sub-header">
        Kullanıcı {{ @$entry->id>0 ? "Düzenle" : "Ekle" }}
    </h1>

    @include('layouts.partials.errors')

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="adsoyad">Ad Soyad</label>
                <input type="text" class="form-control" id="adsoyad" placeholder="Ad Soyad" name="adsoyad" value="{{ old('adsoyad' , $entry->adsoyad) }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="email" class="form-control" id="email" placeholder="E Mail" name="email" value="{{  old('email' , $entry->email) }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sifre">Şifre</label>
                <input type="password" class="form-control" id="sifre"  placeholder="Şifre">
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="adres">Adres</label>
                <input type="text" class="form-control" id="adres" placeholder="Adres" name="adres" value="{{old('adres' ,$entry->detay->adres) }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="telefon">Telefon</label>
                <input type="text" class="form-control" id="telefon" placeholder="Telefon" name="telefon" value="{{ old('telefon' ,$entry->detay->telefon) }}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="ceptelefonu">Cep Telefonu</label>
                <input type="text" class="form-control" id="ceptelefonu" placeholder="Cep Telefon" name="ceptelefonu" value="{{old('ceptelefonu' , $entry->detay->ceptelefonu) }}">
            </div>
        </div>
    </div>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="aktif_mi" value="1" {{old('aktif_mi' ,$entry->aktif_mi) ? 'checked' : '' }}> Aktif Mi
        </label>
    </div>

    <div class="checkbox">
        <label>
            <input type="checkbox" name="yonetici_mi" value="1" {{old('yonetici_mi', $entry->yonetici_mi) ? 'checked' : '' }} > Yönetici Mi
        </label>
    </div>

</form>

@endsection