<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBazaarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bazaars', function (Blueprint $table) {
            $table->increments('PK_BazaarID');
            $table->string('Bazaar_Name',255);
            $table->enum('Bazaar_Venue',['MegatradeHall','WorldTradeCenter']);
            $table->date('Bazaar_DateStart');
            $table->date('Bazaar_DateEnd');
            $table->time('Bazaar_TimeStart');
            $table->time('Bazaar_TimeEnd');
            $table->enum('Bazaar_Status',['Available','Not Available']);
            $table->string('Bazaar_EventPoster',1028);
            $table->string('Bazaar_Description',1028)->nullable();
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
        Schema::dropIfExists('bazaars');
    }
}
