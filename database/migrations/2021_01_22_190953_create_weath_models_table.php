<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeathModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weath_models', function (Blueprint $table) {
            $table->id();
            $table->string('time');
            $table->string('name');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('temp_celsius');
            $table->string('pressure');
            $table->string('humidity');
            $table->string('temp_min');
            $table->string('temp_max');
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
        Schema::dropIfExists('weath_models');
    }
}
