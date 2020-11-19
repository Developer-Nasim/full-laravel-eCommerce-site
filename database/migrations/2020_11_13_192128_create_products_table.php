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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('category');
            $table->string('subcategory');
            $table->string('undercategory');
            $table->text('title');
            $table->text('url');
            $table->string('price');
            $table->string('update_price')->default(0);
            $table->string('quantity');
            $table->string('discount');
            $table->string('avaiable');
            $table->string('colors');
            $table->text('product_img');
            $table->text('short_desc');
            $table->text('full_desc');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('products');
    }
}
