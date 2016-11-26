<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie ie9" lang="en" class="no-js"> [endif] -->
<!--[if !(IE)]>
<!-->
<html lang="en" class="no-js" >
<!--<![endif]-->

<head>
    <title>SPORTS - 运动社交平台</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('/')}}css/preloader.css">
    <link href="{{asset('/')}}css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="{{asset('/')}}css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <link href="{{asset('/')}}css/main.css" rel="stylesheet" type="text/css">
    <link href="{{asset('/')}}css/style-switcher.css" rel="stylesheet" type="text/css">
    <link href="{{asset('/')}}css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    @if($_PAGE=='editComment')
        <link href="{{asset('/')}}css/wangEditor.css" rel="stylesheet" type="text/css">
    @endif

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="{{asset('/')}}js/king-common.js"></script>

</head>

<body>

<!-- WRAPPER -->
<div class="wrapper">
    <!-- TOP BAR -->
    <div class="top-bar" >
        <div class="container">
            <div class="row">
                <!-- logo -->
                <div class="col-md-2 logo"  >
                    <a class="logo"; href="/" style="color:#fff;">Your SPORTS manager</a>
                </div>
                <!-- end logo -->

                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-9">
                            <div class="top-bar-right">
                                <!-- responsive menu bar icon -->
                                <a href="#" class="hidden-md hidden-lg main-nav-toggle"><i class="fa fa-bars"></i></a>
                                <div class="logged-user">
                                    <div class="btn-group">
                                        <a href="/" class="btn btn-link dropdown-toggle" data-toggle="dropdown">
                                            <i id="icon" class="fa fa-user"></i>
                                            <span class="name" id="name"  >{{$username}}</span> <span id="tar"  class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu" role="menu" id="down">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-power-off"></i>
                                                    <span class="text" id="logout"  onclick=javascript:Logout();>Logout</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- end logged user and the menu -->

                            </div>
                            <!-- /top-bar-right -->
                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /top -->

    <!-- BOTTOM: LEFT NAV AND RIGHT MAIN CONTENT -->
    <div class="bottom">
        <div class="container" >
            <div class="row" >
                <!-- left sidebar -->
                <div class="col-md-2 left-sidebar" >
                    <!-- main-homePage -->
                    <nav class="main-nav" >
                        <ul class="main-menu" >
                            <!--main active-->
                            <!--             <li><a href="../commentPage/commentPage.html"><i class="fa fa-home fa-fw"></i><span class="text">首页</span></a></li>
                                        <!--my favor-->
                            <li class="active"><a href="commentPage"><i class="fa fa-star fa-fw"></i><span class="text">动态</span></a></li>
                            <li><a href="#" class="js-sub-menu-toggle"><i class="fa fa-list-ul fa-fw"></i><span class="text">个人信息</span>
                                    <i class="toggle-icon fa fa-angle-left"></i></a>
                                <ul class="sub-menu ">
                                    <li><a href="self/basic"><span class="text">个人基本信息</span></a></li>
                                    <li><a href="self/sports"><span class="text">个人运动详细信息 <span class="badge element-bg-color-blue">New</span></span></a></li>
                                </ul>
                            </li>
                            <li><a href="#" class="js-sub-menu-toggle"><i class="fa fa-line-chart fa-fw"></i><span class="text">组织信息</span>
                                    <i class="toggle-icon fa fa-angle-left"></i></a>
                                <ul class="sub-menu ">
                                    <li><a href="organization/orginfo"><span class="text">组织信息</span></a></li>
                                </ul>
                            </li>
                            <li><a href="#" class="js-sub-menu-toggle"><i class="fa fa-th-large fw"></i><span class="text">竞赛信息</span>
                                    <i class="toggle-icon fa fa-angle-left"></i></a>
                                <ul class="sub-menu ">
                                    <li><a href="contest/showContest"><span class="text">竞赛信息一览</span></a></li>
                                    <li><a href="contest/createContest"><span class="text">发布竞赛信息</span></a></li>
                                </ul>
                            </li>
                            <!--analysis&strategy-->
                            <li><a href="#" class="js-sub-menu-toggle"><i class="fa fa-file-text-o fw"></i><span class="text">分析 &amp; 建议</span>
                                    <i class="toggle-icon fa fa-angle-left"></i></a>
                                <ul class="sub-menu ">
                                    <li><a href="analyze/dataAnalyze"><span class="text">数据分析</span></a></li>
                                    <li><a href="analyze/recomend"><span class="text">运动推荐</span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- /main-homePage -->
                    <div class="sidebar-minified js-toggle-minified">
                        <i class="fa fa-angle-left"></i>
                    </div>
                </div>
                <!-- end left sidebar -->
                @yield('content')
            </div>
            <!-- END BOTTOM: LEFT NAV AND RIGHT MAIN CONTENT -->
        </div>
    </div>
        <!-- /wrapper -->

        <!-- FOOTER -->
        <footer class="footer" style="opacity: 0.8; height:40px; width:100%;font-size: 11px; color:#fff;">
            <div class="g-ft" style="text-align: center ;">
                   <span class="m-ft2" >
                             <span style="margin-left:20px;"><i  class="fa fa-envelope" style="margin-right: 1px;margin-top: -5px;"></i> 联系我们：<a href="mailto:141250018@smail.nju.edu.cn" style="color: #fff;">141250018@smail.nju.edu.cn</a></span>
                            <span>&nbsp;|</span>
                        </span>

                <span class="m-ft1" style="color:#cecece">cxworks版权所有　&copy;2015-2016　
                            <a rel="nofollow" target="_blank" href="http://www.miibeian.gov.cn/" style="position:relative;color: #FFF;">
                            </a>
                        </span>
            </div>
        </footer>


    </div>

</body>
@if($_PAGE=='editComment')
    <script src="{{asset('/')}}js/wangEditor.js"></script>
    <script src="{{asset('/')}}js/edit/editor.js"></script>
@endif
</html>
