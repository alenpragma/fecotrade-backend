<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonusWalletsTable extends Migration
{
    public function up()
    {
        Schema::create('bonus_wallets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user');
            $table->float('amount', 15, 2);
            $table->string('type');
            $table->string('method');
            $table->longText('description')->nullable();
            $table->integer('receiver')->nullable();
            $table->string('received_from')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
