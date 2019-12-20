<?php

namespace App\Http\Controllers;

use App\Calculator;
use App\Product;
use Illuminate\Http\Request;
use OhMyBrew\ShopifyApp\Models\Shop;
use App\CalculatorGroup;
use App\ProductVariants;

class Soundstops extends Controller
{

    // Calculator Groups

    public function CalculatorGroups(Request $request){

            $shop=Shop::where("shopify_domain",$request->get("shop"))->first();
            $group=CalculatorGroup::where("shop_id",$shop->id)
                ->where("id",$request->get("group_id"))
                ->where("unified_code",$request->get("code"))
                ->first();

              $group_cal=$group->calculator_id;
              $group_cal=explode(",",$group_cal);
              $calculators=[];

                 foreach ($group_cal as $cal){
                    $calculator=Calculator::where("id",$cal)->first();
                     array_push($calculators,$calculator);
                 }

                $cal_view=view("users.grp-calculators")->with([
                    "calculators"=>$calculators,
                      "group"=>$group
                 ])->render();

        return response()->json($cal_view);
    }


        // Display Calculator and Enter Area Section

     public function CalculationSection(Request $request){

         $shop=Shop::where("shopify_domain",$request->get("shop"))->first();
         $cal_data=explode("_",$request->get("id"));
         $calculator=Calculator::where("shop_id",$shop->id)
             ->where("id",$cal_data[1])->first();

        $calculation_view=view("users.calculations")->with(["calculator"=>$calculator])->render();
        return response()->json($calculation_view);
     }


     // Make Calculations of Areas

     public function Calculations(Request  $request){

         $shop=Shop::where("shopify_domain",$request->get("shop"))->first();
         $cal_data=$request->get("id");
         $cal_data=explode("_",$cal_data[0]);

        $calculator=Calculator::where("id",$cal_data[1])
            ->where("shop_id",$shop->id)
            ->first();

         $length=$request->get("length");
         $length_unit=$request->get("length_unit");
         $width=$request->get("width");
         $width_unit=$request->get("width_unit");
         $data=[];
         $data["calculator"]=$calculator->id;
         $data["cal_length"]=$length;
         $data["length_unit"]=$length_unit;
         $data["width"]=$width;
         $data["width_unit"]=$width_unit;
         $areas=$request->get("area");


         if($length_unit == "cm"){
             $length= $length *0.01;
         }elseif ($length_unit == "ins"){

             $length= $length *0.0254;
         }
         elseif ($length_unit == "ft"){

             $length= $length *0.3048;
         }

         if($width_unit == "cm"){
             $width= $width *0.01;
         }elseif ($width_unit == "ins"){

             $width= $width *0.0254;
         }
         elseif ($width_unit == "ft"){

             $width= $width *0.3048;
         }

         $area = $width*$length;
         $data["area"]=ceil($area);

         $data["areas"]=$request->get("area");
         $data["area_num"]=$request->get("area")+1;
        $cal_view= view("users.make-calculations")->with(["data"=>$data])->render();

         return response()->json($cal_view);
     }


     // Make Final calculations for Cart

        public function MakeCalculations(Request $request){


            $total_num_areas=$request->input("areas");
            $calculated_areas=$request->input("area");
            $calculators=$request->input("area_calculator");
            $area_lenghts=$request->input("area_lenght");
            $area_widths=$request->input("area_width");
            $area_lenght_units=$request->input("area_lenght_unit");
            $area_width_units=$request->input("area_width_unit");
            $total_area =$request->input("total-area");

            $save_variants=[];
            $demand_quanity=[];
            $products=[];
            $quantity=0;
            $demand_area=0;
            $subtotal=0;

            for($i=0;$i<$total_num_areas;$i++) {


                    $calculator =Calculator::with('has_products')
                        ->where("id",$calculators[$i])->first();
                    $variants=$calculator->has_products;

                    foreach ( $variants as $key => $variant){

                        $var_prod_id=ProductVariants::with("has_var_quantity","belongs_product")
                            ->where("variant_id",$variant->variant_id)
                            ->first();
                                if(!in_array($var_prod_id,$save_variants)){

                                    array_push($save_variants,$var_prod_id);

                                    $quantities=$var_prod_id->has_var_quantity;

                                    foreach ($quantities as $var_quantity){

                                        if($var_quantity->calculator_id == $calculator->id ){
                                            $quantity=(float)$var_quantity->variant_quantity;
                                            $demand_area=(float)$calculated_areas[$i];
                                            $demand_quanity[$var_prod_id->variant_id]=$quantity*$demand_area;
                                            $amount= $demand_quanity[$var_prod_id->variant_id]*$var_prod_id->price;
                                            $subtotal+=$amount;
                                        }
                                    }

                                }else{

                                    $var_prod_id=ProductVariants::with("has_var_quantity")
                                        ->where("variant_id",$var_prod_id->variant_id)
                                        ->first();
                                    $quantities=$var_prod_id->has_var_quantity;

                                    foreach ($quantities as $var_quantity){

                                        if($var_quantity->calculator_id == $calculator->id ){
                                            $quantity=(float)$var_quantity->variant_quantity;
                                            $demand_area=(float)$calculated_areas[$i];

                                            $previous_var_amount=$demand_quanity[$var_prod_id->variant_id]*$var_prod_id->price;
                                            $subtotal-=$previous_var_amount;

                                            $demand_quanity[$var_prod_id->variant_id]+=$quantity*$demand_area;
                                            $amount= $demand_quanity[$var_prod_id->variant_id]*$var_prod_id->price;
                                            $subtotal+=$amount;
                                        }
                                    }

                                }

                    }

            }

                $total= $subtotal ;

            $view = view("users.final-calculations")->with([
                "variants"=>$save_variants,
                "quanitites" =>$demand_quanity,
                 "total_area" => $total_area,
                 "subtotal"  => $subtotal,
            ])->render();

            return response()->json($view);
        }


        // Single Calculator

        public  function SoundStopsCalculator(Request $request){

            $shop=Shop::where("shopify_domain",$request->get("shop"))->first();

            $calculator=Calculator::where([
                ["id",$request->get("calculator_id")],
                ["unified_code",$request->get("code")],
                ["shop_id",$shop->id],
            ])->first();

            $calculators=[];

            array_push($calculators,$calculator);
            $cal_view=view("users.single-calculators")->with([
                "calculators"=>$calculators
            ])->render();

        return response()->json($cal_view);

        }


}
