@extends('yonetim.layouts.master')
@section('title' , 'Sipariş')
@section('content')

    <h1 class="sub-header">Sipariş Listesi</h1>

    <div class="well">
        <div class="btn-group pull-right">

            <a href="{{ route('yonetim.siparis.yeni') }}" class="btn btn-primary">Yeni</a>
        </div>
        <form action="{{ route('yonetim.siparis') }}" method="post" class="form-inline">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="aranan">Ara</label>
                <input type="text" class="form-control form-control-sm" name="aranan" id="aranan" placeholder="Sipariş Ara..." value="{{ old('aranan') }}">

            </div>
            <button type="submit" class="btn btn-primary">Ara</button>
            <a href="{{ route('yonetim.siparis') }}" class="btn btn-primary">Temizle</a>
        </form>

    </div>




    @include('layouts.partials.errors')

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>Sipariş Kodu</th>
                <th>Ad Soyad</th>
                <th>Tutar</th>
                <th>Durum</th>
                <th>Tarih</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $entry)
            <tr>
                <td>SP-{{ $entry->id }}</td>
                <td>{{ $entry->adsoyad }}</td>
                <td>{{ $entry->siparis_tutari * ((100 + config('cart.tax')) / 100) }}₺</td>
                <td>{{ $entry->durum }}</td>
                <td>{{$entry->created_at}}</td>

                <td style="width: 100px">
                    <a href="{{ route('yonetim.siparis.duzenle' , $entry->id) }}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Düzenle">
                        <span class="fa fa-pencil"></span>
                    </a>
                    <a href="{{ route('yonetim.siparis.sil' , $entry->id) }}" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Sil" onclick="return confirm('Emin misiniz?')">
                        <span class="fa fa-trash"></span>
                    </a>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
        {{ $list->links() }}
    </div>

@endsection