<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStallsarchivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stallsarchives', function (Blueprint $table) {
            $table->increments('PK_StallArchiveID');
            $table->integer('FK_BillingID')->unsigned();
            $table->integer('FK_StallID');
            $table->foreign('FK_BillingID')->references('PK_BillingID')->on('billings')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('stallsarchives');
    }
}
