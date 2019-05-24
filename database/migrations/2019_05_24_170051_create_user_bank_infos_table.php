<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBankInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_bank_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('account_number');
            $table->string('name');
            $table->string('email');
            $table->string('document_type');
            $table->string('dni');
            $table->string('bank_name');
            $table->unsignedBigInteger('user_bank_info_id');
            $table->foreign('user_bank_info_id')->references('id')->on('user_extra_infos')->onDelete('cascade');
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
        Schema::dropIfExists('user_bank_infos');
    }
}
