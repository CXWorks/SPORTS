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


                        <table id="table_id" class="display" >
                            <thead>
                            <tr>
                                <th style="color: black">contest_id</th>

                                <th style="color: black">Date</th>
                                <th style="color: black">JoinDate</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($joins as $join)
                                <tr>
                                    <td style="color: black">{{$join->contest_id}}</td>
                                    <td style="color: black">{{$join->contest_date}}</td>
                                    <td style="color: black">{{$join->created_at}}</td>
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
                        <div class="row">
                            <div class="col-md-3">
                        <h5>ID {{$contest->id}}</h5>
                       <h5>Organizer <a href="/info?email={{$contest->pub_email}}" ><strong>{{$contest->publisher}}</strong></a></h5>
                        <h5>E-mail <a href="mailto:{{$contest->pub_email}}">{{$contest->pub_email}}</a></h5>
                        <h5>Date <strong>{{$contest->date}}</strong></h5>
                            </div>
                            <div class="col-md-9">
                                <div id="map{{$contest->id}}" style="height: 300px"></div>
                                <script type="application/javascript">
                                    var map{{$contest->id}} = new BMap.Map("map{{$contest->id}}");
                                    var point{{$contest->id}} = new BMap.Point({{$contest->locationX}},{{$contest->locationY}});
                                    {{--var myIcon = new BMap.Icon("{{asset('/')}}/images/sort_asc.png",new BMap.Size(19,19));--}}

                                    var mk{{$contest->id}} = new BMap.Marker(point{{$contest->id}});

                                    map{{$contest->id}}.addOverlay(mk{{$contest->id}});
                                    map{{$contest->id}}.centerAndZoom(point{{$contest->id}},12);
                                    var geolocation = new BMap.Geolocation();
                                    geolocation.getCurrentPosition(function(r){
                                        if(this.getStatus() == BMAP_STATUS_SUCCESS){

                                            var mker=new BMap.Marker(r.point);
                                            map{{$contest->id}}.addOverlay(mker);
                                            map{{$contest->id}}.panTo(r.point);

                                        }
                                        else {
                                            alert('failed'+this.getStatus());
                                        }
                                    },{enableHighAccuracy: true});
                                </script>
                            </div>
                        </div>
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