<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer('type');
            $table->string('title', 255);
            $table->boolean('active');
            $table->string('thumbnail')->nullable();
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->integer('price');
            $table->integer('discount');
            $table->integer('stock');
            $table->text('image');
            $table->integer('type');
            $table->string('slug')->unique();
            $table->string('guarantee');
            $table->text('content');
            $table->text('benefit')->nullable();
            $table->longText('description');
            $table->integer('total_sell');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedBigInteger('brand_id');
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('categories');
    }
}
