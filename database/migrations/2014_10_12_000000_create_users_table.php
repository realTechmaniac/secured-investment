<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number')->unique();
            $table->string('username')->unique();
            $table->boolean('is_activated')->default(false);
            $table->boolean('is_blocked')->default(false);
            $table->boolean('is_guider')->default(false);
            $table->string('gender');
            $table->string('token')->unique();
            $table->string('misc_token')->nullable();
            $table->integer('read_news')->default(0);
            $table->integer('read_messages')->default(0);
            $table->bigInteger('referred_from_id')->nullable();
            $table->enum('activation', ['first','subsequent'])->default('first');
            $table->enum('role', ['ceo','manager','admin','regular'])->default('regular');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('sub_expires_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
