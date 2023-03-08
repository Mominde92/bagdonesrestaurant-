<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompulsoryChoiceEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compulsory_choice_entries', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('compulsory_choice_id', false, true);
            $table->string('name' , 255)->nullable();
            $table->string('name_locale',255)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign("compulsory_choice_id")->references("id")->on("compulsory_choices");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compulsory_choice_entries');
    }
}
