@extends('layouts.CommonHeader')
@section('content')
    <!-- content-wrapper -->
    <div class="col-md-10 content-wrapper">
    <script type="application/javascript">
        if({{$warn}}){
            alert('您的等级为{{$rank}},未满15级，不可以发布赛事');
        }
    </script>

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
                            <a href="#" title="Collapse/Expand" class="btn-borderless btn-toggle-expand"><i class="fa fa-chevron-up"></i></a>
                        </div>
                    </div>
                    <div class="widget-content" >


                        <table id="table_id" class="display" >
                            <thead>
                            <tr>
                                <th style="color: black">竞赛代号</th>
                                <th style="color: black">竞赛名称</th>
                                <th style="color: black">举办日期</th>
                                <th style="color: black">加入日期</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($joins as $join)
                                <tr>
                                    <td style="color: black">{{$join->contest_id}}</td>
                                    <td style="color: black">{{$join->contest_name}}</td>
                                    <td style="color: black">{{ Carbon\Carbon::parse($join->contest_date)->format('Y-M-d h:m') }}</td>
                                    <td style="color: black">{{$join->created_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <script type="application/javascript">
                            $('#table_id').DataTable({
                                autoFill:true,
                                language: {
                                   "sProcessing": "处理中...",
                                   "sLengthMenu": "显示 _MENU_ 项结果",
                                   "sZeroRecords": "没有匹配结果",
                                   "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
                                   "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
                                   "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
                                   "sInfoPostFix": "",
                                   "sSearch": "搜索:",
                                   "sUrl": "",
                                   "sEmptyTable": "表中数据为空",
                                   "sLoadingRecords": "载入中...",
                                   "sInfoThousands": ",",
                                   "oPaginate": {
                                       "sFirst": "首页",
                                       "sPrevious": "上页",
                                       "sNext": "下页",
                                       "sLast": "末页"
                                   },
                                   "oAria": {
                                       "sSortAscending": ": 以升序排列此列",
                                       "sSortDescending": ": 以降序排列此列"
                                   }
                               }
                            });
                        </script>

                    </div>
                </div>
                <!-- END WIDGET TICKET TABLE -->

            </div>
            <!-- /main-content -->
            <div class="main-content">
              <h3><i class="fa fa-group"></i>可加入的竞赛</h3> <em>- List of ongoing CONTESTs</em>
              @foreach($contests as $contest)
                <!--row example-->
                <div><p><br/><br/></p></div>
                <div class="widget widget-table">
                    <div class="widget-header" ng-controller="myFavorCtrl">
                        <div class="btn-group widget-header-toolbar">
                            <a href="#" title="Focus" class="btn-borderless btn-focus"><i class="fa fa-eye"></i></a>
                            <a href="#" title="Expand/Collapse" class="btn-borderless btn-toggle-expand"><i class="fa fa-chevron-up"></i></a>
                        </div>
                    </div>
                    <div class="widget-content" >
                        <div class="row">
                            <div class="col-md-3">
                                <h5>代号 {{$contest->id}}</h5>
                                <h5>组织者 <a href="/info?email={{$contest->pub_email}}" ><strong>{{$contest->publisher}}</strong></a></h5>
                                <h5>E-mail <a href="mailto:{{$contest->pub_email}}">{{$contest->pub_email}}</a></h5>
                                <h5>日期 <strong>{{ Carbon\Carbon::parse($contest->date)->format('Y-M-d h:m') }}</strong></h5>
                                <h5>参与人数 {{$contest->people}}</h5><br>
                                <h5>竞赛详情</h5>
                                {!! $contest->description !!}
                            </div>
                            <div class="col-md-9">
                                <div id="map{{$contest->id}}" style="height: 220px"></div>
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

                        </br>
                      
                        @if($username==$contest->publisher)
                            <button type="button" class="btn btn-success" onclick="finsihContest({{$contest->id}})">结束</button>
                            <button type="button" class="btn btn-warning" onclick="window.location.href='/contest/modify?id={{$contest->id}}';">修改</button>
                            <button type="button" class="btn btn-danger" onclick="deleteContest({{$contest->id}})">删除</button>
                            @elseif($joins->where('contest_id',$contest->id)->isEmpty())
                            <button type="button" class="btn btn-primary" onclick="joinContest({{$contest->id}})">加入</button>
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
