<?php

namespace App\Http\Controllers;

use App\CalculatorProducts;
use DemeterChain\C;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use OhMyBrew\ShopifyApp\Facades\ShopifyApp;
use Log;
use App\Calculator;
use App\Product;
use App\ProductVariants;
use App\CalculatorGroup;
use OhMyBrew\ShopifyApp\Services\ShopSession;
use function Sodium\increment;

class Calculators extends Controller
{
    // Dashboard

   public function  dashboard(){
       $shop=ShopifyApp::shop();
        $products_count= $shop->api()->rest('GET', '/admin/api/2019-10/products/count.json');
        $sync_products = count(Product::where('shop_id',$shop->id)->get());

       $calculator_count=count(Calculator::all());
       return view('dashboard')->with([
           'products'=>$products_count->body->count,
           'calculators'=>$calculator_count,
           'sync' => $sync_products
       ]);
   }

   // logout

    public function logout(){
        $destroy = null;

           session()->invalidate();
           return redirect()->route("login");

    }

//   show Products

   public function getProducts( Request $request){

       $shop=ShopifyApp::shop();

       $products=Product::with("has_variants")
       ->where("shop_id",$shop->id)->paginate(30);

       return view('products')->with([
           'products'=>$products
       ]);
   }

   //Sync Products

    public function SyncProducts(){
        $shop=ShopifyApp::shop();
        $products_count= $shop->api()->rest('GET', '/admin/api/2019-10/products/count.json');
        $products_count=$products_count->body->count;
        $products_count=(int)ceil($products_count/250);

//                get products

        if($products_count != 0 && $products_count != null){
            for ($i=1;$i<=$products_count;$i++){
                $products= $shop->api()->rest('GET', '/admin/api/2019-10/products.json',[
                    'pages' => $i,
                    'limit' => 250
                ]);

//                        storing products

                $products=$products->body->products;
                foreach ($products as $product){

                    $sync_products=Product::where('product_id',$product->id)->first();
//                            upating product
                    if($sync_products != null){
                        $update_pro=Product::where("product_id",$product->id)
                            ->update([
                               "title" =>$product->title,
                                "body_html" =>$product->body_html,
                                "vendor" =>$product->vendor,
                                "type" =>$product->product_type,
                                "tags" =>$product->tags,
                                "handle" =>$product->handle,
                                "options" =>json_encode($product->options),
                                "feature_image" =>json_encode($product->image),
                                "image" =>json_encode($product->images),
                            ]);

                        $update_pro_variants=$product->variants;

                        foreach ($update_pro_variants as $variant){

                            $update_var_check=ProductVariants::where("variant_id",$variant->id)->first();
                            //  updating and creating products variants

                            if($update_var_check != null){
                                $update_var=ProductVariants::where("variant_id",$variant->id)
                                    ->update([
                                        "title"=>$variant->title,
                                        "price"=>$variant->price,
                                        "sku"=>$variant->sku,
                                        "position"=>$variant->position,
                                        "inventory_pollicy"=>$variant->inventory_policy,
                                        "compare_price"=>$variant->compare_at_price,
                                        "options"=>$variant->option1.",".$variant->option2.",".$variant->option3,
                                        "barcode"=>$variant->barcode,
                                        "image_id"=>$variant->image_id,
                                        "grams"=>$variant->grams,
                                        "weight"=>$variant->weight,
                                        "weight_unit"=>$variant->weight_unit,
                                        "inventory_id"=>$variant->inventory_item_id,
                                        "quantity"=>$variant->inventory_quantity,
                                        "old_quantity"=>$variant->old_inventory_quantity,
                                    ]);

                            }else{
                                $addvariant = new ProductVariants();
                                $addvariant->variant_id       = $variant->id;
                                $addvariant->product_id       = $product->id;
                                $addvariant->title            = $variant->title;
                                $addvariant->price            = $variant->price;
                                $addvariant->sku              = $variant->sku;
                                $addvariant->position         = $variant->position;
                                $addvariant->inventory_pollicy= $variant->inventory_policy;
                                $addvariant->compare_price    = $variant->compare_at_price;
                                $addvariant->options          = $variant->option1.",".$variant->option2.",".$variant->option3;
                                $addvariant->barcode          = $variant->barcode;
                                $addvariant->image_id         = $variant->image_id;
                                $addvariant->grams            = $variant->grams;
                                $addvariant->weight           = $variant->weight;
                                $addvariant->weight_unit      = $variant->weight_unit;
                                $addvariant->inventory_id     = $variant->inventory_item_id;
                                $addvariant->quantity     = $variant->inventory_quantity;
                                $addvariant->old_quantity     = $variant->old_inventory_quantity;
                                $addvariant->save();
                            }

                        }

                    }
                    elseif($sync_products == null){

                        // creating new products and its variants

                        $addproduct= new Product();
                        $addproduct->product_id= $product->id;
                        $addproduct->title=$product->title;
                        $addproduct->body_html=$product->body_html;
                        $addproduct->vendor=$product->vendor;
                        $addproduct->type=$product->product_type;
                        $addproduct->tags=$product->tags;
                        $addproduct->shop_id=$shop->id;
                        $addproduct->handle=$product->handle;
                        $addproduct->options=json_encode($product->options);
                        $addproduct->feature_image=json_encode($product->image);
                        $addproduct->image=json_encode($product->images);
                        $addproduct->save();
                        $variants=$product->variants;

                        if($variants){
                            foreach ($variants as $variant){
                                $addvariant = new ProductVariants();
                                $addvariant->variant_id       = $variant->id;
                                $addvariant->product_id       = $product->id;
                                $addvariant->title            = $variant->title;
                                $addvariant->price            = $variant->price;
                                $addvariant->sku              = $variant->sku;
                                $addvariant->position         = $variant->position;
                                $addvariant->inventory_pollicy= $variant->inventory_policy;
                                $addvariant->compare_price    = $variant->compare_at_price;
                                $addvariant->options          = $variant->option1.",".$variant->option2.",".$variant->option3;
                                $addvariant->barcode          = $variant->barcode;
                                $addvariant->image_id         = $variant->image_id;
                                $addvariant->grams            = $variant->grams;
                                $addvariant->weight           = $variant->weight;
                                $addvariant->weight_unit      = $variant->weight_unit;
                                $addvariant->inventory_id     = $variant->inventory_item_id;
                                $addvariant->quantity     = $variant->inventory_quantity;
                                $addvariant->old_quantity     = $variant->old_inventory_quantity;
                                $addvariant->save();
                            }

                        }

                    }

                 }

             }
            return redirect()->route('products');

        }

    }


