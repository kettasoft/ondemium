<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->id();
            $table->unsignedBigInteger('plan_id')->nullable();
            $table->string('username')->unique(); // Started @
            $table->string('first_name');
            $table->string('last_name');
            $table->json('photo');
            $table->enum('gender', ['male', 'female']);
            $table->date('date_birth');
            $table->string('email')->unique();
            $table->string('phone', 32)->unique();
            $table->string('country_code', 10);
            $table->string('permissions')->nullable();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('is_verified')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('doctors');
    }
}
