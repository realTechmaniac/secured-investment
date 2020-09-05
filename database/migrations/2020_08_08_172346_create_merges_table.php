<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMergesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('provide_help_id');
            $table->unsignedBigInteger('get_help_id');
            $table->integer('merge_amount')->nullable();
            $table->boolean('is_confirmed')->default(false);
            $table->boolean('is_failed')->default(false);
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();

            $table->foreign('provide_help_id')->references('id')->on('provide_helps');
            $table->foreign('get_help_id')->references('id')->on('get_helps');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merges');
    }
}
