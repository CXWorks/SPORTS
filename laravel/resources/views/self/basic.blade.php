@extends('layouts.CommonHeader')

@section('content')
    <!-- content-wrapper -->
    <div class="col-md-10 content-wrapper">


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
                        {!! $person->info !!}
                        </br>
                        @if($_PAGE=='basic')
                        <input type="button" value="修改" class="btn btn-primary" onclick="location.href='basic/modify?m=info'"/>

                        </input>
                        @endif
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
                        {!! $person->body !!}
                        </br>
                        @if($_PAGE=='basic')
                        <input type="button" value="修改" class="btn btn-primary" onclick="location.href='basic/modify?m=body'">

                        </input>
                        @endif
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
                        <div class="rTable">
                            <div class="rTableRow">
                                <div class="rTableHead"><strong>Name</strong></div>
                                <div class="rTableHead"><span style="font-weight: bold;">E-mail</span></div>
                                <div class="rTableHead"><strong>Begin Date</strong></div>
                            </div>
                            @foreach($friends as $friend)
                            <div class="rTableRow">
                                <div class="rTableCell"><a href="/info?email={{$friend->temail}}">{{$friend->tname }}</a> </div>
                                <div class="rTableCell"><a href="mailto:{{$friend->temail}}">{{$friend->temail}}</a></div>
                                <div class="rTableCell">{{$friend->created_at}}</div>
                            </div>
                            @endforeach
                                    @if($_PAGE=='basic')
                            </br>
                            </br>
                            <div class="input-group input-group-xs">
                            <input type="text" type="text" class="form-control" placeholder="name or email" id="newFriend">

                            </input>
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" onclick="addNewFriend()">Add!</button>
                                </span>

                            </div>
                                @endif
                        </div>
                    </div>
                </div>
                <!-- END WIDGET TICKET TABLE -->

            </div>
            <!-- /main-content -->

        </div>
        <!-- /main -->

    </div>

@endsection