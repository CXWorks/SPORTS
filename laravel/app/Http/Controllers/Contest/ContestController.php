<?php

namespace SPORTS\Http\Controllers\Contest;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use SPORTS\Contest;
use SPORTS\Http\Requests;
use SPORTS\Http\Controllers\Controller;
use SPORTS\JoinContest;

class ContestController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create(){
        return view('contest/createContest',['_PAGE'=>'createContest','username'=>Auth::user()->name]);
    }

    public function newContest(Request $request){
        $date=Input::get('date');
        $word=Input::get('content');
        $x=Input::get('locationX');
        $y=Input::get('locationY');
        Contest::create(['publisher'=>Auth::user()->name,'pub_email'=>Auth::user()->email,'state'=>'running',
            'date'=>$date,'locationX'=>$x,'locationY'=>$y,'description'=>$word]);
        return 'ok';
    }

    public function showContest(){
        $contests=Contest::where('state','running')->orderBy('date','desc')->get();
        $joins=JoinContest::where('email',Auth::user()->email)->get();
        return view('contest/showContest',['_PAGE'=>'showContest','username'=>Auth::user()->name,'contests'=>$contests,'joins'=>$joins]);
    }

    public function finishContest(){
        $id=Input::get('id');
        Contest::where('id',$id)->update(['state'=>'finished']);
        return 'ok';
    }

    public function joinContest(){
        $id=Input::get('id');
        Contest::where('id',$id)->increment('people');
        $contest=Contest::where('id',$id)->first();
        JoinContest::create(['contest_id'=>$id,'email'=>Auth::user()->email,'contest_date'=>$contest->date]);
        return 'ok';
    }
}
