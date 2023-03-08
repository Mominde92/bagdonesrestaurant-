<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            //order price
            $table->decimal('amount', 14, 2)->unsigned();
            $table->decimal('tax', 14, 2)->unsigned();
            $table->decimal('delivery_fee', 14, 2)->unsigned();
            $table->decimal('total_amount', 14, 2)->unsigned();

            //order status
            $table->boolean('recived')->default(0);
            $table->boolean('in_process')->default(0);
            $table->boolean('in_delivery')->default(0);
            $table->boolean('deliverd')->default(0);

            //customer info           
            $table->mediumInteger('city_id', false, true)->comment('This column stores state for the city and references state table.');
            $table->foreign('city_id')->references('id')->on('cities');
        
           
            $table->mediumInteger('area_id', false, true)->comment('This column stores state for the city and references state table.');
            $table->foreign('area_id')->references('id')->on('areas');
            
            $table->string('street_n')->nullable();
            $table->string('building_n')->nullable();
            $table->string('floor_n')->nullable();
            $table->string('appartment_n')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('gps_link')->nullable();
            $table->string('device_type')->nullable();
            $table->string('device_token')->nullable();
            $table->string('payment_method')->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('orders');
    }
}
