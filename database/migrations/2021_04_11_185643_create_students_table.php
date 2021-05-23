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
            $table->foreignId('slot_id')
                ->nullable()->constrained()
                ->onDelete('set null')
                ->onUpdate('set null');

            $table->string('civility')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birth_date');
            $table->date('enter_date');
            $table->date('leave_date');
            $table->string('photo')->nullable();
            $table->string('observation')->nullable();
            $table->text('specificity')->nullable();
            $table->text('disability')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign('students_slot_id_foreign');
        });
        Schema::dropIfExists('students');
    }
}
