<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenaltycomittedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penaltycomitteds', function (Blueprint $table) {
            $table->increments('PK_PenaltyCommittedID');
            $table->dateTime('PenaltyCommitted_DateTime');
            $table->integer('FK_BillingID')->unsigned();
            $table->integer('FK_PenaltyID')->unsigned();
            $table->foreign('FK_BillingID')->references('PK_BillingID')->on('billings')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('FK_PenaltyID')->references('PK_PenaltyID')->on('penalties')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('penaltycomitteds');
    }
}
