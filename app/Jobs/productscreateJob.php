<?php namespace App\Jobs;

use App\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use OhMyBrew\ShopifyApp\Models\Shop;
use App\ProductVariants;
class productscreateJob implements ShouldQueue
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
        $product = new Product();
        $product->title = $this->data->title;
        $product->product_id =$this->data->id;
        $product->body_html=$this->data->body_html;
        $product->vendor=$this->data->vendor;
        $product->type=$this->data->product_type;
        $product->tags=$this->data->tags;
        $product->shop_id= $shop->id;
        $product->handle=$this->data->handle;
        if($this->data->options != null){
            $product->options=json_encode($this->data->options);
        }
        if($this->data->image != null){
            $product->feature_image=json_encode($this->data->image);
        }
        if($this->data->images != null){
            $product->image=json_encode($this->data->images);
        }
        $product->save();

        $variants=$this->data->variants;
        foreach ($variants as $variant){
            $addvariant= new ProductVariants();
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
