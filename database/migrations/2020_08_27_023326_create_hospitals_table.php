<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('code');
            $table->string('name');
            $table->string('office_address')->nullable();
            $table->string('office_address_2');
            $table->string('office_suburb');
            $table->enum('office_state', ['ACT', 'NSW', 'VIC', 'QLD', 'SA', 'TAS', 'WA', 'NT']);
            $table->string('postal_address');
            $table->string('postal_address_2');
            $table->string('postal_suburb');
            $table->enum('postal_state', ['ACT', 'NSW', 'VIC', 'QLD', 'SA', 'TAS', 'WA', 'NT']);
            $table->string('office_telephone');
            $table->string('office_telephone_2');
            $table->string('office_facsmile');
            $table->string('office_email');
            $table->enum('contact_title', ['Dr', 'Mr', 'Ms', 'Mrs']);
            $table->string('contact_first_name');
            $table->string('contact_last_name');
            $table->string('contact_mobile');
            $table->string('contact_telephone');
            $table->string('contact_facsmile');
            $table->string('website');
            $table->integer('num_rooms');
            $table->boolean('status');
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
        Schema::dropIfExists('hospitals');
    }
}
