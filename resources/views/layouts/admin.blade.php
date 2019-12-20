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
    <link rel="stylesheet" href="{{asset('argon/assets/css/typography.css')}}">
    <link rel="stylesheet" href="{{asset('argon/assets/css/default-css.css')}}">
    <link rel="stylesheet" href="{{asset('argon/assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('argon/assets/css/responsive.css')}}">

    <script src="{{asset('argon/assets/js/vendor/modernizr-2.8.3.min.js')}}" type="336a54725e1001768da42d39-text/javascript"></script>
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
                        <h4 class="user-name"><a href='{{url("/logout")}}'  style="color: #ffff">Log Out</a></h4>
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


<div class="offset-area">
    <div class="offset-close"><i class="ti-close"></i></div>
    <ul class="nav offset-menu-tab">
        <li><a class="active" data-toggle="tab" href="#activity">Activity</a></li>
        <li><a data-toggle="tab" href="#settings">Settings</a></li>
    </ul>
    <div class="offset-content tab-content">
        <div id="activity" class="tab-pane fade in show active">
            <div class="recent-activity">
                <div class="timeline-task">
                    <div class="icon bg1">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <div class="tm-title">
                        <h4>Rashed sent you an email</h4>
                        <span class="time"><i class="ti-time"></i>09:35</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                    </p>
                </div>
                <div class="timeline-task">
                    <div class="icon bg2">
                        <i class="fa fa-check"></i>
                    </div>
                    <div class="tm-title">
                        <h4>Added</h4>
                        <span class="time"><i class="ti-time"></i>7 Minutes Ago</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur.
                    </p>
                </div>
                <div class="timeline-task">
                    <div class="icon bg2">
                        <i class="fa fa-exclamation-triangle"></i>
                    </div>
                    <div class="tm-title">
                        <h4>You missed you Password!</h4>
                        <span class="time"><i class="ti-time"></i>09:20 Am</span>
                    </div>
                </div>
                <div class="timeline-task">
                    <div class="icon bg3">
                        <i class="fa fa-bomb"></i>
                    </div>
                    <div class="tm-title">
                        <h4>Member waiting for you Attention</h4>
                        <span class="time"><i class="ti-time"></i>09:35</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                    </p>
                </div>
                <div class="timeline-task">
                    <div class="icon bg3">
                        <i class="ti-signal"></i>
                    </div>
                    <div class="tm-title">
                        <h4>You Added Kaji Patha few minutes ago</h4>
                        <span class="time"><i class="ti-time"></i>01 minutes ago</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                    </p>
                </div>
                <div class="timeline-task">
                    <div class="icon bg1">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <div class="tm-title">
                        <h4>Ratul Hamba sent you an email</h4>
                        <span class="time"><i class="ti-time"></i>09:35</span>
                    </div>
                    <p>Hello sir , where are you, i am egerly waiting for you.
                    </p>
                </div>
                <div class="timeline-task">
                    <div class="icon bg2">
                        <i class="fa fa-exclamation-triangle"></i>
                    </div>
                    <div class="tm-title">
                        <h4>Rashed sent you an email</h4>
                        <span class="time"><i class="ti-time"></i>09:35</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                    </p>
                </div>
                <div class="timeline-task">
                    <div class="icon bg2">
                        <i class="fa fa-exclamation-triangle"></i>
                    </div>
                    <div class="tm-title">
                        <h4>Rashed sent you an email</h4>
                        <span class="time"><i class="ti-time"></i>09:35</span>
                    </div>
                </div>
                <div class="timeline-task">
                    <div class="icon bg3">
                        <i class="fa fa-bomb"></i>
                    </div>
                    <div class="tm-title">
                        <h4>Rashed sent you an email</h4>
                        <span class="time"><i class="ti-time"></i>09:35</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                    </p>
                </div>
                <div class="timeline-task">
                    <div class="icon bg3">
                        <i class="ti-signal"></i>
                    </div>
                    <div class="tm-title">
                        <h4>Rashed sent you an email</h4>
                        <span class="time"><i class="ti-time"></i>09:35</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                    </p>
                </div>
            </div>
        </div>
        <div id="settings" class="tab-pane fade">
            <div class="offset-settings">
                <h4>General Settings</h4>
                <div class="settings-list">
                    <div class="s-settings">
                        <div class="s-sw-title">
                            <h5>Notifications</h5>
                            <div class="s-swtich">
                                <input type="checkbox" id="switch1" />
                                <label for="switch1">Toggle</label>
                            </div>
                        </div>
                        <p>Keep it 'On' When you want to get all the notification.</p>
                    </div>
                    <div class="s-settings">
                        <div class="s-sw-title">
                            <h5>Show recent activity</h5>
                            <div class="s-swtich">
                                <input type="checkbox" id="switch2" />
                                <label for="switch2">Toggle</label>
                            </div>
                        </div>
                        <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                    </div>
                    <div class="s-settings">
                        <div class="s-sw-title">
                            <h5>Show your emails</h5>
                            <div class="s-swtich">
                                <input type="checkbox" id="switch3" />
                                <label for="switch3">Toggle</label>
                            </div>
                        </div>
                        <p>Show email so that easily find you.</p>
                    </div>
                    <div class="s-settings">
                        <div class="s-sw-title">
                            <h5>Show Task statistics</h5>
                            <div class="s-swtich">
                                <input type="checkbox" id="switch4" />
                                <label for="switch4">Toggle</label>
                            </div>
                        </div>
                        <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                    </div>
                    <div class="s-settings">
                        <div class="s-sw-title">
                            <h5>Notifications</h5>
                            <div class="s-swtich">
                                <input type="checkbox" id="switch5" />
                                <label for="switch5">Toggle</label>
                            </div>
                        </div>
                        <p>Use checkboxes when looking for yes or no answers.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{asset('argon/assets/js/vendor/jquery-2.2.4.min.js')}}" type="text/javascript"></script>

