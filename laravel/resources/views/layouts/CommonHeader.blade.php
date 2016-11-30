<!DOCTYPE html>
<html lang="en" class="no-js" >
<!--<![endif]-->

<head>
    <title>SPORTS - 运动社交平台</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="shortcut icon" href="{{asset('/')}}favicon.ico">
    <!-- CSS -->
    {{--@if($_PAGE=='basic'||$_PAGE=='basic.other'||$_PAGE=='sports'||$_PAGE=='showContest')--}}
        {{--<link href="{{asset('/')}}css/table.css" rel="stylesheet" type="text/css">--}}
    {{--@endif--}}
    <link rel="stylesheet" href="{{asset('/')}}css/preloader.css">
    <link href="{{asset('/')}}css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="{{asset('/')}}css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('/')}}css/awesome-bootstrap-checkbox.css" type="text/css">
    <link href="{{asset('/')}}css/main.css" rel="stylesheet" type="text/css">
    <link href="{{asset('/')}}css/style-switcher.css" rel="stylesheet" type="text/css">
    <link href="{{asset('/')}}css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <link href=" https://cdn.datatables.net/autofill/2.1.2/css/autoFill.dataTables.min.css" type="text/css">
    @if($_PAGE=='editComment'||$_PAGE=='basic.modify'||$_PAGE=='createContest'||$_PAGE=='modifyContest')
        <link href="{{asset('/')}}css/wangEditor.css" rel="stylesheet" type="text/css">
    @endif
    <link href="{{asset('/')}}css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="{{asset('/')}}js/king-common.js"></script>
    <script src="{{asset('/')}}js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/autofill/2.1.2/js/dataTables.autoFill.min.js"></script>
    {{--<style type="text/css">--}}
    <script src="{{asset('/')}}js/bootstrap.min.js"></script>
    <script src="{{asset('/')}}js/bootstrap-datetimepicker.min.js"></script>
        {{--#allmap {width: 25%;height: 25%;overflow: hidden;margin:0;font-family:"微软雅黑";}--}}
    {{--</style>--}}
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=EQRCjCyVfZ2rzY9CeM8GqVZe1cR1c2bv"></script>
    <script src="http://api.map.baidu.com/library/RichMarker/1.2/src/RichMarker_min.js"></script>

    <script src="http://api.map.baidu.com/library/MarkerTool/1.2/src/MarkerTool_min.js"></script>

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
                                                <a href="/">
                                                    <i class="fa fa-power-off"></i>
                                                    <span class="text" id="logout"  onclick='logout()'>Logout</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/">
                                                    <i class="fa fa-power-off"></i>
                                                    <span class="text" id="logout"  onclick='logout()'>Logout</span>
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
                            <li class="active"><a href="/commentPage"><i class="fa fa-star fa-fw"></i><span class="text">动态</span></a></li>
                            <li><a href="#" class="js-sub-menu-toggle"><i class="fa fa-list-ul fa-fw"></i><span class="text">个人信息</span>
                                    <i class="toggle-icon fa fa-angle-left"></i></a>
                                <ul class="sub-menu ">
                                    <li><a href="/self/basic"><span class="text">个人基本信息</span></a></li>
                                    <li><a href="/self/sports"><span class="text">个人运动详细信息 <span class="badge element-bg-color-blue">New</span></span></a></li>
                                </ul>
                            </li>
                            <li><a href="#" class="js-sub-menu-toggle"><i class="fa fa-th-large fw"></i><span class="text">竞赛信息</span>
                                    <i class="toggle-icon fa fa-angle-left"></i></a>
                                <ul class="sub-menu ">
                                    <li><a href="/contest/showContest"><span class="text">竞赛信息一览</span></a></li>
                                    <li><a href="/contest/createContest"><span class="text">发布竞赛信息</span></a></li>
                                </ul>
                            </li>
                            <!--analysis&strategy-->
                            <li><a href="#" class="js-sub-menu-toggle"><i class="fa fa-file-text-o fw"></i><span class="text">分析 &amp; 建议</span>
                                    <i class="toggle-icon fa fa-angle-left"></i></a>
                                <ul class="sub-menu ">
                                    <li><a href="/analyze/dataAnalyze"><span class="text">数据分析</span></a></li>
                                    <li><a href="/analyze/recomend"><span class="text">运动推荐</span></a></li>
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

<script type="application/javascript">
    function logout() {
        $.ajax({
            type: 'POST',
            url: '/logout',
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content')
            },
            success:function () {
                window.location.replace('/');
            }
        });
    }
</script>
@if($_PAGE=='editComment')
    <script src="{{asset('/')}}js/wangEditor.js"></script>
    <script src="{{asset('/')}}js/edit/editor.js"></script>
@endif
@if($_PAGE=='basic.modify')
    <script src="{{asset('/')}}js/wangEditor.js"></script>
    <script src="{{asset('/')}}js/person/basic.js"></script>
@endif
@if($_PAGE=='basic')
    <script src="{{asset('/')}}js/person/friend.js"></script>
    @endif
@if($_PAGE=='sports')
    <script src="{{asset('/')}}js/echarts.common.min.js"></script>
    <script src="{{asset('/')}}js/person/sports.js"></script>
@endif
@if($_PAGE=='dataAnalyze')
    <script src="{{asset('/')}}js/echarts.common.min.js"></script>
    <script src="{{asset('/')}}js/analyze/record.js"></script>
@endif
@if($_PAGE=='createContest')
    <script src="{{asset('/')}}js/wangEditor.js"></script>
    <script src="{{asset('/')}}js/contest/create.js"></script>
    <script type="application/javascript" src="{{asset('/')}}js/baiduMap.js"></script>
@endif
@if($_PAGE=='showContest')

    <script src="{{asset('/')}}js/contest/show.js"></script>
    @endif
@if($_PAGE=='modifyContest')
    <script src="{{asset('/')}}js/wangEditor.js"></script>
    <script src="{{asset('/')}}js/contest/modify.js"></script>
    <script type="application/javascript" src="{{asset('/')}}js/baiduMap.js"></script>
@endif
</html>
