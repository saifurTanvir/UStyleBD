<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('productDetailable_id');
            $table->string('productDetailable_type');
            $table->string('image1');
            $table->string('image2');
            $table->string('image3');
            $table->string('category');
            $table->string('size');
            $table->integer('stock');
            $table->integer('discount');
            $table->string('description');
            $table->string('fbLink')->nullable();
            $table->string('instraLink')->nullable();
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
        Schema::dropIfExists('product_details');
    }
}
