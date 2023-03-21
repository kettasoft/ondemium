<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pharmacy_id');
            $table->string('name');
            $table->json('photos');
            $table->text('description')->nullable();
            $table->string('significant')->nullable();
            $table->string('company')->nullable();
            $table->string('category');
            $table->unsignedSmallInteger('amount');
            $table->unsignedSmallInteger('price');
            $table->boolean('active')->default(1);
            $table->string('status')->default(1);
            $table->timestamps();

            $table->foreign('pharmacy_id')->references('id')->on('pharmacies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
