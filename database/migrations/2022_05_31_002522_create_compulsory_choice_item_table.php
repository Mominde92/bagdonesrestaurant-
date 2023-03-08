<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompulsoryChoiceItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compulsory_choice_item', function (Blueprint $table) {
            $table->bigInteger('item_id', false, true);

            $table->bigInteger('compulsory_choice_id', false, true);
        
            $table->foreign('item_id')->references('id')->on('items')
        
                ->onDelete('cascade');
        
            $table->foreign('compulsory_choice_id')->references('id')->on('compulsory_choices')->onDelete('cascade');
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
        Schema::dropIfExists('compulsory_choice_item');
    }
}
