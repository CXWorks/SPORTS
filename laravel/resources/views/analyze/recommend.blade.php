
@extends('layouts.CommonHeader')
@section('content')
    <div class="col-md-10 content-wrapper">
    <div class="content">

        <div class="main-header">
            <h2>竞赛推荐</h2>
            <em>recommend a new world</em>
        </div>
        {{--<div class="main-content">--}}
            {{--<div id="myCarousel" class="carousel slide">--}}
                {{--<!-- 轮播（Carousel）指标 -->--}}
                {{--<ol class="carousel-indicators">--}}
                    {{--<li data-target="#myCarousel" data-slide-to="0" class="active"></li>--}}
                    {{--<li data-target="#myCarousel" data-slide-to="1"></li>--}}
                    {{--<li data-target="#myCarousel" data-slide-to="2"></li>--}}
                {{--</ol>--}}
                {{--<!-- 轮播（Carousel）项目 -->--}}
                {{--<div class="col-md-12 carousel-inner">--}}
                    {{--<div class="item active">--}}
                        {{--<img src="{{asset('/')}}img/1.jpg" class="col-md-12" alt="First slide">--}}
                        {{--<div class="carousel-caption">标题 1</div>--}}
                    {{--</div>--}}
                    {{--<div class="item">--}}
                        {{--<img src="{{asset('/')}}img/2.jpg" class="col-md-12" alt="Second slide">--}}
                        {{--<div class="carousel-caption">标题 2</div>--}}
                    {{--</div>--}}
                    {{--<div class="item">--}}
                        {{--<img src="{{asset('/')}}img/3.jpg" class="col-md-12" alt="Third slide">--}}
                        {{--<div class="carousel-caption">标题 3</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!-- 轮播（Carousel）导航 -->--}}
                {{--<a class="carousel-control left" href="#myCarousel"--}}
                   {{--data-slide="prev">&lsaquo;--}}
                {{--</a>--}}
                {{--<a class="carousel-control right" href="#myCarousel"--}}
                   {{--data-slide="next">&rsaquo;--}}
                {{--</a>--}}
            {{--</div>--}}

            {{--<script type="application/javascript">--}}
                {{--$('#myCarousel').carousel();--}}
            {{--</script>--}}
        {{--</div>--}}
        <div class="main-content">


            <div class="widget widget-table">
                <div class="widget-header" ng-controller="myFavorCtrl">
                    <h3><i class="fa fa-group"></i>周边的竞赛</h3> <em>- Contests around you</em>
                    <div class="btn-group widget-header-toolbar">
                        <a href="#" title="Focus" class="btn-borderless btn-focus"><i class="fa fa-eye"></i></a>
                        <a href="#" title="Expand/Collapse" class="btn-borderless btn-toggle-expand"><i class="fa fa-chevron-up"></i></a>
                        <a href="#" title="Remove" class="btn-borderless btn-remove"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="widget-content" >
                    <div class="row">
                        <div id="map" class="col-md-12" style="height: 600px">

                        </div>
                    </br>
                        </br>
                        </br>
                        <div id="info" class="col-md-12"></div>
                    </div>
                </div>
            </div>
            <!-- END WIDGET TICKET TABLE -->
            <script type="application/javascript">
                var map = new BMap.Map("map");
                map.centerAndZoom(new BMap.Point(116.309965, 40.058333), 12);

                var geolocation = new BMap.Geolocation();
                geolocation.getCurrentPosition(function(r){
                    if(this.getStatus() == BMAP_STATUS_SUCCESS){
                        var mker=new BMap.Marker(r.point);
                        map.panTo(r.point);
                        map.addOverlay(mker);
                        mker.addEventListener("onclick", function(e) {
                            $('#info')[0].innerHTML="您的位置";
                        });

                    }
                    else {
                        alert('failed'+this.getStatus());
                    }
                },{enableHighAccuracy: true});
                var contests={!! $contests !!};
                contests.forEach(function (con) {
                    var mker=new BMap.Marker(new BMap.Point(con.locationX,con.locationY));
                    mker.addEventListener("onclick", function(e) {
                        for(i=0;i<contests.length;i++){
                            if(Math.abs(contests[i].locationX-e.point.lng)<0.1&&Math.abs(contests[i].locationY-e.point.lat)<0.1){
                                $('#info')[0].innerHTML=contests[i].description;
                                return ;
                            }
                        }
                    });
                    map.addOverlay(mker);
                });
            </script>
        </div>
    </div>
    </div>
@endsection