<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('PK_PaymentID');
            $table->decimal('Payment_Amount',15,2);
            $table->enum('Payment_Mode',['Cash','Bank','Deposit']);
            $table->dateTime('Payment_DateTime');
            $table->enum('Payment_Status',['Approved','Not Approved', 'Pending for Approval']);
            $table->dateTime('Payment_Deadline')->nullable();
            $table->string('Payment_ImagePath',1028)->nullable();
            $table->char('Payment_AccountNumber',13)->nullable();
            $table->integer('FK_BillingID')->unsigned();
            $table->integer('FK_AccountID')->unsigned();
            $table->foreign('FK_BillingID')->references('PK_BillingID')->on('billings')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('payments');
    }
}
