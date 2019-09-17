<?php

namespace App\App\Models\Message;

use App\Models\Customer\Customer;
use App\Models\Merchant\Merchant;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded=[];
    protected $table="messages";
    public function customerM(){
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
    public function merchantM(){
        return $this->belongsTo(Merchant::class,'merchant_id','id');
    }

}
