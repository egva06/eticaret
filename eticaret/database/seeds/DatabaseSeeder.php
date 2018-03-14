<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(kategoriTableSeeder::class); #bu kod kategori seeeder dosyamızın çalışması için.
    }
}
