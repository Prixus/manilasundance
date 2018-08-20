<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
          $table->increments('PK_AccountID');
          $table->string('Account_UserName',255);
          $table->string('Account_Password',255);
          $table->enum('Account_Status', ['Activated','Deactivated']);
          $table->enum('Account_Rating',['Warning','Normal','Banned']);
          $table->enum('Account_AccessLevel',['Admin','Brand']);
          $table->string('Account_ProfilePicture',1028)->default("profilepicture/profilepicture.jpg");
          $table->integer('FK_GuestBrandID')->unsigned()->nullable();
          $table->foreign('FK_GuestBrandID')->references('PK_GuestBrandID')->on('guest_brands')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('accounts');
    }
}
