@extends('layouts.CommonHeader')

@section('content')
    <!-- content-wrapper -->
    <div class="col-md-10 content-wrapper">
        <!-- top general alert -->

        <!-- end top general alert -->

        <div class="row">
            <div class="col-lg-4 ">

            </div>
            <div class="col-lg-7"></div>
            <div class="col-lg-1 ">
                <span class='pulse-button' style="margin-right: 5px;"><a href="../communityPage/community.html" style="color: white; text-align: center"></br>社区</a></span>
            </div>
        </div>

        <!-- main -->
        <div class="content">

            <div class="main-header">
                <h2>个人信息</h2>
                <em>self information</em>
            </div>
            <div class="main-content">
                <div class="widget widget-table">
                    <div class="widget-header" ng-controller="myFavorCtrl">
                        <h3><i class="fa fa-group"></i>个人基本信息</h3> <em>- List of concerned SPORTSs</em>
                        <div class="btn-group widget-header-toolbar">
                            <a href="#" title="Focus" class="btn-borderless btn-focus"><i class="fa fa-eye"></i></a>
                            <a href="#" title="Expand/Collapse" class="btn-borderless btn-toggle-expand"><i class="fa fa-chevron-up"></i></a>
                            <a href="#" title="Remove" class="btn-borderless btn-remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="widget-content" >
                    </div>
                </div>
                <!-- END WIDGET TICKET TABLE -->

            </div>
            <div class="main-content">
                <div class="widget widget-table">
                    <div class="widget-header" ng-controller="myFavorCtrl">
                        <h3><i class="fa fa-group"></i>个人体质信息</h3> <em>- List of concerned SPORTSs</em>
                        <div class="btn-group widget-header-toolbar">
                            <a href="#" title="Focus" class="btn-borderless btn-focus"><i class="fa fa-eye"></i></a>
                            <a href="#" title="Expand/Collapse" class="btn-borderless btn-toggle-expand"><i class="fa fa-chevron-up"></i></a>
                            <a href="#" title="Remove" class="btn-borderless btn-remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="widget-content" >
                    </div>
                </div>
                <!-- END WIDGET TICKET TABLE -->

            </div>
            <div class="main-content">
                <div class="widget widget-table">
                    <div class="widget-header" ng-controller="myFavorCtrl">
                        <h3><i class="fa fa-group"></i>朋友列表</h3> <em>- List of concerned SPORTSs</em>
                        <div class="btn-group widget-header-toolbar">
                            <a href="#" title="Focus" class="btn-borderless btn-focus"><i class="fa fa-eye"></i></a>
                            <a href="#" title="Expand/Collapse" class="btn-borderless btn-toggle-expand"><i class="fa fa-chevron-up"></i></a>
                            <a href="#" title="Remove" class="btn-borderless btn-remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="widget-content" >
                    </div>
                </div>
                <!-- END WIDGET TICKET TABLE -->

            </div>
            <!-- /main-content -->

        </div>
        <!-- /main -->

    </div>

@endsection