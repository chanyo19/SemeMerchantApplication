<?php

namespace App\Models\Merchant;

use App\Models\Customer\Customer;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    protected $table='merchants';
    protected $fillable=['merchant_name','city','location','address','mobile_number','email','status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function customers(){
        return $this->belongsToMany(Customer::class)->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function appointments(){
        return $this->hasMany('App\Models\Appointment\Appointment','merchant_id','id');
    }
}
