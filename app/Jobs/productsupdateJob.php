<?php namespace App\Jobs;

use App\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use OhMyBrew\ShopifyApp\Models\Shop;
use App\ProductVariants;

class productsupdateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Shop's myshopify domain
     *
     * @var string
     */
    public $shopDomain;

    /**
     * The webhook data
     *
     * @var object
     */
    public $data;

    /**
     * Create a new job instance.
     *
     * @param string $shopDomain The shop's myshopify domain
     * @param object $data    The webhook data (JSON decoded)
     *
     * @return void
     */
    public function __construct($shopDomain, $data)
    {
        $this->shopDomain = $shopDomain;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $shop=Shop::where("shopify_domain",$this->shopDomain)->first();
        if($this->data->image != null){
            $options=json_encode($this->data->options);
        }
        if($this->data->image != null){
            $feature_img=json_encode($this->data->image);
        }
        if($this->data->image != null){
            $images=json_encode($this->data->images);
        }
        $product = Product::where("product_id", $this->data->id)
            ->where("shop_id",$shop->id)
            ->update([
                "title" =>$this->data->title,
                "body_html" =>$this->data->body_html,
                "vendor" =>$this->data->vendor,
                "type" =>$this->data->product_type,
                "tags" =>$this->data->tags,
                "handle" =>$this->data->handle,
                "options" =>$options,
                "feature_image" =>$feature_img,
                "image" =>$images,
            ]);
            $variants=$this->data->variants;
        foreach ($variants as $variant){

            $chk_var=ProductVariants::where("variant_id",$variant->id)
                ->where("product_id", $this->data->id)
                ->first();
            if($chk_var != null){
                $upd_var=ProductVariants::where("variant_id",$variant->id)
                    ->where("product_id",$this->data->id)
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
                $addvariant->product_id       = $this->data->id;
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
