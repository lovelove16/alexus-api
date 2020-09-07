<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingCyclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_cycles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('hospital_id');
            $table->uuid('doctor_id');
            $table->uuid('room_id');
            $table->enum('slot', ['AM','PM']);
            $table->uuid('procedure_id');
            $table->boolean('status');
            $table->date('date');
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
        Schema::dropIfExists('booking_cycles');
    }
}
