<?php

namespace SPORTS\Http\Controllers\Comment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use SPORTS\Comment;
use SPORTS\Http\Requests;
use SPORTS\Http\Controllers\Controller;


class EditorController extends Controller
{
    private static  $view_location='commentPage/editComment';
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function publishComment(Request $request){
        $content=Input::get('content');
        Comment::create(['email'=>Auth::user()->email,'content'=>$content]);
        return redirect('/commentPage');
    }

    public function index(){
        return view(EditorController::$view_location,['_PAGE'=>'editComment','username'=>Auth::user()->name]);
    }

    public function uploadImage(Request $request){
        $img=Image::make(Input::file('photo'));
        $type='.'.explode('/',$img->mime())[1];
        $img_name=Auth::user()->name.time();
        $img->save('editorimg/'.$img_name.$type);
        return ('/editorimg/'.$img_name.$type);
    }
}
