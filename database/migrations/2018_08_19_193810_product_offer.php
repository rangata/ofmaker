<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductOffer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_offer', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('unitPrice', 8,2);
            $table->decimal('endPrice', 8,2);
            $table->integer('qty');
            $table->decimal('lineTotal');

            $table->unsignedInteger('product_id');
            $table->unsignedInteger('offer_id');

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('offer_id')->references('id')->on('offers')->onDelete('cascade');

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
