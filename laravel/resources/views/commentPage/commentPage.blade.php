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
                            @foreach($comments as $comment)
                            <div><p><br/><br/></p></div>
                            <div class="widget widget-table">
                                <div class="widget-header" ng-controller="myFavorCtrl">
                                    <h3><i class="fa fa-group"></i>{!! $comment->email !!}</h3> <em>- List of concerned SPORTSs</em>
                                    <div class="btn-group widget-header-toolbar">
                                        <a href="#" title="Focus" class="btn-borderless btn-focus"><i class="fa fa-eye"></i></a>
                                        <a href="#" title="Expand/Collapse" class="btn-borderless btn-toggle-expand"><i class="fa fa-chevron-up"></i></a>
                                        <a href="#" title="Remove" class="btn-borderless btn-remove"><i class="fa fa-times"></i></a>
                                    </div>
                                </div>
                                <div class="widget-content" >
                                 {!! $comment->content !!}
                                </div>
                            </div>
                    <!-- /main -->
                                @endforeach


                </div>
                <!-- /content-wrapper -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
@endsection