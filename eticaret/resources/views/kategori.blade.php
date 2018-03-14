@extends('layouts.master')
@section('title' , 'Kategori')
@section('content')

    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{route('anasayfa')}}">Anasayfa</a></li>
            <li><a href="#">{{ $kategori->kategori_adi }}</a></li>

        </ol>
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$kategori->kategori_adi}}</div>
                    <div class="panel-body">
                        <h3>Alt Kategoriler</h3>
                        <div class="list-group categories">

                            @foreach($alt_kategoriler as $alt_kategori)
                            <a href="{{ Route('kategori' , $alt_kategori->slug) }}" class="list-group-item">
                                <i class="fa fa-television"></i>
                                {{ $alt_kategori->kategori_adi }}
                            </a>
                            @endforeach
                        </div>
                        <h3>Fiyat Aralığı</h3>
                        <form>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> 100-200
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> 200-300
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="products bg-content">
                    Sırala
                    <a href="#" class="btn btn-default">Çok Satanlar</a>
                    <a href="#" class="btn btn-default">Yeni Ürünler</a>
                    <hr>
                    <div class="row">
                        @if(count($urunler)=='0')
                            <div class="col-md-12">Bu Kategoride Ürün Bulunmamaktadır.</div>
                        @endif

                        @foreach($urunler as $urun)

                        <div class="col-md-3 product">
                            <a href="{{ Route('urun' , $urun->slug)}}"><img src="http://via.placeholder.com/400x400"></a>
                            <p><a href="{{ Route('urun' , $urun->slug)}}">{{ $urun->urun_adi }}</a></p>
                            <p class="price">{{ $urun->fiyati }} ₺</p>
                            <p><a href="#" class="btn btn-theme">Sepete Ekle</a></p>
                        </div>

                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection