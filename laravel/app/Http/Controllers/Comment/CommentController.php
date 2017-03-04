<?php

namespace SPORTS\Http\Controllers\Comment;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use SPORTS\Comment;
use SPORTS\Http\Requests;
use SPORTS\Http\Controllers\Controller;

class CommentController extends Controller
{
    private static $view_location='commentPage/commentPage';
    //
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index()
    {
        $comments=Comment::all();
        return view(CommentController::$view_location,['_PAGE'=>'commentPage','username'=>Auth::user()->name,'comments'=>$comments->reverse()]);
    }



}
