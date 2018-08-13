<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecurityQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('security_questions', function (Blueprint $table) {
            $table->increments('PK_SecurityID');
            $table->enum('Security_Question',['What is the name of your first dog?','What is the name of your first crush?','At what age did you have your first pet?','What is the full-name of your favorite teacher?']);
            $table->string('Security_Answer',255);
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
        Schema::dropIfExists('security_questions');
    }
}
