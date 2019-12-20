<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table="products";



    public function has_variants(){

        return $this->hasMany('App\ProductVariants', 'product_id' ,'product_id');
    }
}

