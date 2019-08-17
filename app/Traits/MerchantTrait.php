<?php
namespace App\Traits;
use App\Models\Merchant\Merchant;
use Illuminate\Support\Facades\Auth;

trait MerchantTrait{

    /**Get merchant id to return appointmentsvagrant ssh
     * @return mixed
     */
    public function getMerchant(){
        return Merchant::where('email',Auth::user()->email)->first()->id;
    }
}