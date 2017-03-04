<?php

namespace SPORTS\Http\Controllers\Contest;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use SPORTS\Contest;
use SPORTS\Http\Requests;
use SPORTS\Http\Controllers\Controller;
use SPORTS\JoinContest;
use SPORTS\Record;

class ContestController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create(){
        $rank=round(Record::where('email',Auth::user()->email)->count()/30);
        if ($rank<15){
            $contests=Contest::where('state','running')->orderBy('date','desc')->get();
            $joins=JoinContest::where('email',Auth::user()->email)->get();
            return view('contest/showContest',['_PAGE'=>'showContest','username'=>Auth::user()->name,'contests'=>$contests,'joins'=>$joins,'warn'=>true,'rank'=>$rank]);
        }
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
        return view('contest/showContest',['_PAGE'=>'showContest','username'=>Auth::user()->name,'contests'=>$contests,'joins'=>$joins,'warn'=>false,'rank'=>0]);
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

    public function deleteContest(){
        $id=Input::get('id');
        JoinContest::where('contest_id',$id)->delete();
        Contest::where('id',$id)->delete();
        return 'ok';
    }

    public function modifyContest(){
        $id=Input::get('id');
        $date=Input::get('date');
        $word=Input::get('content');
        $x=Input::get('locationX');
        $y=Input::get('locationY');
        Contest::where('id',$id)->update(['date'=>$date,'locationX'=>$x,'locationY'=>$y,'description'=>$word]);
        return 'ok';
    }

    public function modify(){
        $id=Input::get('id');
        $con=Contest::where('id',$id)->first();
        return view('contest/modifyContest',['_PAGE'=>'modifyContest','username'=>Auth::user()->name,'contest'=>$con]);
    }
}
