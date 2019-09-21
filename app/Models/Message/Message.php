<?php

namespace App\App\Models\Message;

use App\Models\Conversation\Conversation;
use App\Models\Customer\Customer;
use App\Models\Merchant\Merchant;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded=[];
    protected $table="messages";
    public function getConversation(){
        return $this->hasOne(Conversation::class,'conversation_id','id');
    }


}