    //    get All Calculators

    public function getCalculators(){
        $shop=ShopifyApp::shop();
        $calculators=Calculator::where("shop_id",$shop->id)->get();
       return view('calculators')->with([
           "calculators"=>$calculators
       ]);
    }


//    Add calculator Form

    public function AddCalculatorFrom(){

        $products=Product::with('has_variants')->paginate(1);
        return view('add-calculator')->with([
           'allproducts'=>$products
       ]);
    }

    public function AddCalculatorFroms(){

//            $products=Product::with('has_variants')->get();
        $products=Product::with('has_variants')->paginate(1);
//        return json_encode($products);
        return view('ajax-add-products')->with([
            "products"=>$products
        ])->render();
    }

    //Select Calculator Products

    public function SelectCalculatorProducts(Request $request){

        $variant_id=$request->get("variants");
        $quantity=$request->get("quantity");
        $quantity=explode("-",$quantity);
        $products=[];
        $varaints=[];

        foreach ($variant_id as $key => $id){
            $var_prod_id=ProductVariants::where("variant_id",$id)->first();
            $product_id=$var_prod_id->product_id;
            $product=Product::where("product_id",$product_id)->first();

                for($i=0;$i<=$key;$i++){
                    if(!in_array($product,$products)){
                        array_push($products,$product);
                    }
                }
            array_push($varaints,$var_prod_id);
        }

        $data["products"]=$products;
        $data["variants"]=$varaints;

        return view('ajax-selected-cal-pro')->with([
            "data"=>$data,
            "quantity"=>$quantity
        ])->render();

    }


//    Save and upadte Calculators

    public function AddCalculator(Request $request){

        $shop=ShopifyApp::shop();
        $status =$request->input('status');
        // Update Calculator
        if($status == "update"){

            $cal_id=$request->input("cal_id");

            $calculator=Calculator::where("id",$cal_id)
                ->update([
                    "title"=>$request->input('title'),
                    "unified_code"=>$request->input('code')
                ]);

            $calculator=Calculator::where("id",$cal_id)->first();
            $dltvariant=$request->get("unchecked");
            $dltvariant=explode(",",$dltvariant);


//                delete uncked variants
            $delete_prod=[];

                foreach ($dltvariant as $delete_var){
                    $delete_prod[$delete_var]=CalculatorProducts::where("calculator_id",$calculator->id)
                        ->where("variant_id",$delete_var)
                        ->delete();
                }

            $variants=explode(",",$request->get("variants"));
                foreach ($variants as $vari){

                    $variant=ProductVariants::where("variant_id",$vari)->first();
                    $update_check=CalculatorProducts::where("variant_id",$vari)
                        ->where("calculator_id",$calculator->id)->first();

                    if($update_check != null){
                        $update_vari=CalculatorProducts::where("variant_id",$vari)
                            ->where("calculator_id",$calculator->id)
                            ->update([
                               "variant_quantity" => $request->get("var_".$variant["variant_id"])
                            ]);

                    }else{
                        $variant=ProductVariants::where("variant_id",$vari)->first();
                        $cal_prod=new CalculatorProducts();
                        $cal_prod->calculator_id=$calculator->id;
                        $cal_prod->product_id=$variant["product_id"];
                        $cal_prod->variant_id=$variant["variant_id"];
                        $cal_prod->variant_quantity=$request->get("var_".$variant["variant_id"]);
                        $cal_prod->shop_id=$shop->id;
                        $cal_prod->save();
                    }
                }


            return redirect()->route('calculators');
        }

       elseif($status== null){

            //Save Calculator

           $calculator= new Calculator();
           $calculator->title=$request->input('title');
           $calculator->unified_code=$request->input('code');
           $calculator->shop_id=$shop->id;
           $calculator->save();

           $variants=explode(",",$request->get("variants"));

           for($i=0;$i<count($variants);$i++){

               $variant=ProductVariants::where("variant_id",$variants[$i])->first();
               $cal_prod=new CalculatorProducts();
               $cal_prod->calculator_id=$calculator->id;
               $cal_prod->product_id=$variant["product_id"];
               $cal_prod->variant_id=$variant["variant_id"];
               $cal_prod->variant_quantity=$request->get("var_".$variant["variant_id"]);
               $cal_prod->shop_id=$shop->id;
                $cal_prod->save();
           }

          return redirect()->route('calculators');
       }
    }

