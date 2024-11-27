<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookProduct extends Model
{
    protected $fillable = [
        'product_code', 'name', 'category', 'stock', 'unit_price', 'sales_unit_price',
    ];
}