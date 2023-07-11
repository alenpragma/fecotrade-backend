<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('user_name');
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->limit(30)->nullable();
            $table->string('country')->limit(30)->nullable();
            $table->string('postal_code')->limit(30)->nullable();
            $table->string('contact')->limit(30)->nullable();
            $table->string('nid_passport')->nullable();
            $table->string('email')->unique();
            $table->datetime('email_verified_at')->nullable();
            $table->string('password');
            $table->string('remember_token')->nullable();
            $table->boolean('sponsor')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
