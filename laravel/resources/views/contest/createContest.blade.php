@extends('layouts.CommonHeader')
@section('content')
    <div class="col-md-10 content-wrapper">


        <!-- main -->
        <div class="editcontent">

            <div class="main-header">
                <h2>发布竞赛</h2>
                <em>organize a contest and do sports with other people</em>
            </div>
            <div class="widget widget-table">
                <div class="widget-header" ng-controller="myFavorCtrl">
                    <h3><i class="fa fa-group"></i>竞赛</h3> <em>- List of your CONTESTs</em>
                    <div class="btn-group widget-header-toolbar">
                        <a href="#" title="Focus" class="btn-borderless btn-focus"><i class="fa fa-eye"></i></a>
                        <a href="#" title="Expand/Collapse" class="btn-borderless btn-toggle-expand"><i class="fa fa-chevron-up"></i></a>
                    </div>
                </div>
                <div class="row widget-content" >
                    <div class="col-md-1" >
                        <h3>组织者</h3>
                        <h5>{{$username}}</h5>
                    </div>
                    <div class="col-md-3">
                        <h3>时间</h3>
                        <div style="overflow:hidden;">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div id="datetimepicker12"></div>
                                    </div>
                                </div>
                            </div>
                            <script type="text/javascript">
                                $(function () {
                                    $('#datetimepicker12').datetimepicker({
                                        inline: true,
                                        sideBySide: true,
                                        format:'YYYY-MM-DD'
                                    });
                                });
                            </script>
                        </div>
                    </div>
                        <div class="col-md-8" style="height: auto">
                            <h3>地点</h3>
                            <div id="allmap" style="width: inherit;height: 400px"></div>
                        </div>
                </div>
            </div>



            <div class="editor" id="editor">
            </div>
            <button type="submit" class="btn btn-primary" onclick="submitContest()">
                发布
            </button>
        </div>
        <!-- /row -->
    </div>
@endsection
