<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
       // $this->middleware('secretary');

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
            'spaname' => ['required', 'string', 'max:255'],
            'spaemail' => ['required', 'string', 'email', 'max:255','unique:users'],
            'password' => ['required', 'string', 'max:255']
        ]);
    }

//    'department'=>['required','string','min:1'],
//            'sector'=>['required','string'],

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)

    {
        $time=Carbon::now()->format('YmdHs');
        $api_prefix=str_random(50);
        $api_key=$time.$api_prefix;



        return User::create([
            'name' => $data['spaname'],
            'spaemail' =>$data['spaemail'],
            'password' => Hash::make($data['password'])
        ]);
    }

//     'department'=>$data['department'],
//            'sector_name'=>$data['sector'],
//'user_type'=>$data['usertype']
// 'api_key'=>$api_key
}
