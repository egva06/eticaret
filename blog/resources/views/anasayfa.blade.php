<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>



    </head>
    <body>
     Merhaba

    {{$isim}}


    <hr>
    <!-- İf Kullanımı !-->
    @if($isim=='ozan')
        Hoşgeldin Ozan!
    @elseif($isim=='büşra')
        Hoşgeldin Büşra!
    @else
        Hoşgeldin...
    @endif
     <hr>


     <!-- Switch Kullanımı !-->
    @switch($isim)

        @case('ozan')
            Hoşgeldin Ozan
        @break

        @case('büşra')
            Hoşgeldin Büşra
        @break

        @default
            Hoşgeldin
     @endswitch
     <hr>


     <!-- Döngülerin Kullanımı !-->

    @for($i=0; $i<10; $i++)
        Döngü Değeri: {{$i}}
    @endfor
     <hr>

    @php
    $i=0;
    @endphp

    @while($i<10)
        Döngü Değeri: {{$i}}
    @php
    $i++;
    @endphp
    @endwhile

     <hr>

    @foreach($isimler as $isim)
        <p>İsim:  {{$isim}}</p>
    @endforeach

     <hr>

    @foreach($kullanicilar as $kullanici)
        @continue($kullanici['id'] == 1) {{-- Burada id si 1 olan kullanıcıyı atlamasını söylüyoruz --}}

        <li> {{$kullanici['kullanici_adi']}} </li>

        @break($kullanici['id']==4) {{-- Burada ise id si 4 olan kullanıcıya kadar döndürüp durduruyoruz --}}



    @endforeach


    <!-- Döngüler Bitiş !-->

    </body>
</html>
