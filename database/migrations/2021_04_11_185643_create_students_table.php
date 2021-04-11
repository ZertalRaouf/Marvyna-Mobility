<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('civility');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birth_date');
            $table->date('enter_date');
            $table->date('leave_date');
            $table->string('photo');
            $table->string('observation');
            $table->text('specificity');
            $table->text('disability');
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
        Schema::dropIfExists('students');
    }
}
