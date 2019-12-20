<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductVariants extends Model
{
    protected $table="product_variants";

    public function has_var_quantity(){

            return $this->hasMany('App\CalculatorProducts', 'variant_id' ,'variant_id');

    }
    public function belongs_product(){

        return $this->belongsTo('App\Product', 'product_id' ,'product_id');

    }
}
