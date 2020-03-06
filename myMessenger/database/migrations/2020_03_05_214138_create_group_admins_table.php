<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
			$table->bigInteger('group_id')->unsigned();
            $table->bigInteger('admin_id')->unsigned();
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade')->unique();
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
        Schema::dropIfExists('group_admins');
    }
}
