@extends('layouts.CommonHeader')
@section('content')
    <div class="col-md-10 content-wrapper">


        <!-- main -->
        <div class="editcontent">

            <div class="main-header">
                <h2>发布动态</h2>
                <em>share your experience to this world</em>
            </div>
            <div class="editor" id="editor">
                <p>记录运动的每一次拼搏</p>
            </div>
            <button type="submit" class="btn btn-primary" onclick="submitComment()">
                发布
            </button>
        </div>
        <!-- /row -->
    </div>
@endsection