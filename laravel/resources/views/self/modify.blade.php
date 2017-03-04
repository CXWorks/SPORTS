@extends('layouts.CommonHeader')
@section('content')
    <div class="col-md-10 content-wrapper">


        <!-- main -->
        <div class="editcontent">

            <div class="main-header">
                <h2>修改个人信息</h2>
                <em>modify your information</em>
            </div>
            <div class="editor" id="editor">
                @if($m=='info')
                    {!! $person->info !!}
                @else
                    {!! $person->body !!}
                @endif
            </div>
            <button type="submit" class="btn btn-primary" onclick="submit{{$m}}()">
                发布
            </button>
        </div>
        <!-- /row -->
    </div>

    @endsection
