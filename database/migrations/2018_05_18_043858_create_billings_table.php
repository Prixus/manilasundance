<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->increments('PK_BillingID');
            $table->decimal('Billing_SubTotalDiscount', 15,2);
            $table->decimal('Billing_SubTotal',15,2);
            $table->decimal('Billing_NetTotal',15,2);
            $table->decimal('Billing_AmountPaid',15,2);
            $table->dateTime('Billing_DateTimePaid')->nullable();
            $table->enum('Billing_Status',['Paid','Half Paid','Not Paid']);
            $table->integer('FK_AccountID')->unsigned();
            $table->foreign('FK_AccountID')->references('PK_AccountID')->on('accounts')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('billings');
    }
}
