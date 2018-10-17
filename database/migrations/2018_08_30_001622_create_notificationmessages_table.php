<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationmessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificationmessages', function (Blueprint $table) {
            $table->increments('PK_NotificationID');
            $table->string('Notification_Title',50);
            $table->string('Notification_Description',255);
            $table->enum('Notification_Status',['Sent','Not Sent']);
            $table->enum('Notification_State',['opened','not opened']);
            $table->integer('FK_AccountID')->unsigned();
            $table->foreign('FK_AccountID')->references('PK_AccountID')->on('accounts')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('notificationmessages');
    }
}
