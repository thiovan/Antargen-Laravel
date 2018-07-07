<?php

use Illuminate\Database\Seeder;
use App\Produk;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        // $this->call(UsersTableSeeder::class);
        $jumlah_produk = 10;
        for($i=1; $i<=$jumlah_produk; $i++){
            $produk = new Produk;
            $produk->nama_produk = $faker->name;
            $produk->stok = $faker->numberBetween($min = 10, $max = 1000);
            $produk->harga = $faker->numberBetween($min = 1000, $max = 100000);
            $produk->foto = $faker->image($dir = 'public/foto', $width = 640, $height = 480, 'people');
            $produk->save();
        }
    }
}
