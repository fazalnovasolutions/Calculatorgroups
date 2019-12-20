<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalculatorProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calculator_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('calculator_id');
            $table->string('product_id');
            $table->string('variant_id');
            $table->string('variant_quantity');
            $table->string('shop_id');
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
        Schema::dropIfExists('calulator_products');
    }
}
