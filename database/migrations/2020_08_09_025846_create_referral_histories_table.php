<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferralHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referral_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('referred_user_id');
            $table->unsignedBigInteger('referrer_details_id');
            $table->timestamps();

            $table->foreign('referred_user_id')->references('id')->on('users');
            $table->foreign('referrer_details_id')->references('id')->on('referrer_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referral_histories');
    }
}
