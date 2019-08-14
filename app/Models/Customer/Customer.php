<?php

namespace App\Models\Customer;

use App\Models\Merchant\Merchant;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable=['full_name','city','address','mobile_number','email','status'];
    public function merchants(){
        return $this->belongsToMany(Merchant::class)->withTimestamps();
    }
}
