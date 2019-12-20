<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from colorlib.com/polygon/srtdash/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Nov 2019 01:18:16 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Soundstop-calculators</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{asset('argon/assets/images/icon/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('argon/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('argon/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('argon/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('argon/assets/css/metisMenu.css')}}">
    <link rel="stylesheet" href="{{asset('argon/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('argon/assets/css/slicknav.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('argon/cdn.datatables.net/1.10.19/css/jquery.dataTables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('argon/cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('argon/cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('argon/cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css')}}">

    <link rel="stylesheet" href="{{asset('argon/assets/css/typography.css')}}">
    <link rel="stylesheet" href="{{asset('argon/assets/css/default-css.css')}}">
    <link rel="stylesheet" href="{{asset('argon/assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('argon/assets/css/responsive.css')}}">

    <script src="{{asset('argon/assets/js/vendor/modernizr-2.8.3.min.js')}}" type="336a54725e1001768da42d39-text/javascript"></script>
    <style>
        /*#product-detail {*/
            /*overflow-y: auto;*/

        /*}*/
    </style>
</head>
<body>

<div id="preloader">
    <div class="loader"></div>
</div>


<div class="page-container">

    <div class="sidebar-menu">
        <div class="sidebar-header">
            <div class="logo" style="display:flex;padding-left: 25px">
                <h3><a href="{{route('calculator.dashboard')}}">Soundstop</a></h3>
            </div>
        </div>
        <div class="main-menu">
            <div class="menu-inner">
                <nav>
                    <ul class="metismenu" id="menu">
                        <li class="active">
                            <a href="{{route('calculator.dashboard')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>Dashboard</span></a>
                        </li>
                        <li @if(!empty($products))class="active"@endif>
                            <a href="{{route('products')}}" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Products</span></a>
                        </li>
                        <li>
                            <a href="{{route('calculators')}}" aria-expanded="true"><i class="fa fa-calculator"></i><span>Calculators</span></a>
                        </li>
                        <li>
                            <a href="{{route('calculator.groups')}}" aria-expanded="true"><i class=" fa fa-object-group"></i><span>Calculator Groups</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>


    <div class="main-content">

        <div class="header-area">
            <div class="row align-items-center">

                <div class="col-md-6 col-sm-8 clearfix">
                    <div class="nav-btn pull-left">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                </div>
                <div class="col-md-6 col-sm-4" align="right">
                    <h6 class="text-uppercase">
                        {{ ShopifyApp::shop()->shopify_domain }}
                    </h6>
                </div>
            </div>
        </div>


        <div class="page-title-area">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="breadcrumbs-area clearfix">
                        <h4 class="page-title pull-left">Dashboard</h4>
                        <ul class="breadcrumbs pull-left">
                            <li><a href="{{route('calculator.dashboard')}}">Home</a></li>
                            <li><span>Dashboard</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 clearfix">
                    <div class="user-profile pull-right"  >
                        {{--<img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">--}}
                        <h4 class="user-name" ><a href='{{url("/logout")}}'  style="color: #ffff">Log Out</a></h4>
                    </div>
                </div>
            </div>
        </div>

        @yield('content')
    </div>


    <footer>
        <div class="footer-area">
            <p>© Copyright 2019. All right reserved. Soundstop Calculator</p>
        </div>
    </footer>

</div>





<script src="{{asset('argon/assets/js/vendor/jquery-2.2.4.min.js')}}" type="text/javascript"></script>


<script src="{{asset('argon/assets/js/popper.min.js')}}" type="336a54725e1001768da42d39-text/javascript"></script>
<script src="{{asset('argon/assets/js/bootstrap.min.js')}}" type="336a54725e1001768da42d39-text/javascript"></script>
<script src="{{asset('argon/assets/js/owl.carousel.min.js')}}" type="336a54725e1001768da42d39-text/javascript"></script>
<script src="{{asset('argon/assets/js/metisMenu.min.js')}}" type="336a54725e1001768da42d39-text/javascript"></script>
<script src="{{asset('argon/assets/js/jquery.slimscroll.min.js')}}" type="336a54725e1001768da42d39-text/javascript"></script>
<script src="{{asset('argon/assets/js/jquery.slicknav.min.js')}}" type="336a54725e1001768da42d39-text/javascript"></script>

<script src="{{asset('argon/cdn.datatables.net/1.10.19/js/jquery.dataTables.js')}}" type="336a54725e1001768da42d39-text/javascript"></script>
<script src="{{asset('argon/cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js')}}" type="336a54725e1001768da42d39-text/javascript"></script>
<script src="{{asset('argon/cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js')}}" type="336a54725e1001768da42d39-text/javascript"></script>
<script src="{{asset('argon/cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js')}}" type="336a54725e1001768da42d39-text/javascript"></script>
<script src="{{asset('argon/cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js')}}" type="336a54725e1001768da42d39-text/javascript"></script>

<script src="{{asset('argon/assets/js/plugins.js')}}" type="336a54725e1001768da42d39-text/javascript"></script>
<script src="{{asset('argon/assets/js/scripts.js')}}" type="336a54725e1001768da42d39-text/javascript"></script>

<script src="{{asset('argon/ajax.cloudflare.com/cdn-cgi/scripts/95c75768/cloudflare-static/rocket-loader.min.js')}}" data-cf-settings="336a54725e1001768da42d39-|49" defer=""></script></body>
<script>
    $(document).ready(function(){
           var  base_url="http://127.0.0.1:8000/";
        $('#selectproducts').click(function () {
             var   quantity="";
            var variant_id = $('.variants:checkbox:checked').map(function() {
                quantity+=$("#variant-"+this.id).val()+"-";
                return this.id;
            }).get();

            if(variant_id .length == 0){

                $('#selected_prod').html("");
            }else {

                quantity=quantity.slice(0,-1);
                var  data={};
                data.variants=variant_id;
                data.quantity=quantity;
                $.ajax({
                    method: "POST",
                    url:base_url+"selected/products",
                    data:data,
                    success:function (result) {
                                    $("#header").html($(result)[0]);
                                        var ck_id;
                                        var ck_var_id;
                                        var id;
                                        var p_id;
                                        var v_id;
                            for (var i= 1; i <=($(result).length)-1;i++){

                                i++;
                                if(!$("#"+$(result)[i].id).length){
                                    id=$(result)[i].id;
                                    ck_id="div-pro-";
                                    if(id.indexOf(ck_id) != -1){
                                        $("#selected_prod").append($(result)[i]);
                                        p_id=id;
                                    }
                                    ck_var_id="div-var-";
                                    if(id.indexOf(ck_var_id) != -1){
                                        if(!$("#"+$(result)[i].id).length){
                                            $("#"+p_id).after($(result)[i]);
                                        }
                                    }
                                    // $("#selected_prod").append($(result)[i]);

                                }
                                else{
                                      id=$(result)[i].id;
                                    ck_id="div-pro-";
                                    if(id.indexOf(ck_id) != -1){
                                        p_id=id;
                                    }
                                    ck_var_id="div-var-";
                                    if(id.indexOf(ck_var_id) != -1){
                                        if(!$("#"+$(result)[i].id).length) {
                                            $("#" + p_id).after($(result)[i]);
                                        }
                                    }

                                }


                            }


                    }
                });
            }


        });

        $('#save').click(function () {
            var status=$("#status").val();
            if(status == "update"){
                var variant_id = $('.select_var:checkbox:checked').map(function() {
                    var id=this.id;
                    id=id.split("_")
                    return id[1];
                }).get();
                $('#variants').val(variant_id);
                var unchekdbox=$('.select_var:checkbox:not(:checked)').map(function() {
                    var id=this.id;
                    id=id.split("_")
                    return id[1];
                }).get();
                $('#unchecked').val(unchekdbox);
            }else{
                var variant_id = $('.select_var:checkbox:checked').map(function() {
                    var id=this.id;
                    id=id.split("_")
                    return id[1];
                }).get();
                $('#variants').val(variant_id);
            }

        });

        $("#addproduct").click(function () {
            var page;
            if (isEmpty($('#product-detail'))) {
                page=1;
            }

            $.ajax({
                mehtod:"GET",
                url:base_url+"/add/calculators?page="+page,
                success:function (result) {
                    // console.log($(result));
                    var div_id=$(result)[0].id;
                    if(!$("#"+div_id).length) {
                        $("#product-detail").append($(result)[0]);
                        $("#links").append($(result)[2]);
                    }
                }

            });
        });

        $("#search").keydown(function () {
            var search=$("#search").val();
            if(search.length > 4){
                data={};
                data.search= $("#search").val();
                $.ajax({
                   method:"GET",
                   url: base_url+"/search/product",
                    data:data,
                   success:function (result) {


                       if(result == ""){
                           $("#searched").html("No Product Found");
                       }else{
                           var product_id=$(result)[0].id;

                           if(!$("#"+product_id).length ){
                               $("#searched").html("");
                               $("#searched").html($(result));
                           }
                           else {
                               // $("#"+product_id).focus();
                           }
                       }


                   }
                });
            }else {
                if(search.length <= 5){
                    $("#searched").html("");

                }
            }
        });

        $("#save_cal").click(function () {

            var cal_id = $('.cal_check:checkbox:checked').map(function() {
                return this.id;
            }).get();
            if(cal_id.length <= 0){
                alert("Please Select At Least One Calculator!");
                return false;
            }
            $('#calculator').val(cal_id);

        });

        $(".copy").click(function () {
            $(this).text("Copied");
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($("#clipboard").text()).select();
            $("#clipboard").addClass("alert alert-success")
            document.execCommand("copy");
            $temp.remove();
php
        });



    });

    function isEmpty( el ){
        return !$.trim(el.html())
    }
</script>
<script>
    var  base_url="http://127.0.0.1:8000/";
    $(document).on("click", ".page-link", function(event){
        event.preventDefault();
        var page=$(this).html();
        $.ajax({
            method: "GET",
            url: base_url+"add/calculators?page="+page,
            success:function (result) {
                // console.log($(result)[0].id);
                var div_id=$(result)[0].id;
                if(!$("#"+div_id).length){
                    $("#product-detail").append($(result)[0]);
                    var div = $('#product-detail');
                    // console.log(div);
                    // $('#product-detail').animate({"scrollTop": $('#product-detail').prop("scrollHeight")}, 500);
                }
                $("#links").html($(result)[2]);

            }

        });

    });
    $(document).on("click", ".product_check", function(event){
        var pro_id=$(this).prop("id");
        if($(this).prop("checked")){
            $("."+pro_id).prop("checked","checked");
        }else {
            $("."+pro_id).prop("checked",false);
        }

    });
    $(document).on("click", ".check", function(event){
        var pro_id=$(this).prop("id");
            pro_id=pro_id.split("_");

            var id=pro_id[1];
        console.log(id);
        if($(this).prop("checked")){
            $(".var_"+id).prop("checked","checked");
        }else {
            $(".var_"+id).prop("checked",false);
        }

    });
</script>

</html>
