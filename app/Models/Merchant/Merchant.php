<?php

namespace App\Models\Merchant;

use App\Models\Customer\Customer;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    protected $table='merchants';
    protected $fillable=['merchant_name','city','location','address','mobile_number','email','status'];
    public function customers(){
        return $this->belongsToMany(Customer::class)->withTimestamps();
    }
}
