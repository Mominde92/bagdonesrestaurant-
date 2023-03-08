<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompulsoryChoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compulsory_choices', function (Blueprint $table) {
            $table->id();
            $table->string('name' , 255)->nullable();
            $table->string('name_locale',255)->nullable();
            $table->text('description')->nullable();
            $table->text('description_locale')->nullable();
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
        Schema::dropIfExists('compulsory_choices');
    }
}
