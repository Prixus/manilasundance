<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('PK_ReservationID');
            $table->dateTime('Reservation_DateTime');
            $table->integer('FK_BillingID')->unsigned();
            $table->decimal('Reservation_Cost',15,2);
            $table->integer('FK_AccountID')->unsigned()->nullable();
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
        Schema::dropIfExists('reservations');
    }
}
