<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foods = collect([
            [
                "kode" => "K-01",
                "nama" => "Sate Ayam",
                "harga" => 16000,
                "is_ready" => true,
                "is_best" => true,
                "gambar" => "sate-ayam.jpg"
            ], [
                "kode" => "K-02",
                "nama" => "Nasi Goreng Telur",
                "harga" => 14000,
                "is_ready" => true,
                "is_best" => true,
                "gambar" => "nasi-goreng-telor.jpg"
            ], [
                "kode" => "K-03",
                "nama" => "Nasi Rames",
                "harga" => 12000,
                "is_ready" => true,
                "is_best" => true,
                "gambar" => "nasi-rames.jpg"
            ], [
                "kode" => "K-04",
                "nama" => "Mie Ayam Bakso",
                "harga" => 14000,
                "is_ready" => true,
                "is_best" => false,
                "gambar" => "mie-ayam-bakso.jpg"
            ], [
                "kode" => "K-05",
                "nama" => "Mie Goreng",
                "harga" => 13000,
                "is_ready" => true,
                "is_best" => false,
                "gambar" => "mie-goreng.jpg"
            ], [
                "kode" => "K-06",
                "nama" => "Bakso",
                "harga" => 10000,
                "is_ready" => true,
                "is_best" => false,
                "gambar" => "bakso.jpg"
            ], [
                "kode" => "K-07",
                "nama" => "Pangsit 6 pcs",
                "harga" => 5000,
                "is_ready" => true,
                "is_best" => false,
                "gambar" => "pangsit.jpg"
            ], [
                "kode" => "K-08",
                "nama" => "Kentang Goreng",
                "harga" => 5000,
                "is_ready" => true,
                "is_best" => false,
                "gambar" => "kentang-goreng.jpg"
            ], [
                "kode" => "K-09",
                "nama" => "Lontong Opor Ayam",
                "harga" => 18000,
                "is_ready" => true,
                "is_best" => false,
                "gambar" => "lontong-opor-ayam.jpg"
            ]
        ]);

        $foods->each(function($food){
           \App\Product::create([
               'kode' => $food['kode'],
               'nama' => $food['nama'],
               'harga' => $food['harga'],
               'is_ready' => $food['is_ready'],
               'is_best' => $food['is_best'],
               'gambar' => $food['gambar']
           ]);
        });
    }
}
