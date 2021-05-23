<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlotTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('slot_times', function (Blueprint $table) {
            $table->id();
            $table->foreignId('slot_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('day');
            $table->string('morning_start_at')->nullable();
            $table->string('morning_end_at')->nullable();
            $table->string('after_noon_start_at')->nullable();
            $table->string('after_noon_end_at')->nullable();
            $table->string('note')->nullable();
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
        Schema::table('slot_times', function (Blueprint $table) {
            $table->dropForeign('slot_times_slot_id_foreign');
        });
        Schema::dropIfExists('slot_times');
    }
}
