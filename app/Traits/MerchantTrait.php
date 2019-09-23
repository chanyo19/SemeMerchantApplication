<?php
namespace App\Traits;
use App\Models\Merchant\Merchant;
use Illuminate\Support\Facades\Auth;

trait MerchantTrait{

    /**Get merchant id to return appointmentsvagrant ssh
     * @return mixed
     */
    public function getMerchant(){
        return Merchant::where('mobile_number',Auth::user()->mobile_number)->first()->id;
    }
}