<?php

namespace SPORTS\Http\Controllers\analyze;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use SPORTS\Http\Requests;
use SPORTS\Http\Controllers\Controller;

class DataController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function dataAnalyze(){
        return view('analyze/dataAnalyze',['_PAGE'=>'dataAnalyze','username'=>Auth::user()->name]);
    }
}
