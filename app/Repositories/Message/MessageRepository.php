<?php

namespace App\Repositories\Message;
use App\App\Models\Message\Message;
use App\Jobs\SendPushNotification;
use App\Models\Conversation\Conversation;
use App\Models\Customer\Customer;
use App\Models\Merchant\Merchant;
use App\Models\User;
use App\Traits\CustomerTrait;
use Mockery\Exception;

class MessageRepository implements MessageRepositoryInterface{
    use CustomerTrait;
    /**
     * @var Message
     */
    private $conversation;
    /**
     * @var Message
     */
    private $message;
    /**
     * @var Customer
     */
    private $customer;
    /**
     * @var Merchant
     */
    private $merchant;


    /**
     * MessageRepository constructor.
     * @param Conversation $conversation
     * @param Message $message
     * @param Customer $customer
     * @param Merchant $merchant
     */
    public function __construct(Conversation $conversation,Message $message,Customer $customer,Merchant $merchant)
    {
        $this->conversation = $conversation;
        $this->message = $message;
        $this->customer = $customer;
        $this->merchant = $merchant;
    }


    /**
     * Store the message in database after adding conversation
     * @param array $array
     * @param $user
     * @return mixed
     */
    public function store(array $array,$mobile)
    {
        try{
            $m_id=$array["merchant_id"];
            $c_id=$this->getCustomerfromRequestMoBile($mobile);
            $c_identifier=$m_id."_".$c_id;
            $message=[];
            $message["title"]=$array["title"];
            $message["message"]=$array["message"];
            $message['type']=$array["type"];

            if($this->checkConversation($c_identifier)){
                $message["conversation_id"]=$this->checkConversation($c_identifier)->id;
                return $this->addToMessages($message);
            }else{
                $array["c_identifier"]=$c_identifier;
                $conversation=$this->conversation->create([
                    'customer_id'=>$c_id,
                    'merchant_id'=>$array["merchant_id"],
                    'c_identifier'=> $array["c_identifier"]
                ]);
                $message["conversation_id"]=$conversation->id;
                return $this->addToMessages($message);
            }
        }catch (\Exception $exception){

            return $exception;
        }

    }

    /**
     * Check the message conversation between emp and customer
     * @param $c_id
     * @return mixed
     */
    public function checkConversation($c_id){

        return $this->conversation->where('c_identifier',$c_id)->get()->first();

    }

    /**
     * add Message model to db
     * @param array $data
     * @return mixed
     */
    public function addToMessages(array $data){
        return $this->message->create($data);
    }
    /**Read successfully the message
     * @param $id
     * @return mixed
     */
    public function readMessage($id)
    {
        // TODO: Implement readMessage() method.
    }

    /**
     * Delete message
     * @param $id
     * @return mixed
     */
    public function deleteMessage($id)
    {
        // TODO: Implement deleteMessage() method.
    }

    /**
     * return my messages according to user type
     * @param $type
     * @param $id
     * @param $mobile
     * @return mixed
     */
    public function getMyConversations($type, $id,$mobile)
    {
       return $this->getConversations($type,$id,$mobile);
        // TODO: Implement getMyMessages() method.
    }

    /**
     * get conversation helper
     * @param $type
     * @param $id
     * @param $cus_mobile
     * @return \Exception
     */
    public function getConversations($type,$id,$cus_mobile){

        try{

            if($type==="m"){
                return $this->merchant->findOrFail($id)->conversation;
            }else{
              return $this->customer->findOrFail($this->getCustomerfromRequestMoBile($cus_mobile))->conversation;
            }

        }catch (\Exception $exception){
            return $exception;
        }
    }

    /**
     * Get all messages belongs to conversation
     * @param $c_id
     * @return mixed
     */
    public function getMyMessages($c_id)
    {
        // TODO: Implement getMyMessages() method.
        return $this->message->where('conversation_id',$c_id)->get();
    }

    /**
     * @param $c_id
     * @param array $data
     * @return
     */
    public function storeToMessageUsingConversation($c_id, array $data){
    //Getting push id to send push notification
        if($c_id){
            $customer_id=Conversation::findOrFail($c_id)->customer_id;
            $cus_mobile=Customer::where('id',$customer_id)->first()->mobile_number;
            $push_id=User::where('mobile_number',$cus_mobile)->first()->push_id;
            if($push_id){
                dispatch(new SendPushNotification([$push_id],"New message received from Conversation ID - ".$c_id,""));
            }
        }
     $message= $this->message->create([
         'conversation_id'=>$c_id,
         'title'=>'',
         'message'=>$data["message"],
         'type'=>'m'
     ]);
     return $message;
    }
}