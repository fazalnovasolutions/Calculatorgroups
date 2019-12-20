@if(!empty($data))
    <div class="header-area row " >
        <h6 class="col-md-1"></h6>
        <h6 class="col-md-2">Image</h6>
        <h6 class="col-md-2">Title</h6>
        <h6 class="col-md-3" align="center">Sku</h6>
        <h6 class="col-md-2" align="center">price</h6>
        <h6 class="col-md-2" align="center">Quantity</h6>


    </div>
        @foreach($data["products"] as $product)
            <div class="row" style="padding: 5px;border-top: 1px solid rgba(0,0,0,.1)" id="div-pro-{{$product->product_id}}">
                <div class="col-md-1 " style="padding: 20px ">
                    <div class="custom-control custom-checkbox ">
                        <input type="checkbox"  class="custom-control-input check" checked id="pro_{{$product->product_id}}" name="">

                        <label class="custom-control-label" for="pro_{{$product->product_id}}">
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

            @foreach($data['variants'] as $key => $variant)
            @if($product->product_id == $variant->product_id)
                <div class="row" style="padding: 5px;border-top: 1px solid rgba(0,0,0,.1)" id="div-var-{{$variant->variant_id}}">
                    <div class="col-md-1">

                    </div>
                    <div class="col-md-2" style="padding: 10px 30px">
                        <div class="custom-control custom-checkbox " align="right">
                            <input type="checkbox"  class="custom-control-input  select_var var_{{$product->product_id}}" checked id="var_{{$variant->variant_id}}" name="">

                            <label class="custom-control-label" for="var_{{$variant->variant_id}}">
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
                        <input type="text" class="form-control" name="var_{{$variant->variant_id}}" required value="{{$quantity[$key]}}">
                    </div>
                </div>


                @endif
            @endforeach
        @endforeach
    @endif
