<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->mediumIncrements('id')->comment("This auto increment column to generate unique id.");
            $table->string('name', 50)->comment('This column help to store city name.');
            $table->string('name_local', 50)->comment('This column help to store city forign name.');
            $table->tinyInteger('country_id', false, true)->comment('This column stores country for the city and references countries table.');          
            $table->foreign('country_id')->references('id')->on('countries');
            $table->unique(['name', 'country_id']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
