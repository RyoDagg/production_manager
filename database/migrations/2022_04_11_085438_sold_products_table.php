<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SoldProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sold_products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sale_id');
            $table->unsignedInteger('product_id');
            $table->integer('qty');
            $table->float('price');
            $table->float('total_amount');
            $table->timestamps();
            $table->foreign('sale_id')->references('id')->on('sales')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sold_products');
    }
}
