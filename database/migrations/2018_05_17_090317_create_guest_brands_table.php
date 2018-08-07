<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_brands', function (Blueprint $table) {
          $table->increments('PK_GuestBrandID');
          $table->string('GuestBrand_Name', 255);
          $table->string('GuestBrand_Description', 1028);
          $table->string('GuestBrand_OwnerName', 255);
          $table->string('GuestBrand_TinNumber', 9);
          $table->string('GuestBrand_Website', 255)->nullable();
          $table->string('GuestBrand_MobileNumber', 11);
          $table->string('GuestBrand_EmailAddress', 255);
          $table->string('GuestBrand_SocialMediaAssets',255);
        
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
        Schema::dropIfExists('guest_brands');
    }
}
