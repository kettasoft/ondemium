<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('username', 15)->unique()->fulltext();
            $table->string('name', 50)->fulltext();
            $table->string('summary', 200)->nullable();
            $table->string('logo');
            $table->string('banner')->nullable();
            $table->boolean('status')->default(1);
            $table->enum('clinic_type', ['general', 'especially'])->index();
            $table->timestamps();

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
        Schema::dropIfExists('clinic');
    }
}
