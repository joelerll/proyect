<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('users')){
            Schema::create('users', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('names');
                $table->string('email')->unique();
                $table->string('password')->nullable();
                $table->string('restore_token')->nullable();
                $table->dateTime('restore_token_date_limit')->nullable();
                $table->unsignedBigInteger('users_types_id');
                $table->foreign('users_types_id')->references('id')->on('users_types')->onDelete('cascade');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
