<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('buy_product')->nullable();
            $table->unsignedBigInteger('offer_product')->nullable();
            $table->foreign('buy_product')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('offer_product')->references('id')->on('products')->onDelete('cascade');

            $table->integer('buy_amount')->unsigned();
            $table->integer('offer_amount')->unsigned();
            $table->double('offer_percentage', 4, 2);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
