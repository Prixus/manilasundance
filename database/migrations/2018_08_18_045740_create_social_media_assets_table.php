<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialMediaAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_media_assets', function (Blueprint $table) {
            $table->increments('PK_SocialMediaAssetID');
            $table->string('SocialMediaAsset_Type',255);
            $table->string('SocialMediaAsset_Info',255)->nullable();
            $table->integer('FK_GuestBrandID')->unsigned();
            $table->foreign('FK_GuestBrandID')->references('PK_GuestBrandID')->on('guest_brands')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('social_media_assets');
    }
}
