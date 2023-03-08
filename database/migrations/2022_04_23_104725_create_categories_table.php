<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->unique()->comment('This column is to store category name.');
            $table->string('name_locale', 255)->unique()->comment('This column is to store category locale name.');            
            $table->bigInteger('parent_id', false, true)->comment('this is parent id ');            
            $table->string('image')->comment('This column is used to store category image.');
            $table->foreign("parent_id")->references("id")->on("categories");
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
        Schema::dropIfExists('categories');
    }
}
