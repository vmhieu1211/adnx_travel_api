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
            $table->increments('id');
            $table->string('user_code',255)->unique()->nullable();
            $table->string('full_name',255)->nullable();
            $table->string('username',255)->unique()->nullable();
            $table->string('email',255)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('position_id')->unsigned()->nullable();
            $table->integer('department_id')->unsigned()->nullable();
            $table->string('phone_number',50)->unique()->nullable();
            $table->string('address',500)->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('passport',50)->nullable();
            $table->tinyInteger('status')->nullable();
            $table->string('api_token')->nullable();
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
