<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->text('name', 255)->nullable();
            $table->text('name_locale', 255)->nullable();
            $table->text('slogan', 255)->nullable();
            $table->text('slogan_locale', 255)->nullable();
            $table->text('location_text')->nullable();
            $table->text('location_text_locale')->nullable();
            $table->text('phone_number')->nullable();
            $table->text('delivery_time_range')->nullable();
            $table->text('image')->nullable();
            $table->text('cover_image')->nullable();
            $table->text('google_map_link')->nullable();     
            $table->boolean('is_open')->nullable();         //boolean 1=open , 0=closed   
            $table->boolean('allow_add_hot_price')->nullable();         //boolean 1=open , 0=closed                     
           //foregine key   
     
            $table->mediumInteger('area_id', false, true)->comment('this is area_id  ');       
            $table->foreign("area_id")->references("id")->on("areas");
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
        Schema::dropIfExists('stores');
    }
}
