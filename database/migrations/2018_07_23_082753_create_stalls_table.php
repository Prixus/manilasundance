<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stalls', function (Blueprint $table) {
            $table->increments('PK_StallID');
            $table->enum('Stall_Type',['Regular','Corner','Prime','Food']);
            $table->enum('Stall_Size',['2x3 m','2x2 m']);
            $table->enum('Stall_Status',['Available','Not Available','Reserved','TemporarilyReserved']);
            $table->decimal('Stall_RentalCost',15,2);
            $table->decimal('Stall_BookingCost',15,2);
            $table->integer('FK_ReservationID')->unsigned()->nullable();
            $table->integer('FK_BazaarID')->unsigned();
            $table->foreign('FK_BazaarID')->references('PK_BazaarID')->on('bazaars')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('FK_ReservationID')->references('PK_ReservationID')->on('reservations')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('stalls');
    }
}
