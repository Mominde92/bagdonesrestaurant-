<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Items extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('name_locale', 150);
            $table->bigInteger('store_id', false, true);
            $table->bigInteger('sub_category_id', false, true);            
            $table->text('description')->nullable();
            $table->text('description_locale')->nullable();
            $table->text('main_screen_image')->nullable();
            $table->text('cover_image')->nullable();
            $table->text('slider_web')->nullable();
            $table->decimal('price', 8, 2, true)->nullable();
            $table->decimal('new_price', 8, 2, true)->nullable();
            $table->boolean("in_stock")->default(false)->nullable();
            $table->foreign("store_id")->references("id")->on("stores");
            $table->foreign("sub_category_id")->references("id")->on("categories");
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
        Schema::dropIfExists('items');
    }
}
