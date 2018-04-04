@extends('yonetim.layouts.master')
@section('title' , 'Kullanici')
@section('content')




<form action="{{ route('yonetim.kategori.kaydet' , @$entry->id) }}" method="post">
    {{ csrf_field() }}

    <div class="pull-right">
        <button type="submit" class="btn btn-primary">
            {{ @$entry->id>0 ? "Güncelle" : "Kaydet" }}
        </button>
    </div>

    <h1 class="sub-header">
        Kategori {{ @$entry->id>0 ? "Düzenle" : "Ekle" }}
    </h1>

    @include('layouts.partials.errors')

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="ust_id">Üst Kategori</label>
                <select name="ust_id" id="ust_id" class="form-control">
                    <option value="">Ana Kategori</option>
                    @foreach($kategoriler as $kategori)
                    <option value="{{ $kategori->id }}"> {{ $kategori->kategori_adi }}</option>
                    @endforeach
                </select>
            </div>
        </div>



        <div class="col-md-6">
            <div class="form-group">
                <label for="kategori_adi">Kategori Adı</label>
                <input type="text" class="form-control" id="kategori_adi" placeholder="Kategori Adı" name="kategori_adi" value="{{ old('kategori_adi' , $entry->kategori_adi) }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" id="slug" placeholder="Slug" name="slug" value="{{  old('slug' , $entry->slug) }}">
            </div>
        </div>


    </div>



</form>

@endsection