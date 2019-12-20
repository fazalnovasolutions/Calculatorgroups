<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_variants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('variant_id');
            $table->string('product_id');
            $table->string('title');
            $table->string('price')->nullable();
            $table->string('sku')->nullable();
            $table->string('position')->nullable();
            $table->string('inventory_pollicy')->nullable();
            $table->string('compare_price')->nullable();
            $table->string('options')->nullable();
            $table->string('barcode')->nullable();
            $table->string('image_id')->nullable();
            $table->string('grams')->nullable();
            $table->string('weight')->nullable();
            $table->string('weight_unit')->nullable();
            $table->string('inventory_id')->nullable();
            $table->string('quantity')->nullable();
            $table->string('old_quantity')->nullable();
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
        Schema::dropIfExists('product_variants');
    }
}
