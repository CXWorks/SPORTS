@extends('layouts.CommonHeader')
@section('content')
                <!-- content-wrapper -->
                <div class="col-md-10 content-wrapper">
                    <!-- top general alert -->

                    <!-- end top general alert -->

                    <div class="row">
                        <div class="col-lg-4 ">
                            <!--head link-->
                            <ul class="breadcrumb">

                            </ul>
                        </div>
                        <div class="col-lg-7"></div>
                        <div class="col-lg-1 ">
                            <a href="editComment" style="color: white; text-align: center"><span class='pulse-button'><h4>new!</h4></span></a>
                        </div>
                    </div>

                    <!-- main -->
                    <div class="content">

                        <div class="main-header">
                            <h2>动态</h2>
                            <em>other's thinking</em>
                        </div>
                        <div class="main-content">
                            <!--row example-->
                            <div><p><br/><br/></p></div>
                            <div class="widget widget-table">
                                <div class="widget-header" ng-controller="myFavorCtrl">
                                    <h3><i class="fa fa-group"></i>树洞</h3> <em>- List of concerned SPORTSs</em>
                                    <div class="btn-group widget-header-toolbar">
                                        <a href="#" title="Focus" class="btn-borderless btn-focus"><i class="fa fa-eye"></i></a>
                                        <a href="#" title="Expand/Collapse" class="btn-borderless btn-toggle-expand"><i class="fa fa-chevron-up"></i></a>
                                        <a href="#" title="Remove" class="btn-borderless btn-remove"><i class="fa fa-times"></i></a>
                                    </div>
                                </div>
                                <div class="widget-content" >
                                  <div class="col-md-3 abt-pic">
       <img src="../img/g1.jpg" class="img-responsive" alt=""/>
     </div>
     <div class="col-md-9 abt-info-pic">
       <h3>核心打造强劲引擎</h3>
       <p>传说中的电动小马达，八块腹肌，马甲线，通过核心改造get起来！传说中的电动小马达，八块腹肌，马甲线，通过核心改造get起来！
       传说中的电动小马达，八块腹肌，马甲线，通过核心改造get起来！传说中的电动小马达，八块腹肌，马甲线，通过核心改造get起来！</p>
     </div>
                                </div>
                            </div>

                            <div class="main-content">
                                <!--row example-->
                                <div><p><br/><br/></p></div>
                                <div class="widget widget-table">
                                    <div class="widget-header" ng-controller="myFavorCtrl">
                                        <h3><i class="fa fa-group"></i>树洞</h3> <em>- List of concerned SPORTSs</em>
                                        <div class="btn-group widget-header-toolbar">
                                            <a href="#" title="Focus" class="btn-borderless btn-focus"><i class="fa fa-eye"></i></a>
                                            <a href="#" title="Expand/Collapse" class="btn-borderless btn-toggle-expand"><i class="fa fa-chevron-up"></i></a>
                                            <a href="#" title="Remove" class="btn-borderless btn-remove"><i class="fa fa-times"></i></a>
                                        </div>
                                    </div>
                                    <div class="widget-content" >
                                      <div class="col-md-3 abt-pic">
					 <img src="../img/img4.jpg" class="img-responsive" alt=""/>
				 </div>
				 <div class="col-md-9 abt-info-pic">
					 <h3>信念不死，健身不止</h3>
					 <p>揣上坚强的信念，开始成长的旅行。揣上坚强的信念，开始成长的旅行。揣上坚强的信念，开始成长的旅行。揣上坚强的信念，开始成长的旅行。
           揣上坚强的信念，开始成长的旅行。揣上坚强的信念，开始成长的旅行。揣上坚强的信念，开始成长的旅行。揣上坚强的信念，开始成长的旅行。
         揣上坚强的信念，开始成长的旅行。揣上坚强的信念，开始成长的旅行。揣上坚强的信念，开始成长的旅行。揣上坚强的信念，开始成长的旅行。</p>
				 </div>
                                </div>
                            <!-- END WIDGET TICKET TABLE -->

                        </div>
                        <!-- /main-content -->
                        <div class="main-content">
                            <!--row example-->
                            <div><p><br/><br/></p></div>
                            <div class="widget widget-table">
                                <div class="widget-header" ng-controller="myFavorCtrl">
                                    <h3><i class="fa fa-group"></i>朋友圈</h3> <em>- List of concerned Friends</em>
                                    <div class="btn-group widget-header-toolbar">
                                        <a href="#" title="Focus" class="btn-borderless btn-focus"><i class="fa fa-eye"></i></a>
                                        <a href="#" title="Expand/Collapse" class="btn-borderless btn-toggle-expand"><i class="fa fa-chevron-up"></i></a>
                                        <a href="#" title="Remove" class="btn-borderless btn-remove"><i class="fa fa-times"></i></a>
                                    </div>
                                </div>
                                <div class="widget-content" >
                                  <div class="col-md-3 abt-pic">
					 <img src="../img/img1.jpg" class="img-responsive" alt=""/>
				 </div>
				 <div class="col-md-9 abt-info-pic">
					 <h3>跑过自己</h3>
					 <p>更新至最新版本，定制跑步课程表，我来教你如何跑步！更新至最新版本，定制跑步课程表，我来教你如何跑步！
           更新至最新版本，定制跑步课程表，我来教你如何跑步！更新至最新版本，定制跑步课程表，我来教你如何跑步！更新至最新版本，定制跑步课程表，我来教你如何跑步！
         更新至最新版本，定制跑步课程表，我来教你如何跑步！</p>
				 </div>
                                </div>
                            </div>
                            <!-- END WIDGET TICKET TABLE -->

                        </div>

                    </div>
                    <!-- /main -->

                </div>
                <!-- /content-wrapper -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
@endsection