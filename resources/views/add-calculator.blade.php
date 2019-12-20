@extends('layouts.dataTables')
@section('content')
    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="row" style="padding-bottom: 25px">
                    <h3 class=" col-md-6">Add Calculator</h3>
                    <div class="col-md-6" align="right">
                        <button type="button" class="btn btn-primary btn-lg" id="addproduct"
                                data-toggle="modal" data-target=".bd-example-modal-lg">Add Products
                        </button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{route('calculator.save')}}" >
                            @csrf
                            <input type="hidden" name="variants" id="variants">
                            <input type="hidden" name="status"  id="status" @if(!empty($calculator)) value="update"@endif>
                            <input type="hidden" name="cal_id"  @if(!empty($calculator)) value="{{$calculator->id}}"@endif>
                            <input type="hidden" name="unchecked" id="unchecked">

                            <div class="form-group row ">
                                <div class="col-md-6">
                                    <label for="title" class="col-form-label">Title </label>
                                    <input type="text" name="title"  class="form-control" id="title" placeholder="Calculator Title"
                                           @if(!empty($calculator)) value="{{$calculator->title}}"@endif required>
                                </div>
                                <div class="col-md-6">
                                    <label for="title" class="col-form-label">Code </label>
                                    <input type="text" name="code" class="form-control" id="code" placeholder="Enter Unified Code"
                                           @if(!empty($calculator)) value="{{$calculator->unified_code}}"@endif required>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-5">
                                <h4 class="">Products</h4>
                                <div class="">
                                    <div class="card-body">
                                        <div id="selected_prod"  class="table-responsive col-md-12">
                                            <div id="header">
                                                <div class="header-area row" >
                                                    <h6 class="col-md-1"></h6>
                                                    <h6 class="col-md-2">Image</h6>
                                                    <h6 class="col-md-2">Title</h6>
                                                    <h6 class="col-md-3" align="center">Sku</h6>
                                                    <h6 class="col-md-2" align="center">Price</h6>
                                                    <h6 class="col-md-2" align="center">Quantity</h6>

                                                </div>
                                            </div>

                                                    @if(!empty($detail))
                                                        @foreach($detail["products"] as $product)
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
                                                            @foreach($detail["variants"] as $key => $variant )
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
                                                                            <?php $quantities=$variant->has_var_quantity?>
                                                                            @foreach($quantities as $quantity)
                                                                                @if($quantity->calculator_id == $calculator->id)
                                                                                   <input type="text" class="form-control" name="var_{{$variant->variant_id}}" value="{{$quantity->variant_quantity}}">
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                          @endforeach
                                                        @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(!empty($calculator))
                            <div class="col-lg-12 mt-5">
                                <div class="card">
                                    <div class="card-body row">

                                        <div id="clipboard" class="col-lg-11">&#x3C;div class=&#x22;single_calculator&#x22; @if(!empty($calculator))  data-id=&#x22;{{$calculator->id}}&#x22; data-code=&#x22;{{$calculator->unified_code}}&#x22; data-domain=&#x22;{{ShopifyApp::shop()->shopify_domain}}&#x22;@endif &#x3E;&#x3C;/div&#x3E;</div>
                                        <button type="button" align="right" class="col-lg-1 btn btn-success btn-xs mb-3 copy" >Copy</button>

                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="col-lg-6 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="modal fade bd-example-modal-lg">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Select Products</h5>
                                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                    </div>
                                                    <div class="modal-body" >
                                                        <div class="header-area">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-8 col-sm-8 clearfix">
                                                                    <div class="search-box pull-left">
                                                                            <input type="text" name="search" placeholder="Search..."  id="search">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="products">
                                                            <div class="header-area row">
                                                                <h6 class="col-md-1"></h6>
                                                                <h6 class="col-md-2">Image</h6>
                                                                <h6 class="col-md-2">Title</h6>
                                                                <h6 class="col-md-3" align="center">Sku</h6>
                                                                <h6 class="col-md-2" align="center">price</h6>
                                                                <h6 class="col-md-2" align="center">Quantity</h6>


                                                            </div>

                                                            <div id="product-detail">
                                                                <div id="searched">

                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div id="links"  style="padding-top: 10px;display: flex;align-items: center;justify-content: center">

                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal" id="selectproducts">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <button class="btn btn-primary" type="submit" name="save" id="save" > Save</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
