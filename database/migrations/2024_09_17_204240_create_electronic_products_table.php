<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectronicProductsTable extends Migration
{
    public function up()
    {
        Schema::create('electronic_products', function (Blueprint $table) {
            $table->id();
            $table->string('product_code');
            $table->string('name');
            $table->string('category');
            $table->integer('stock');
            $table->decimal('unit_price', 8, 2);
            $table->decimal('sales_unit_price', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('electronic_products');
    }
}