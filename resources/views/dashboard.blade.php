@extends('layouts.admin')
@section('content')
    <div class="main-content-inner">

        <div class="sales-report-area mt-5 mb-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-report mb-xs-30">
                        <div class="s-report-inner pr--20 pt--30 mb-3">
                            <div class="icon"><i class="fa fa-calculator"></i></div>
                            <div class="s-report-title d-flex justify-content-between">
                                <h4 class="header-title mb-0">Calculators</h4>
                            </div>
                            <div class="d-flex justify-content-between pb-2">
                                <h2>{{$calculators}}</h2>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-report mb-xs-30">
                        <div class="s-report-inner pr--20 pt--30 mb-3">
                            <div class="icon"><i class="fa fa-product-hunt"></i></div>
                            <div class="s-report-title d-flex justify-content-between">
                                <h4 class="header-title mb-0">Products</h4>

                            </div>
                            <div class="d-flex justify-content-between pb-2">
                                <h2>{{$products}}</h2>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-report mb-xs-30">
                        <div class="s-report-inner pr--20 pt--30 mb-3">
                            <div class="icon"><i class="fa fa-product-hunt"></i></div>
                            <div class="s-report-title d-flex justify-content-between">
                                <h4 class="header-title mb-0">Synced Product</h4>

                            </div>
                            <div class="d-flex justify-content-between pb-2">
                                <h2>{{$sync}}</h2>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
