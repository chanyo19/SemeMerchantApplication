<?php

namespace App\Models\Conversation;

use App\Models\Customer\Customer;
use App\Models\Merchant\Merchant;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $table="conversations";
    protected $guarded=array();
    public function customerConversations(){
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
    public function merchantConversations(){
        return $this->belongsTo(Merchant::class,'merchant_id','id');
    }

}
