<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinic_user', function (Blueprint $table) {
            $table->unsignedBigInteger('clinic_id');
            $table->unsignedBigInteger('user_id');
            $table->json('permissions')->nullable();
            $table->json('conditions')->nullable();
            $table->json('saturday')->nullable();
            $table->json('sunday')->nullable();
            $table->json('monday')->nullable();
            $table->json('tuesday')->nullable();
            $table->json('wednesday')->nullable();
            $table->json('thursday')->nullable();
            $table->json('friday')->nullable();
            $table->boolean('is_available')->default(1);
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign('clinic_id')->references('id')->on('clinics')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clinic_user');
    }
}
