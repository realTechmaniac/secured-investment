<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvideHelpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provide_helps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->integer('amount');
            $table->integer('to_balance');
            $table->boolean('has_expired_merge')->default(false);
            $table->boolean('is_merged')->default(false);
            $table->boolean('is_activation_fee')->default(false);
            $table->boolean('is_withdrawn')->default(false);
            $table->boolean('is_first')->default(false);
            $table->enum('status', ['pending','cancelled','completed'])->default('pending');
            $table->timestamp('available_for_gh_at')->nullable();
            $table->string('token');
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provide_helps');
    }
}
