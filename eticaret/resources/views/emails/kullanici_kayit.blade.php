<h1>{{ config('app.name') }}</h1>
<p>Merhaba {{ $kullanici->adsoyad }} Kaydınız Başarıyla Oluşturuldu.</p>
<p>Kaydınızı Aktifleştirmek için <a href="{{ config('app.url') }}/kullanici/aktiflestir/{{ $kullanici->
aktivasyon_anahtari }}">Tıklayın</a></p>