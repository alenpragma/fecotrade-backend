<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->longText('company_address');
            $table->string('contact_email');
            $table->string('contact_no');
            $table->string('currency_name');
            $table->string('currency_symbol');
            $table->timestamps();
        });
    }
}
