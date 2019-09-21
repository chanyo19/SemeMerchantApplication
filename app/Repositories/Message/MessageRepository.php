<?php

namespace App\Repositories\Message;
use App\App\Models\Message\Message;
use App\Models\Conversation\Conversation;
use App\Models\Customer\Customer;
use App\Models\Merchant\Merchant;
use Mockery\Exception;

class MessageRepository implements MessageRepositoryInterface{
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
     * @return mixed
     */
    public function store(array $array)
    {
        try{
            $m_id=$array["merchant_id"];
            $c_id=$array["customer_id"];
            $c_identifier=$m_id."_".$c_id;
            $message=[];
            $message["title"]=$array["title"];
            $message["message"]=$array["message"];

            if($this->checkConversation($c_identifier)){
                $message["conversation_id"]=$this->checkConversation($c_identifier)->id;
                return $this->addToMessages($message);
            }else{
                $array["c_identifier"]=$c_identifier;
                $conversation=$this->conversation->create([
                    'customer_id'=>$array["customer_id"],
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
     * @return mixed
     */
    public function getMyConversations($type, $id)
    {
       return $this->getConversations($type,$id);
        // TODO: Implement getMyMessages() method.
    }

    /**
     * get conversation helper
     * @param $type
     * @param $id
     * @return \Exception
     */
    public function getConversations($type,$id){

        try{

            if($type=="m"){
                return $this->merchant->findOrFail($id)->conversation;
            }else{
              return $this->customer->findOrFail($id)->conversation;
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
}