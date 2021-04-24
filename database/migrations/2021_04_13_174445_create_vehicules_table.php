<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->integer('type');
            $table->string('matriculation');
            $table->date('matriculation_date');
            $table->date('first_circulation_date');
            $table->boolean('is_rentable');
            $table->string('brand');
            $table->string('model');
            $table->string('motorization');
            $table->integer('fuel');
            $table->string('color');
            $table->integer('number_of_places');
            $table->integer('tax_horses');
            $table->string('serial_number');
            $table->float('initial_number_of_km');
            $table->integer('mode_of_aquisition');
            $table->string('key_double_location');
            $table->string('photos')->nullable();
            $table->string('observation')->nullable();
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
        Schema::dropIfExists('vehicules');
    }
}
