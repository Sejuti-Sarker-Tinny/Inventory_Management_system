<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ElectronicProduct extends Model
{
    protected $fillable = [
        'product_code', 'name', 'category', 'stock', 'unit_price', 'sales_unit_price',
    ];
}