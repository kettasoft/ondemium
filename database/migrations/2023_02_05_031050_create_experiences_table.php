<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('clinic_username')->nullable();
            $table->enum('job_type', ['full-time', 'part-time', 'contract', 'private-job', 'trining']);
            $table->string('specializations')->nullable();
            $table->date('from_date');
            $table->date('end_date');
            $table->text('description')->nullable();
            $table->json('modes')->nullable();
            $table->boolean('work_now');
            $table->boolean('is_available')->default(1);
            $table->boolean('is_verified')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('clinic_username')->references('username')->on('clinics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiences');
    }
}
