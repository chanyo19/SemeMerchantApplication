<?php

namespace App\Http\Controllers\Customer;

use App\Repositories\Customer\CustomerRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepository;

    /**
     * CustomerController constructor.
     * @param CustomerRepositoryInterface $customerRepository
     */
    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**Add customer to Database
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addCutomerToMerchant(Request $request){


      if($this->customerRepository->addCustomerToDb($request->only(['name','city','address','mobile','email']))){
          Session::flash('success','Customer added successfully');
          return redirect()->back();
      }

    }

    /**
     *get my customers
     */
    public function mycustomers(){
        return view('customers.all-customers')->with('customers',$this->customerRepository->getMyCustomers());

    }
}
