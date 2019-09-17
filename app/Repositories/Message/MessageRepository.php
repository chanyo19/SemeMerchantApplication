<?php

namespace App\Repositories\Message;
use App\App\Models\Message\Message;

class MessageRepository implements MessageRepositoryInterface{
    /**
     * @var Message
     */
    private $message;

    /**
     * MessageRepository constructor.
     * @param Message $message
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }


    /**Store the message in database
     * @param array $array
     * @return mixed
     */
    public function store(array $array)
    {
        // TODO: Implement store() method.
        try{

            if(count($array)>0)
            {
                $response=$this->message->create($array);


            }
            return $response;

        }catch (\Exception $exception){

            return 0;
        }

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
}