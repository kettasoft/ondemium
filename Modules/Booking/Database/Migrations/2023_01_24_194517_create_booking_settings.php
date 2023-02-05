<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('clinic_id');
            $table->unsignedInteger('user_id');
            $table->date('less_age')->nullable();
            $table->date('older_age')->nullable();
            $table->boolean('is_available')->default(1);
            $table->timestamps();

            // $table->foreign('clinic_id')->references('id')->on('clinics')->onDelete('cascade');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('');
    }
}
