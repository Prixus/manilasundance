<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('PK_ProductID');
            $table->decimal('Product_Price',15,2)->nullable();
            $table->string('Product_Name',255);
            $table->integer('FK_GuestBrandID')->unsigned();
            $table->foreign('FK_GuestBrandID')->references('PK_GuestBrandID')->on('guest_brands')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('products');
    }
}
