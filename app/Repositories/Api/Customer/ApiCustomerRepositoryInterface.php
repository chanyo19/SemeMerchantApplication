<?php
namespace App\Repositories\Api\Customer;
interface ApiCustomerRepositoryInterface{

    /**
     * @param array $data
     * @return mixed
     */
    public function registerUser(array $data);
}