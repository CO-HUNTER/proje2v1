<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Basket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('basket', function (Blueprint $table) {
            $table->id('basket_id');
            $table->unsignedBigInteger('product');
            $table->foreign('product')->references('product_id')->on('products')->onDelete('cascade');;
            $table->unsignedBigInteger('customer');
            $table->foreign('customer')->references('customer_id')->on('customer')->onDelete('cascade');;
            $table->integer('quanity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
