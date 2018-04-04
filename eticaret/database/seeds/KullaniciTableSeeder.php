<?php

use Illuminate\Database\Seeder;
use App\Kullanici;
use App\Models\KullaniciDetay;
class KullaniciTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Kullanici::truncate();
        KullaniciDetay::truncate();

        $kullanici_yonetici = Kullanici::create([
            'adsoyad' => 'Ozan Aldemir',
            'email' => 'fearfelix@yandex.com',
            'sifre' => bcrypt('4151741'),
            'aktif_mi' => 1,
            'yonetici_mi' => 1

        ]);

        $kullanici_yonetici->detay()->create([
            'adres' => 'Ankara',
            'telefon' => '312 323 32 32',
            'ceptelefonu' => '535 543 32 12'
        ]);

        for ($i=0; $i<50; $i++) {

            $kullanici_musteri = Kullanici::create([
                'adsoyad' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'sifre' => bcrypt('123456'),
                'aktif_mi' => 1,
                'yonetici_mi' => 0
            ]);

            $kullanici_musteri->detay()->create([
                'adres' => $faker->address,
                'telefon' => $faker->e164PhoneNumber,
                'ceptelefonu' => $faker->e164PhoneNumber,

            ]);

        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
