@if(!empty($products))
    <div class="products" id="{{$products->currentPage()}}">

        @foreach($products as $product)
            <div class="row" style="padding: 5px;border-top: 1px solid rgba(0,0,0,.1)">
                <div class="col-md-1 " style="padding: 20px ">
                    <div class="custom-control custom-checkbox ">
                        <input type="checkbox"  class="custom-control-input product_check" id="{{$product->product_id}}" name="">

                        <label class="custom-control-label" for="{{$product->product_id}}">
                        </label>
                    </div>
                </div>
                <div class="col-md-2">
                    @if($image=json_decode($product->feature_image))
                        <img src="{{$image->src}}" width="70px">
                     @endif
                </div>
                <div class="col-md-2" align="left" style="padding: 20px ">
                    <h6>{{$product->title}} </h6>
                </div>
            </div>

            @if($product->has_variants)
                @foreach($product->has_variants as $key => $variant)
                    <div class="row" style="padding: 5px;border-top: 1px solid rgba(0,0,0,.1)">
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-2" style="padding: 10px 20px ">
                            <div class="custom-control custom-checkbox " align="right">
                                <input type="checkbox"  class="custom-control-input {{$product->product_id}} variants" id="{{$variant->variant_id}}" name="">

                                <label class="custom-control-label" for="{{$variant->variant_id}}">
                                </label>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <h6>{{$variant->title}}</h6>

                        </div>
                        <div class="col-md-3">
                            <h6>{{$variant->sku}}</h6>
                        </div>
                        <div class="col-md-2">
                            <h6>{{$variant->price}}</h6>
                        </div>
                        <div class="col-md-2">
                           <input type="number"  class="form-control" name="variant-{{$product->product_id}}" id="variant-{{$variant->variant_id}}">
                        </div>
                    </div>
                @endforeach
                @endif
        @endforeach
</div>
@endif
<div class="pagnination">
    {{$products->links()}}
</div>
