@extends('layouts.CommonHeader')
@section('content')
    <div class="col-md-10 content-wrapper">


        <!-- main -->
        <div class="editcontent">

            <div class="main-header">
                <h2>发布竞赛</h2>
                <em>organize a contest and do sports with other people</em>
            </div>
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
            <div class="editor" id="editor">
                <p>记录运动的每一次拼搏</p>
            </div>
            <button type="submit" class="btn btn-primary" onclick="submitContest()">
                发布
            </button>
        </div>
        <!-- /row -->
    </div>
@endsection