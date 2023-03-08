<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultipleChoiceEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multiple_choice_entries', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('multiple_choice_id', false, true);
            $table->string('name' , 255)->nullable();
            $table->string('name_locale',255)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign("multiple_choice_id")->references("id")->on("multiple_choices");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('multiple_choice_entries');
    }
}
