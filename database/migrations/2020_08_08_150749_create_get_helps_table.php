<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGetHelpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('get_helps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('provide_help_id')->nullable();
            $table->integer('amount');
            $table->integer('profit');
            $table->integer('to_balance');
            $table->integer('added_referral_bonus')->default(0);
            $table->boolean('is_merged')->default(false);
            $table->enum('status', ['pending','cancelled','completed'])->default('pending');
            $table->string('token');
            $table->timestamp('sub_expires_at')->nullable();
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('provide_help_id')->references('id')->on('provide_helps');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('get_helps');
    }
}
