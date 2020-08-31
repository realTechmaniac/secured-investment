<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipt_uploads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('provide_help_id');
            $table->unsignedBigInteger('get_help_id');
            $table->string('image');
            $table->integer('merge_amount');
            $table->boolean('is_fake')->default(false);
            $table->boolean('is_confirmed')->default(false);
            $table->boolean('action_taken')->default(false);
            $table->string('token');
            $table->timestamp('expires_at');
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
        Schema::dropIfExists('receipt_uploads');
    }
}
