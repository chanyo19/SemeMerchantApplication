<?php
/**
 * Created by PhpStorm.
 * User: shashilaheshan
 * Date: 2019-09-15
 * Time: 10:09
 */

namespace App\Repositories\Message;


use App\Models\User;

interface MessageRepositoryInterface
{
    /**Store the message in database
     * @param array $array
     * @param $mobile
     * @return mixed
     */
    public function store(array $array,$mobile);

    /**Read successfully the message
     * @param $id
     * @return mixed
     */
    public function readMessage($id);

    /**
     * Delete message
     * @param $id
     * @return mixed
     */
    public function deleteMessage($id);

    /**
     * return my messages according to user type
     * @param $type
     * @param $id
     * @param $mobile
     * @return mixed
     */
    public function  getMyConversations($type, $id,$mobile);

    /**
     * Get all messages belongs to conversation
     * @param $c_id
     * @return mixed
     */
    public function getMyMessages($c_id);

    /**
     * @param $c_id
     * @param array $data
     * @return mixed
     */
    public function storeToMessageUsingConversation($c_id, array $data);


}