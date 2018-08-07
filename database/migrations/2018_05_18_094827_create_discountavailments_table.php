<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountavailmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discountavailments', function (Blueprint $table) {
            $table->increments('PK_DiscountAvailmentID');
            $table->dateTime('PK_DiscountAvailment_DateTime');
            $table->integer('FK_BillingID')->unsigned();
            $table->integer('FK_DiscountID')->unsigned();
            $table->foreign('FK_BillingID')->references('PK_BillingID')->on('billings')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('FK_DiscountID')->references('PK_DiscountID')->on('discounts')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('discountavailments');
    }
}
