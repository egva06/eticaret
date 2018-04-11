@extends('yonetim.layouts.master')
@section('title' , 'Ürün')
@section('content')




    <form action="{{ route('yonetim.urun.kaydet' , @$entry->id) }}" method="post" enctype="multipart/form-data">
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
                    <textarea type="text" class="form-control" id="aciklama" placeholder="Açıklama"
                              name="aciklama">{{ old('aciklama' , $entry->aciklama) }}</textarea>
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

        <div class="checkbox" style="margin-right: 10px;">
            <label>
                {{-- Hidden input kullanma sebebimiz old ile eski girilen değeri alabilmek için checkboxdan--}}

                <input type="hidden" name="goster_slider" value="0">
                <input type="checkbox" name="goster_slider"
                       value="1" {{old('aktif_mi' ,$entry->detay->goster_slider) ? 'checked' : '' }}> Slider'da Göster
            </label>

            <label>
                {{-- Hidden input kullanma sebebimiz old ile eski girilen değeri alabilmek için checkboxdan--}}

                <input type="hidden" name="goster_gunun_firsati" value="0">
                <input type="checkbox" name="goster_gunun_firsati"
                       value="1" {{old('aktif_mi' ,$entry->detay->goster_gunun_firsati) ? 'checked' : '' }}> Günün
                Fırsatında Göster
            </label>

            <label>
                {{-- Hidden input kullanma sebebimiz old ile eski girilen değeri alabilmek için checkboxdan--}}

                <input type="hidden" name="goster_one_cikan" value="0">
                <input type="checkbox" name="goster_one_cikan"
                       value="1" {{old('aktif_mi' ,$entry->detay->goster_one_cikan) ? 'checked' : '' }}> Öne Çıkanlarda
                Göster
            </label>

            <label>
                {{-- Hidden input kullanma sebebimiz old ile eski girilen değeri alabilmek için checkboxdan--}}

                <input type="hidden" name="goster_cok_satan" value="0">
                <input type="checkbox" name="goster_cok_satan"
                       value="1" {{old('aktif_mi' ,$entry->detay->goster_cok_satan) ? 'checked' : '' }}> Çok Satanlarda
                Göster
            </label>

            <label>
                {{-- Hidden input kullanma sebebimiz old ile eski girilen değeri alabilmek için checkboxdan--}}

                <input type="hidden" name="goster_indirimli" value="0">
                <input type="checkbox" name="goster_indirimli"
                       value="1" {{old('aktif_mi' ,$entry->detay->goster_indirimli) ? 'checked' : '' }}> İndirimli
                Göster
            </label>

        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="kategoriler">Kategoriler</label>
                    <select name="kategoriler[]" class="form-control" id="kategoriler" multiple>
                        @foreach($kategoriler as $kategori)
                            <option value="{{ $kategori->id }}"
                            {{ collect(old('kategoriler' , $urun_kategori))->contains($kategori->id) ? 'selected' : '' }}
                            > {{ $kategori->kategori_adi }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="urun_resmi">Ürün Resmi</label>
            <input type="file" name="urun_resmi" id="urun_resmi">
        </div>


    </form>

@endsection

@section('head')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

@endsection
@section('footer')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
 <script>
     $(function () {
         $('#kategoriler').select2({
             placeholder: 'Lütfen Kategori Seçiniz'
         });
     });
 </script>

@endsection