<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_models', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("name");
            $table->string("collection");
            $table->string("size");
            $table->string("color1")->default("null");
            $table->string("color2")->default("null");
            $table->string("color3")->default("null");
            $table->string("sheet");
            $table->string("fill");
            $table->string("description");
            $table->bigInteger("price");
            $table->string("mainPhoto");
            $table->longText("images")->default("empty");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_models');
    }
}
