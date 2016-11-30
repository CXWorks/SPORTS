@extends('layouts.CommonHeader')
@section('content')
    <!-- content-wrapper -->
    <div class="col-md-10 content-wrapper">
        <!-- top general alert -->

        <!-- main -->
        <div class="content">
            <script type="application/javascript">
                var rank={{$rank}};
            </script>
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
                        <table id="table_id" class="display" >
                            <thead>
                            <tr>
                                <th style="color: black">Sports</th>
                                <th style="color: black">Time</th>
                                <th style="color: black">Date</th>
                                <th style="color: black">Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($records as $record)
                            <tr>
                                <td style="color: black">{{$record->sports}}</td>
                                <td style="color: black">{{$record->minute}} mins</td>
                                <td style="color: black">{{$record->created_at->format('Y-m-d')}}</td>
                                <td style="color: black">{{$record->word}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <script type="application/javascript">
                            $('#table_id').DataTable({
                                autoFill:true
                            });
                        </script>


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
                        <table id="table_id2" class="display" >
                            <thead>
                            <tr>
                                <th style="color: black">contest_id</th>
                                <th style="color: black">Date</th>
                                <th style="color: black">JoinDate</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contests as $contest)
                                <tr>
                                    <td style="color: black">{{$contest->contest_id}}</td>
                                    <td style="color: black">{{$contest->contest_date->format('Y-m-d')}}</td>
                                    <td style="color: black">{{$contest->created_at->format('Y-m-d')}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <script type="application/javascript">
                            $('#table_id2').DataTable({
                                autoFill:true
                            });
                        </script>

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