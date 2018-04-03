@extends('yonetim.layouts.master')
@section('title' , 'Kullanici')
@section('content')

    <h1 class="sub-header">
        <div class="btn-group pull-right" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-primary">Print</button>
            <button type="button" class="btn btn-primary">Export</button>
        </div>
        Kullanıcı Listesi
    </h1>
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Ad Soyad</th>
                <th>E mail</th>
                <th>Aktif Mi</th>
                <th>Yönetici Mi</th>
                <th>Kayıt Tarihi</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $entry)
            <tr>
                <td>{{ $entry->id }}</td>
                <td>{{ $entry->adsoyad }}</td>
                <td>{{ $entry->email }}</td>
                <td>
                    @if($entry->aktif_mi)
                        <span class="label label-success"> Aktif</span>
                    @else
                        <span class="label label-danger"> Pasif</span>
                    @endif
                </td>
                <td>
                    @if($entry->yonetici_mi)
                        <span class="label label-success"> Evet</span>
                        @else
                        <span class="label label-danger"> Hayır</span>
                    @endif
                </td>
                <td>{{$entry->created_at}}</td>

                <td style="width: 100px">
                    <a href="{{ route('yonetim.kullanici.duzenle' , $entry->id) }}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Düzenle">
                        <span class="fa fa-pencil"></span>
                    </a>
                    <a href="#" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Sil" onclick="return confirm('Emin misiniz?')">
                        <span class="fa fa-trash"></span>
                    </a>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@endsection