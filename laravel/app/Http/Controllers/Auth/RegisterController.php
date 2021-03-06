<?php

namespace SPORTS\Http\Controllers\Auth;

use Illuminate\Support\Facades\Input;
use SPORTS\Person;
use SPORTS\User;
use Validator;
use SPORTS\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/commentPage';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'pres' => Input::get('preference'),
            'pres' => 'size:1'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $pres=Input::get('preference');
        $arr=array();
        for ($i=0;$i<5;$i++){
            if (array_key_exists($i,$pres))
                array_push($arr,true);
            else
                array_push($arr,false);
        }
        Person::create(['email'=>$data['email'],'run'=>$arr[0],'swim'=>$arr[1],'basketball'=>$arr[2],'football'=>$arr[3],'boxing'=>$arr[4]]);
        if (!preg_match("/^[a-zA-Z0-9]*$/",Input::get('name'))){
            abort(500);
        }
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
