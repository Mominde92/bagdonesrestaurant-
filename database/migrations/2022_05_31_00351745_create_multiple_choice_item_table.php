<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultipleChoiceItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_multiple_choice', function (Blueprint $table) 
        {
            $table->bigInteger('item_id', false, true);

            $table->bigInteger('multiple_choice_id', false, true);
        
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
        
            $table->foreign('multiple_choice_id')->references('id')->on('multiple_choices')->onDelete('cascade');
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
        Schema::dropIfExists('multiple_choice_item');
    }
}
