<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('hiv_clinic_no')->unique();
            $table->string('family_name');
            $table->string('given_name');
            $table->enum('gender', ['M', 'F']);
            $table->string('hiv_viral_load_date')->nullable();
            $table->string('return_visit_date')->nullable();
            $table->string('telephone_number')->nullable();
            $table->string('care_giver_telephone_number')->nullable();
            $table->string('facilities')->nullable();
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
        Schema::dropIfExists('clients');
    }
};
