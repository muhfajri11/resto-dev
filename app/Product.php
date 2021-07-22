<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['kode', 'nama', 'harga', 'is_ready', 'is_best', 'gambar'];

    public function carts(){
        return $this->belongsToMany(Cart::class);
    }
}
