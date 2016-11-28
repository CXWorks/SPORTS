@extends('layouts.CommonHeader')
@section('content')
    <!-- content-wrapper -->
    <div class="col-md-10 content-wrapper">


        <!-- main -->
        <div class="content">

            <div class="main-header">
                <h2>数据</h2>
                <em>the least information</em>
            </div>
            <div class="main-content">

                <div class="widget widget-table">
                    <div class="widget-header" ng-controller="myFavorCtrl">
                        <h3><i class="fa fa-group"></i>我的运动记录</h3> <em>- List of your SPORTSs</em>
                        <div class="btn-group widget-header-toolbar">
                            <a href="#" title="Focus" class="btn-borderless btn-focus"><i class="fa fa-eye"></i></a>
                            <a href="#" title="Expand/Collapse" class="btn-borderless btn-toggle-expand"><i class="fa fa-chevron-up"></i></a>
                            <a href="#" title="Remove" class="btn-borderless btn-remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="widget-content" >
                        <div id="main" style="width: 600px;height:400px;"></div>
                    </div>
                </div>
                <!-- END WIDGET TICKET TABLE -->

            </div>
            <!-- /main-content -->
            <div class="main-content">

                <div class="widget widget-table">
                    <div class="widget-header" ng-controller="myFavorCtrl">
                        <h3><i class="fa fa-group"></i>我的身体记录</h3> <em>- List of your body</em>
                        <div class="btn-group widget-header-toolbar">
                            <a href="#" title="Focus" class="btn-borderless btn-focus"><i class="fa fa-eye"></i></a>
                            <a href="#" title="Expand/Collapse" class="btn-borderless btn-toggle-expand"><i class="fa fa-chevron-up"></i></a>
                            <a href="#" title="Remove" class="btn-borderless btn-remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="widget-content" >
                        <div id="main2" style="width: 600px;height:400px;"></div>
                    </div>
                </div>
                <!-- END WIDGET TICKET TABLE -->

            </div>
            <div class="main-content">

                <div class="widget widget-table">
                    <div class="widget-header" ng-controller="myFavorCtrl">
                        <h3><i class="fa fa-group"></i>我的消耗记录</h3> <em>- List of your cost</em>
                        <div class="btn-group widget-header-toolbar">
                            <a href="#" title="Focus" class="btn-borderless btn-focus"><i class="fa fa-eye"></i></a>
                            <a href="#" title="Expand/Collapse" class="btn-borderless btn-toggle-expand"><i class="fa fa-chevron-up"></i></a>
                            <a href="#" title="Remove" class="btn-borderless btn-remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="widget-content" >
                        <div id="main3" style="width: 600px;height:400px;"></div>
                    </div>
                </div>
                <!-- END WIDGET TICKET TABLE -->

            </div>
        </div>
        <!-- /main -->

    </div>
@endsection