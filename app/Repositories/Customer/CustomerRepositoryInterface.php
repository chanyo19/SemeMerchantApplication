<?php
namespace App\Repositories\Customer;
interface CustomerRepositoryInterface{
    /**Add customer to the merchant
     * @param $merchant_id
     * @param $customer_id
     * @return mixed
     */
    public function addCustomerToMerchant($merchant_id,$customer_id);

    /**Add customer to Db using merchant
     * @param array $data
     * @return mixed
     */
    public function addCustomerToDb(array $data);

    /**
     * @return mixed
     */
    public function getMyCustomers();
}