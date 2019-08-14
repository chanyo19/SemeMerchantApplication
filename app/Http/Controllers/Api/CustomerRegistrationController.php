<?php

namespace App\Http\Controllers\Api;

use App\Repositories\Api\Customer\ApiCustomerRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CustomerRegistrationController extends Controller
{
    /**
     * @var ApiCustomerRepositoryInterface
     */
    private $customerRepository;

    /**
     * CustomerRegistrationController constructor.
     * @param ApiCustomerRepositoryInterface $customerRepository
     */
    public function __construct(ApiCustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function addCutomerUser(Request $request){

        $validator=Validator::make($request->all(),[
           'full_name'=>'required|max:30',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'mobile_number'=>'required|unique:customers'
        ]);
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()]);
        }
        return $this->customerRepository->registerUser($request->only([
            'full_name',
            'email',
            'password',
            'mobile_number',
            'city'
        ]));
    }

}
