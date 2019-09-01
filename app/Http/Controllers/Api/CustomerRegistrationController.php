<?php

namespace App\Http\Controllers\Api;

use App\Jobs\sendMail;
use App\Repositories\Api\Customer\ApiCustomerRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CustomerRegistrationController extends Controller
{
    /**
     * @var ApiCustomerRepositoryInterface
     */
    private $customerRepository;
    public $successStatus = 200;

    /**
     * CustomerRegistrationController constructor.
     * @param ApiCustomerRepositoryInterface $customerRepository
     */
    public function __construct(ApiCustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }
    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function loginCustomerUser(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            $success['user']=$user;
            return response()->json(['success' => $success], $this-> successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthenticated'], 401);
        }
    }

    /**
     * Register api
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function addCustomerUser(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'full_name'=>'required|max:30',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'mobile_number'=>'required|unique:customers'
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        $user= $this->customerRepository->registerUser($request->only([
            'full_name',
            'email',
            'password',
            'mobile_number',
            'city'
        ]));
        dispatch(new sendMail("New customer registered name -".$request->email));
        $success['token'] =  $user->createToken('MyApp')-> accessToken;
        $success['user'] =  $user;
        return response()->json(['success'=>$success], $this-> successStatus);
    }

    public function logoutCustomer(Request $request){
        $user=$request->user();
        if($user){
            if($user->token()->revoke()){
                return response()->json(['success'=>'successfully logged out'],$this->successStatus);
            }else{
                return response()->json(['success'=>'something went wrong'],$this->successStatus);
            }
        }
    }
}
