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
        Schema::create('sent_sms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client');
            $table->string('sms_last_sent_date')->nullable();
            $table->string('reported_date_after_reminder')->nullable();
            $table->string('sms_send_date')->nullable();
            $table->timestamps();

            $table->foreign('client')->references('id')->on('clients')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sent_sms');
    }
};
