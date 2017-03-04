<?php

namespace SPORTS\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use SPORTS\Friend;
use SPORTS\Http\Requests;
use SPORTS\Http\Controllers\Controller;
use SPORTS\Person;
use SPORTS\User;

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
        $person=Person::where('email',Auth::user()->email)->get()[0];
        $friends=Friend::where('semail',Auth::user()->email)->get();
        return view(UserController::$view_location,['_PAGE'=>'basic','username'=>Auth::user()->name,
            'person'=>$person,'friends'=>$friends]);
    }

    public function info(Request $request){
        $person=Person::where('email',Input::get('email'))->first();
        $friends=Friend::where('semail',Input::get('email'))->get();
        return view(UserController::$view_location,['_PAGE'=>'basic.other','username'=>Auth::user()->name,'person'=>$person,
        'friends'=>$friends]);
    }

    public function modify(Request $request){
        $m=Input::get('m');
        $person=Person::where('email',Auth::user()->email)->get()[0];
        return view('self/modify',['_PAGE'=>'basic.modify','username'=>Auth::user()->name,'person'=>$person,'m'=>$m]);

    }

    public function update(Request $request){
        $type=Input::get('type');
        Person::where('email',Auth::user()->email)->update([$type=>Input::get('content')]);
        return 'ok';
    }

    public function add(Request $request){
        $id=Input::get('content');
        $user=User::where('name',$id)->orWhere('email',$id)->first();
        echo $user->email.$user->name;
        Friend::create(['semail'=>Auth::user()->email,'temail'=>$user->email,
        'sname'=>Auth::user()->name,'tname'=>$user->name]);
        return 'ok';
    }

}
