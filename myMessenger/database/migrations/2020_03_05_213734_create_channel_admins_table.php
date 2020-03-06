<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChannelAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channel_admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
			$table->bigInteger('channel_id')->unsigned();
            $table->bigInteger('admin_id')->unsigned();
            $table->foreign('channel_id')->references('id')->on('channels')->onDelete('cascade')->unique();
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('channel_admins');
    }
}
