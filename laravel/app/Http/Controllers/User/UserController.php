<?php

namespace SPORTS\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SPORTS\Http\Requests;
use SPORTS\Http\Controllers\Controller;

class UserController extends Controller
{
    private static $view_location='self/basic';
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index(){
        return view(UserController::$view_location,['_PAGE'=>'basic','username'=>Auth::user()->name]);
    }
}
