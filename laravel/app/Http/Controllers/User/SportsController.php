<?php

namespace SPORTS\Http\Controllers\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use SPORTS\Http\Requests;
use SPORTS\Http\Controllers\Controller;
use SPORTS\JoinContest;
use SPORTS\Record;

class SportsController extends Controller
{
    private static $view_location='self/sports';
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $email=Auth::user()->email;
        $records=Record::where('email',$email)->get();
        $contests=JoinContest::where('email',$email)->get();
        return view(SportsController::$view_location,['_PAGE'=>'sports','username'=>Auth::user()->name,'records'=>$records,'contests'=>$contests]);

    }
}