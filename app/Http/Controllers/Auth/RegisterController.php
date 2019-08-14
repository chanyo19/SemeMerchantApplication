<?php

namespace App\Http\Controllers\Auth;

use App\Models\Merchant\Merchant;
use App\Models\User;
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
            'email' => ['required', 'string', 'email', 'max:255','unique:users'],
            'password' => ['required', 'string', 'max:255']
        ]);
    }
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
        $merchant=$this->addMerchant($data);
        return User::create([
            'name' => $data['spaname'],
            'email' =>$data['email'],
            'password' => Hash::make($data['password']),
            'user_type'=>1,
            'api_token'=>$api_key,
            'last_login'=>date('Y-m-d'),
            'is_active'=>1
        ]);
    }

    /**
     * @param array $data
     * @return
     */
    protected function addMerchant(array $data){
         Merchant::create([
              'merchant_name' => $data['spaname'],
              'email' =>$data['email'],
              'city'=>'Colombo',
              'location'=>'68.98,6.98',
              'address'=>'Colombo,Nugegoda',
              'mobile_number'=>'0712148820',

        ]);
    }

}
