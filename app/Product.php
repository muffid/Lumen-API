<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Model logic goes here

    protected $table = 'Product';

    protected $fillable = [
        'Nama',
        'Harga',
        'Stok'
    ];
}