        //edit Caolculator

    public function editCalculator($id){

       $calculator=Calculator::with('has_products')
           ->where("id",$id)->get();

       $variants=$calculator[0]->has_products;
        $products=[];
        $cal_varaints=[];

        foreach ( $variants as $key => $variant){
           $var_prod_id=ProductVariants::with("has_var_quantity")
           ->where("variant_id",$variant->variant_id)
               ->first();

           $product_id=$var_prod_id->product_id;
           $product=Product::where("product_id",$product_id)->first();

               for($i=0;$i<=$key;$i++){
                   if(!in_array($product,$products)){
                       array_push($products,$product);
                   }
               }
                   array_push($cal_varaints,$var_prod_id);

       }

        $detail["products"]=$products;
        $detail["variants"]=$cal_varaints;

        return view("add-calculator")->with([
            "calculator"=>$calculator[0],
            "detail"=>$detail
        ]);

    }




    // Delete Calculator

    public function DeleteCalculator($id){
            $shop=ShopifyApp::shop();

       $dlt_cal_pro= CalculatorProducts::where("calculator_id",$id)
           ->where('shop_id',$shop->id)
           ->delete();

       $dlt_cal=Calculator::where('id',$id)
           ->where('shop_id',$shop->id)
           ->delete();

        return redirect()->route('calculators');
    }



    //CalCulator Groups


    public function CalCulatorGroups(){
       $shop=ShopifyApp::shop();

       $groups=CalculatorGroup::where("shop_id",$shop->id)
           ->get();

       return view("calculator-group")->with([
           "groups" => $groups,
            "shop" => $shop
       ]);
    }


    public function AddCalculatorGroup(){

       $shop=ShopifyApp::shop();
       $calculators=Calculator::where("shop_id",$shop->id)
           ->get();
       return view('make-group')->with([
           "calculators"=>$calculators
       ]);

    }

        // get selected calculators by group

    public function selectedCalculators(Request $request){

       $cal_id=$request->get("id");
       $cal_id=explode("-",$cal_id);
       $calculators=[];

       foreach ($cal_id as $id){
           $calculator=Calculator::where("id",$id)->first();
           if(!in_array($calculator,$calculators)){
               array_push($calculators,$calculator);
           }
       }
       return json_encode($calculators);
    }


    // save and update calculator Group

        public function SaveCalculatorGroup(Request $request){
                $status=$request->get('status');
                $shop=ShopifyApp::shop();
       if($status == "update"){

           //update Group
            $id=$request->get("group_id");
            $group=CalculatorGroup::where("id",$id)
                ->where("shop_id",$shop->id)
                ->update([
                    "title"=>$request->get("title"),
                    "unified_code"=>$request->get("code"),
                    "calculator_id"=>$request->get("calulators"),

                ]);

           return redirect()->route("calculator.groups");


       }else{

           // Save Group
           $group= new CalculatorGroup();
           $group->title=$request->get("title");
           $group->unified_code=$request->get("code");
           $group->calculator_id=$request->get("calulators");
           $group->shop_id=$shop->id;
            $group->save();


            return redirect()->route("calculator.groups");

       }


        }


        // edit group

        public function editGroup($id){
       $shop=ShopifyApp::shop();
       $group=CalculatorGroup::where("id", $id)
           ->where("shop_id",$shop->id)
           ->first();
       $group_cal=$group->calculator_id;
       $group_cal=explode(",",$group_cal);
       $calculators=[];
       foreach ($group_cal as $cal){
           $calculator=Calculator::where("id",$cal)->first();
           array_push($calculators,$calculator);
       }

            $stor_calculators=Calculator::where("shop_id",$shop->id)
                ->get();
            return view("make-group")->with([
           "group"=>$group,
            "sel_calculators"=>$calculators,
             "calculators"=>$stor_calculators
       ]);
        }

    // delete group

    public function deleteGroup($id){

            $shop=ShopifyApp::shop();
            $del_group=CalculatorGroup::where("id",$id)
                ->where("shop_id",$shop->id)
                ->delete();

        return redirect()->route("calculator.groups");
        }

//        Search Products

    public function SearchProducts(Request $request){

       $data=$request->get("search");

       $products=Product::with("has_variants")
        ->where("title","like","%".$data."%")->get();

            if( count($products) > 0){
                return view('ajax-search-product')
                    ->with([
                        "products"=>$products
                    ])->render();
            }else{
                return null;
            }
    }


}
