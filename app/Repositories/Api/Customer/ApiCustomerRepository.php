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
        $this->addCustomer($data);
        // TODO: Implement registerUser() method.
        return User::updateOrCreate([
            'name' => $data['full_name'],
            'email' =>$data['email'],
            'password' => Hash::make($data['password']),
            'mobile_number'=>$data["mobile_number"],
            'user_type'=>2,
            'last_login'=>date('Y-m-d'),
            'is_active'=>1
        ]);
    }
    /**Add customer instance to Customers table
     * @param array $data
     * @return mixed
     */
    public function addCustomer(array $data){
         Customer::updateOrCreate([
            'full_name' => $data['full_name'],
            'city' =>$data['city'],
            'address'=>$data['city'],
            'mobile_number'=>$data['mobile_number'],
            'email'=>$data['email'],
            'status'=>1
        ]);
    }

}