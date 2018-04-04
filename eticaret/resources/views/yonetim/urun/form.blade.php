@extends('yonetim.layouts.master')
@section('title' , 'Ürün')
@section('content')




    <form action="{{ route('yonetim.urun.kaydet' , @$entry->id) }}" method="post">
        {{ csrf_field() }}

        <div class="pull-right">
            <button type="submit" class="btn btn-primary">
                {{ @$entry->id>0 ? "Güncelle" : "Kaydet" }}
            </button>
        </div>

        <h1 class="sub-header">
            Ürün {{ @$entry->id>0 ? "Düzenle" : "Ekle" }}
        </h1>

        @include('layouts.partials.errors')


        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="urun_adi">Ürün Adı</label>
                    <input type="text" class="form-control" id="urun_adi" placeholder="Ürün Adı" name="urun_adi"
                           value="{{ old('urun_adi' , $entry->urun_adi) }}">
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="hidden" name="original_slug" id="original_slug"
                           value="{{ old('slug' , $entry->slug) }}">
                    <input type="text" class="form-control" id="slug" placeholder="Slug" name="slug"
                           value="{{  old('slug' , $entry->slug) }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="aciklama">Açıklama</label>
                    <textarea type="text" class="form-control" id="aciklama" placeholder="Açıklama" name="aciklama">{{ old('aciklama' , $entry->aciklama) }}</textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fiyati">fiyati</label>
                    <input type="text" class="form-control" id="fiyati" placeholder="Fiyatı" name="fiyati"
                           value="{{ old('fiyati', $entry->fiyati) }}">
                </div>
            </div>
        </div>

    </form>

@endsection