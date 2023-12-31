<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductImagesTable extends Migration
{
    public function up()
    {
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('imageable_id');
            $table->string('imageable_type');
            $table->string('image_path');
            $table->timestamps();

            $table->index(['imageable_id', 'imageable_type']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_images');
    }
}
