<?php
/**
 * Created by PhpStorm.
 * User: shashilaheshan
 * Date: 2019-08-17
 * Time: 20:51
 */

namespace App\Traits;


use App\Models\Customer\Customer;
use App\Models\User;

trait CustomerTrait
{
    /**Get Customer id to return appointments
     * @param User $user
     * @return mixed
     */
    public function getCustomerfromRequest(User $user){
        return Customer::where('mobile_number',$user->mobile_number)->first()->id;
    }
    public function getCustomerfromRequestMoBile($mobile){
        return Customer::where('mobile_number',$mobile)->first()->id;
    }


}