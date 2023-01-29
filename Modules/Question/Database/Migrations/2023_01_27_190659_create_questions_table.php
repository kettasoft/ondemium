<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->morphs('questionable');
            $table->string('specialty');
            $table->string('title', 50);
            $table->string('description', 250);
            $table->enum('whom', [1, 2]);
            $table->enum('gender', ['male', 'female']);
            $table->integer('age', unsigned:true)->length(99);
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
        Schema::dropIfExists('questions');
    }
}
