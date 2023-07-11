<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('package_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('package_name');
            $table->float('price', 15, 2)->nullable();
            $table->float('total_roi', 15, 2);
            $table->float('daily_roi', 15, 2);
            $table->integer('validity');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
