@extends('layouts.admin')
@section('content')
    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="row" style="padding-bottom: 25px">
                    <h3 class=" col-md-10">Products</h3>
                    <div class="col-md-2" align="right">
                        <a href="{{route('products.sync')}}" class="btn btn-primary " align="right"> Sync Products </a>

                    </div>
                </div>
                <div class="card">
                    <div class="card-body">

                        <div class="data-tables">
                            <table class=" table text-center">
                                <thead class="bg-light text-capitalize">
                                <tr>
                                    <th width="5%">Image</th>
                                    <th width="10%">Title</th>
                                    <th width="10%" style="text-align: right">price</th>
                                    <th width="10%" style="text-align: right;padding-right: 50px">SKU</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($products))
                                    @foreach($products as $key => $product)
                                        <tr>
                                            <td>

                                                @if($image=json_decode($product->feature_image))
                                                    <img src="{{$image->src}}" width="70px">
                                                @endif </td>
                                            {{--<td>{{dd($product->image->src)}}</td>--}}
                                            <td id="{{$product->id}}">{{$product->title}}</td>
                                            <td style="text-align: right">{{$product->has_variants[0]->price}}</td>
                                            <td style="text-align: right"> {{$product->has_variants[0]->sku}}</td>
                                        </tr>

                                    @endforeach

                                @endif
                                </tbody>
                            </table>

                        </div>
                        <div align="center">
                            <div  class="col-md-4">
                                <ul class="pagination pagination-md">
                                    {{$products->links()}}


                                </ul>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
