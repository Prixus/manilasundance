<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->increments('PK_DiscountID');
            $table->string('Discount_Name',255);
            $table->string('Discount_Requirements', 1028);
            $table->date('Discount_ValidDateEnd');
            $table->time('Discount_ValidTimeEnd');
            $table->date('Discount_ValidDateStart');
            $table->time('Discount_ValidTimeStart');
            $table->decimal('Discount_Amount',15,2);

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
        Schema::dropIfExists('discounts');
    }
}
