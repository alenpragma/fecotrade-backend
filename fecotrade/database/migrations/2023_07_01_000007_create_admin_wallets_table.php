<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminWalletsTable extends Migration
{
    public function up()
    {
        Schema::create('admin_wallets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('wallet_name');
            $table->string('wallet_no');
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
