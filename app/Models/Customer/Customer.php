<?php

namespace App\Models\Customer;

use App\App\Models\Message\Message;
use App\Models\Invoice\Invoice;
use App\Models\Merchant\Merchant;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table='customers';
    protected $fillable=['full_name','city','address','mobile_number','email','status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function merchants(){
        return $this->belongsToMany(Merchant::class)->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages(){
        return $this->hasMany(Message::class,'customer_id','id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function appointments(){
        return $this->hasMany('App\Models\Appointment\Appointment','customer_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function conversation(){
        return $this->hasMany('App\Models\Conversation\Conversation','customer_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getCustomerInvoices(){
        return $this->hasMany(Invoice::class,'customer_id','id');
    }
}
