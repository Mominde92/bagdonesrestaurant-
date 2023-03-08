<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributeItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_item', function (Blueprint $table) {
            // $table->id();
            $table->bigInteger('item_id', false, true);

            $table->bigInteger('attribute_id', false, true);
        
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
        
            $table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade');

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
        Schema::dropIfExists('attribute_item');
    }
}
