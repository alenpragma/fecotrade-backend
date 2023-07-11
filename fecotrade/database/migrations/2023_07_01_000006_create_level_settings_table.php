<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('level_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('level_1', 15, 2);
            $table->float('level_2', 15, 2);
            $table->float('level_3', 15, 2);
            $table->float('level_4', 15, 2);
            $table->float('level_5', 15, 2);
            $table->float('level_6', 15, 2);
            $table->float('level_7', 15, 2);
            $table->float('level_8', 15, 2);
            $table->float('level_9', 15, 2);
            $table->float('level_10', 15, 2);
            $table->float('level_11', 15, 2);
            $table->float('level_12', 15, 2);
            $table->float('level_13', 15, 2);
            $table->float('level_14', 15, 2);
            $table->float('level_15', 15, 2);
            $table->float('level_16', 15, 2);
            $table->float('level_17', 15, 2);
            $table->float('level_18', 15, 2);
            $table->float('level_19', 15, 2);
            $table->float('level_20', 15, 2);
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }
}
