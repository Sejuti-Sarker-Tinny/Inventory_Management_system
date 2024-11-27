<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookProductsTable extends Migration
{
    public function up()
    {
        Schema::create('book_products', function (Blueprint $table) {
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
        Schema::dropIfExists('book_products');
    }
}