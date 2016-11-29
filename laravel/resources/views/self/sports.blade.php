@extends('layouts.CommonHeader')
@section('content')
    <!-- content-wrapper -->
    <div class="col-md-10 content-wrapper">
        <!-- top general alert -->

        <!-- main -->
        <div class="content">

            <div class="main-header">
                <h2>个人运动</h2>
                <em>the least information</em>
            </div>
            <div class="main-content" id="app2" ng-app="myFavorApp"  >
                <!--row example-->
                <div><p><br/><br/></p></div>
                <div class="widget widget-table">
                    <div class="widget-header" ng-controller="myFavorCtrl">
                        <h3><i class="fa fa-group"></i>运动记录</h3> <em>- List of concerned SPORTSs</em>
                        <div class="btn-group widget-header-toolbar">
                            <a href="#" title="Focus" class="btn-borderless btn-focus"><i class="fa fa-eye"></i></a>
                            <a href="#" title="Expand/Collapse" class="btn-borderless btn-toggle-expand"><i class="fa fa-chevron-up"></i></a>
                            <a href="#" title="Remove" class="btn-borderless btn-remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="widget-content" >
                        <div class="rTable">
                            <div class="rTableRow">
                                <div class="rTableHead" style="background-color: lavender"><strong>Sports</strong></div>
                                <div class="rTableHead" style="background-color: lavenderblush"><span style="font-weight: bold;">Time</span></div>
                                <div class="rTableHead" style="background-color: blanchedalmond"><span style="font-weight: bold;">Date</span></div>
                                <div class="rTableHead" style="background-color: lightgrey"><strong>Details</strong></div>
                            </div>
                            @foreach($records as $record)
                                <div class="rTableRow">
                                    <div class="rTableCell">{{$record->sports}}</div>

                                    <div class="rTableCell">{{$record->minute}} mins</div>
                                    <div class="rTableCell">{{$record->created_at->format('Y-m-d')}}</div>
                                    <div class="rTableCell">{{$record->word}}</div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <!-- END WIDGET TICKET TABLE -->

            </div>
            <div class="main-content" id="app2" ng-app="myFavorApp"  >
                <!--row example-->
                <div><p><br/><br/></p></div>
                <div class="widget widget-table">
                    <div class="widget-header" ng-controller="myFavorCtrl">
                        <h3><i class="fa fa-group"></i>竞赛信息</h3> <em>- List of concerned SPORTSs</em>
                        <div class="btn-group widget-header-toolbar">
                            <a href="#" title="Focus" class="btn-borderless btn-focus"><i class="fa fa-eye"></i></a>
                            <a href="#" title="Expand/Collapse" class="btn-borderless btn-toggle-expand"><i class="fa fa-chevron-up"></i></a>
                            <a href="#" title="Remove" class="btn-borderless btn-remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="widget-content" >
                        <div class="rTable">
                            <div class="rTableRow">
                                <div class="rTableHead"><strong>contest_id</strong></div>
                                <div class="rTableHead"><span style="font-weight: bold;">Date</span></div>
                                <div class="rTableHead"><strong>JoinDate</strong></div>
                            </div>
                            @foreach($contests as $contest)
                                <div class="rTableRow">
                                    <div class="rTableCell">{{$contest->contest_id}}</div>
                                    <div class="rTableCell">{{$contest->contest_date}}</div>
                                    <div class="rTableCell">{{$contest->created_at}}</div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <!-- END WIDGET TICKET TABLE -->

            </div>
            <div class="main-content" id="app2" ng-app="myFavorApp"  >
                <!--row example-->
                <div><p><br/><br/></p></div>
                <div class="widget widget-table">
                    <div class="widget-header" ng-controller="myFavorCtrl">
                        <h3><i class="fa fa-group"></i>成长记录</h3> <em>- List of concerned SPORTSs</em>
                        <div class="btn-group widget-header-toolbar">
                            <a href="#" title="Focus" class="btn-borderless btn-focus"><i class="fa fa-eye"></i></a>
                            <a href="#" title="Expand/Collapse" class="btn-borderless btn-toggle-expand"><i class="fa fa-chevron-up"></i></a>
                            <a href="#" title="Remove" class="btn-borderless btn-remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="widget-content" >
                        <div id="main3" style="width: inherit;height:150px;"></div>
                    </div>
                </div>
                <!-- END WIDGET TICKET TABLE -->

            </div>
            <!-- /main-content -->

        </div>
        <!-- /main -->

    </div>
@endsection