<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calculator extends Model
{
    protected $table="calculator";


    public function has_products(){

        return $this->hasMany('App\CalculatorProducts', 'calculator_id' );

    }
}
