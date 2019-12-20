@extends("layouts.dataTables")
@section("content")
    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="row" style="padding-bottom: 25px">
                    <h3 class=" col-md-10">Calculators Groups</h3>


                </div>
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{route('group.calculator.save')}}">
                            @csrf
                            <input type="hidden" name="calulators" id="calculator">
                            <input type="hidden" name="status"@if(!empty($group))   value="update"    @endif >
                            <input type="hidden" name="group_id"   @if(!empty($group))   value="{{$group->id}}"    @endif>

                            <div class="form-group row ">
                                <div class="col-md-6">
                                    <label for="title" class="col-form-label">Group Title </label>
                                    <input type="text" name="title"  class="form-control" id="title" placeholder="Group Title"
                                     @if(!empty($group))   value="{{$group->title}}"    @endif required>
                                </div>
                                <div class="col-md-6">
                                    <label for="title" class="col-form-label">Code </label>
                                    <input type="text" name="code" class="form-control" id="code" placeholder="Enter Unified Code"
                                           @if(!empty($group))   value="{{$group->unified_code}}"    @endif      required>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-5">
                                <h4 class="">Calculators</h4>
                                <div class="">
                                    <div class="card-body">
                                        @if(!empty($calculators))
                                        <div id="selected_cal"  class="col-md-6">
                                            <div class="header-area row">
                                                <h6 class="col-md-1"></h6>
                                                <h6 class="col-md-5">Title</h6>
                                                <h6 class="col-md-5">Code</h6>
                                            </div>
                                            @foreach($calculators as $calculator)
                                            <div class="row" style="padding: 5px;border-top: 1px solid rgba(0,0,0,.1)">
                                                <div class="custom-control custom-checkbox col-md-1">

                                                    <input type="checkbox"  class="custom-control-input cal_check" id="{{$calculator->id}}"
                                                    @if(!empty($sel_calculators))
                                                        @foreach($sel_calculators as $sel_cal)
                                                            @if($calculator->id == $sel_cal->id)
                                                                {!! "checked" !!}
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    >
                                                    <label class="custom-control-label" for="{{$calculator->id}}"></label>
                                                </div>
                                                <div class="col-md-5">
                                                    {{$calculator->title}}
                                                </div>
                                                <div class="col-md-5">
                                                    {{$calculator->unified_code}}
                                                </div>


                                            </div>
                                                @endforeach

                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @if(!empty($group))
                            <div class="col-lg-12 mt-5">
                                <div class="card">
                                    <div class="card-body row" >
                                        <div id="clipboard" class="col-lg-10">
                                            &#x3C;div class=&#x22;calculator_group&#x22; @if(!empty($group))  data-id=&#x22;{{$group->id}}&#x22; data-code=&#x22;{{$group->unified_code}}&#x22; data-domain=&#x22;{{ShopifyApp::shop()->shopify_domain}}&#x22;@endif &#x3E;&#x3C;/div&#x3E;
                                        </div>
                                        <button type="button" align="right" class="col-lg-1 btn btn-success btn-xs mb-3 copy" >Copy</button>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <button  class="btn btn-primary" type="submit" name="save" id="save_cal" > Save</button>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
