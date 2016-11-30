<?php

namespace SPORTS\Http\Controllers\analyze;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use SPORTS\Contest;
use SPORTS\Http\Requests;
use SPORTS\Http\Controllers\Controller;
use SPORTS\Record;

class DataController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function dataAnalyze(){
        $records=Record::where('email',Auth::user()->email)->get();
        return view('analyze/dataAnalyze',['_PAGE'=>'dataAnalyze','username'=>Auth::user()->name,'records'=>$records]);
    }

    public function contestRecommend(){
        $contests=Contest::get();
        return view('analyze/recommend',['_PAGE'=>'recommend','username'=>Auth::user()->name,'contests'=>$contests]);
    }
}
