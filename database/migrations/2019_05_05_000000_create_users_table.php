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
                $table->string('surnames');
                $table->text('description')->nullable();
                $table->string('email')->unique();
                $table->string('password')->nullable();
                $table->string('restore_token')->nullable();
                $table->string('is_verified')->default(false);
                $table->timestamp('restore_token_date_limit')->nullable();
                $table->unsignedBigInteger('user_type_id');
                $table->foreign('user_type_id')->default(2)->references('id')->on('user_types')->onDelete('cascade');
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
