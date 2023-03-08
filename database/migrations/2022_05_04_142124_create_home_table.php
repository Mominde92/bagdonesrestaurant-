<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id', false, true)->nullable();
            $table->foreign("category_id")->references("id")->on("categories");
            $table->bigInteger('content_type_id', false, true)->nullable();
            $table->foreign("content_type_id")->references("id")->on("content_types");
            $table->bigInteger('sub_category_id', false, true)->nullable();
            $table->foreign("sub_category_id")->references("id")->on("categories");
            $table->bigInteger('item_id', false, true)->nullable();
            $table->bigInteger('offer_id', false, true)->nullable();
            $table->foreign("item_id")->references("id")->on("items");
            $table->bigInteger('appearance_number', false, true)->nullable();
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
        Schema::dropIfExists('home');
    }
}