<script src="{{asset('argon/assets/js/popper.min.js')}}" type="336a54725e1001768da42d39-text/javascript"></script>
<script src="{{asset('argon/assets/js/bootstrap.min.js')}}" type="336a54725e1001768da42d39-text/javascript"></script>
<script src="{{asset('argon/assets/js/owl.carousel.min.js')}}" type="336a54725e1001768da42d39-text/javascript"></script>
<script src="{{asset('argon/assets/js/metisMenu.min.js')}}" type="336a54725e1001768da42d39-text/javascript"></script>
<script src="{{asset('argon/assets/js/jquery.slimscroll.min.js')}}" type="336a54725e1001768da42d39-text/javascript"></script>
<script src="{{asset('argon/assets/js/jquery.slicknav.min.js')}}" type="336a54725e1001768da42d39-text/javascript"></script>

<script src="{{asset('argon/cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js')}}" type="336a54725e1001768da42d39-text/javascript"></script>

<script src="{{asset('argon/code.highcharts.com/highcharts.js')}}" type="336a54725e1001768da42d39-text/javascript"></script>

<script src="{{asset('argon/cdn.zingchart.com/zingchart.min.js')}}" type="336a54725e1001768da42d39-text/javascript"></script>
<script type="336a54725e1001768da42d39-text/javascript">
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>

<script src="{{asset('argon/assets/js/line-chart.js')}}" type="336a54725e1001768da42d39-text/javascript"></script>

<script src="{{asset('argon/assets/js/pie-chart.js')}}" type="336a54725e1001768da42d39-text/javascript"></script>

<script src="{{asset('argon/assets/js/plugins.js')}}" type="336a54725e1001768da42d39-text/javascript"></script>
<script src="{{asset('argon/assets/js/scripts.js')}}" type="336a54725e1001768da42d39-text/javascript"></script>

<script src="{{asset('argon/ajax.cloudflare.com/cdn-cgi/scripts/95c75768/cloudflare-static/rocket-loader.min.js')}}" data-cf-settings="336a54725e1001768da42d39-|49" defer=""></script></body>
<
<!-- Mirrored from colorlib.com/polygon/srtdash/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Nov 2019 01:19:41 GMT -->
</html>
