<?php
namespace App\Repositories\Customer;
use App\Models\Customer\Customer;
use App\Models\Merchant\Merchant;
use App\Models\User;
use App\Traits\MerchantTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerRepository implements CustomerRepositoryInterface{
    use MerchantTrait;
    /**
     *
     * @var Merchant
     */
    private $merchant;
    /**
     * @var Customer
     */
    private $customer;
    /**
     * CustomerRepository constructor.
     * @param Merchant $merchant
     * @param Customer $customer
     */
    public function __construct(Merchant $merchant,Customer $customer)
    {
        $this->merchant = $merchant;
        $this->customer = $customer;
    }
    /**Add customer to the merchant
     * @param $merchant_id
     * @param $customer_id
     * @return mixed
     */
    public function addCustomertoMerchant($merchant_id, $customer_id)
    {
        // TODO: Implement addCustomer() method.
        $this->merchant->findOrFail($merchant_id)->customers()->attach($customer_id);
    }
    /**Add customer to Db using merchant
     * @param array $data
     * @return mixed
     */
    public function addCustomerToDb(array $data)
    {// TODO: Implement addCustomerToDb() method.
        $time=Carbon::now()->format('YmdHs');
        $api_prefix=str_random(50);
        $api_key=$time.$api_prefix;
          $this->addCustomertoMerchant(Auth::user()->id,$this->addCustomer($data)->id);
            return User::create([
                'name' => $data['name'],
                'email' =>$data['email'],
                'password' => Hash::make('password'),
                'user_type'=>2,
                'api_key'=>$api_key,
                'last_login'=>date('Y-m-d'),
                'is_active'=>1
            ]);
        }

    /**Add customer instance to Customers table
     * @param array $data
     * @return mixed
     */
    public function addCustomer(array $data){
                return Customer::create([
                    'full_name' => $data['name'],
                    'city' =>$data['city'],
                    'address'=>date('Y-m-d'),
                    'mobile_number'=>$data['mobile'],
                    'email'=>$data['email'],
                    'status'=>1
                ]);
    }

    /**
     * @return mixed
     */
    public function getMyCustomers()
    {
        // TODO: Implement getMyCustomers() method.
        return $this->merchant->findOrFail($this->getMerchant())->customers;
    }
}