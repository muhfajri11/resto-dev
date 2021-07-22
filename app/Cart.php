<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['is_done', 'fee'];

    public function products(){
        return $this->belongsToMany(Product::class)
                    ->withTimestamps()
                    ->withPivot('id', 'jumlah');
    }
}
