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
            $table->bigIncrements('id');
            $table->string('product_id');
            $table->string('title');
            $table->longText('body_html')->nullable();
            $table->string('vendor')->nullable();
            $table->string('type')->nullable();
            $table->string('tags')->nullable();
            $table->string('shop_id');
            $table->string('sku')->nullable();
            $table->string('handle')->nullable();
            $table->longText('options')->nullable();
            $table->longText('feature_image')->nullable();
            $table->longText('image')->nullable();
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
