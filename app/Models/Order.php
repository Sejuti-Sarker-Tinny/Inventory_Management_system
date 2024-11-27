<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'email', 'product_code', 'product_name', 'quantity', 'order_status',
    ];

    public function medicalProduct()
    {
        return $this->belongsTo(MedicalProduct::class, 'product_code', 'product_code');
    }

    public function bookProduct()
    {
        return $this->belongsTo(BookProduct::class, 'product_code', 'product_code');
    }

    public function electronicProduct()
    {
        return $this->belongsTo(ElectronicProduct::class, 'product_code', 'product_code');
    }
}