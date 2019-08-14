<?php
namespace App\Repositories\Api\Customer;
use App\Models\Customer\Customer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class ApiCustomerRepository implements ApiCustomerRepositoryInterface {
    /**
     * @param array $data
     * @return mixed
     */
    public function registerUser(array $data)
    {
        $time=Carbon::now()->format('YmdHs');
        $api_prefix=str_random(50);
        $api_key=$time.$api_prefix;
        $this->addCustomer($data);
        // TODO: Implement registerUser() method.
        return User::create([
            'name' => $data['full_name'],
            'email' =>$data['email'],
            'password' => Hash::make($data['password']),
            'user_type'=>2,
            'api_token'=>$api_key,
            'last_login'=>date('Y-m-d'),
            'is_active'=>1
        ]);
    }
    /**Add customer instance to Customers table
     * @param array $data
     * @return mixed
     */
    public function addCustomer(array $data){
         Customer::create([
            'full_name' => $data['full_name'],
            'city' =>$data['city'],
            'address'=>date('Y-m-d'),
            'mobile_number'=>$data['mobile_number'],
            'email'=>$data['email'],
            'status'=>1
        ]);
    }

}