@extends('layouts.CommonHeader')
@section('content')
    <!-- content-wrapper -->
    <div class="col-md-10 content-wrapper">


        <!-- main -->
        <div class="content">

            <div class="main-header">
                <h2>竞赛</h2>
                <em>the competions</em>
            </div>
            <div class="main-content">
                <!--row example-->
                <div><p><br/><br/></p></div>
                <div class="widget widget-table">
                    <div class="widget-header" ng-controller="myFavorCtrl">
                        <h3><i class="fa fa-group"></i>我的竞赛</h3> <em>- List of your CONTESTs</em>
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
                        @foreach($joins as $join)
                            <div class="rTableRow">
                                <div class="rTableCell">{{$join->contest_id}}</div>
                                <div class="rTableCell">{{$join->contest_date}}</div>
                                <div class="rTableCell">{{$join->created_at}}</div>
                            </div>
                        @endforeach
                            </div>
                    </div>
                </div>
                <!-- END WIDGET TICKET TABLE -->

            </div>
            <!-- /main-content -->
            @foreach($contests as $contest)
            <div class="main-content">
                <!--row example-->
                <div><p><br/><br/></p></div>
                <div class="widget widget-table">
                    <div class="widget-header" ng-controller="myFavorCtrl">
                        <h3><i class="fa fa-group"></i>可加入的竞赛</h3> <em>- List of ongoing CONTESTs</em>
                        <div class="btn-group widget-header-toolbar">
                            <a href="#" title="Focus" class="btn-borderless btn-focus"><i class="fa fa-eye"></i></a>
                            <a href="#" title="Expand/Collapse" class="btn-borderless btn-toggle-expand"><i class="fa fa-chevron-up"></i></a>
                            <a href="#" title="Remove" class="btn-borderless btn-remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="widget-content" >
                        <h5>ID {{$contest->id}}</h5>
                       <h5>Organizer <a href="/info?email={{$contest->pub_email}}" ><strong>{{$contest->publisher}}</strong></a></h5>
                        <h5>E-mail <a href="mailto:{{$contest->pub_email}}">{{$contest->pub_email}}</a></h5>
                        <h5>Date <strong>{{$contest->date}}</strong></h5>
                        </br>
                        </br>
                        {!! $contest->description !!}
                        </br>
                        @if($username==$contest->publisher)
                            <button type="button" class="btn btn-success" onclick="finsihContest({{$contest->id}})">Finish</button>
                            @elseif($joins->where('contest_id',$contest->id)->isEmpty())
                            <button type="button" class="btn btn-primary" onclick="joinContest({{$contest->id}})">Join</button>
                            @endif
                    </div>
                </div>
                <!-- END WIDGET TICKET TABLE -->

            </div>
            @endforeach
        </div>
        <!-- /main -->

    </div>
    <!-- /content-wrapper -->

@endsection