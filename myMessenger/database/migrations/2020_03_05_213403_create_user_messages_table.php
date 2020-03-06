<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
			$table->bigInteger('message_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('message_id')->references('id')->on('messages')->onDelete('cascade')->unique();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->unique();
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_messages');
    }
}
