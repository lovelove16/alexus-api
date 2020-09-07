<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('title', ['Dr', 'Miss', 'Mrs', 'Ms', 'Mr']);
            $table->string('office_address');
            $table->string('office_address_2');
            $table->string('office_suburb');
            $table->enum('office_state', ['ACT', 'NSW', 'VIC', 'TAS', 'QLD', 'SA', 'WA', 'NT']);
            $table->string('office_postcode');
            $table->string('postal_address');
            $table->string('postal_address_2');
            $table->string('postal_suburb');
            $table->enum('postal_state', ['ACT', 'NSW', 'VIC', 'QLD', 'SA', 'TAS', 'WA', 'NT']);
            $table->string('postal_post_code');
            $table->string('office_telephone');
            $table->string('office_telephone_2');
            $table->string('office_facsmile');
            $table->string('office_email');
            $table->string('mobile');
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
        Schema::dropIfExists('doctors');
    }
}
