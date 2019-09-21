<?php
/**
 * Created by PhpStorm.
 * User: shashilaheshan
 * Date: 2019-09-15
 * Time: 10:09
 */

namespace App\Repositories\Message;


interface MessageRepositoryInterface
{
    /**Store the message in database
     * @param array $array
     * @return mixed
     */
    public function store(array $array);

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
     * @return mixed
     */
    public function  getMyConversations($type, $id);

    /**
     * Get all messages belongs to conversation
     * @param $c_id
     * @return mixed
     */
    public function getMyMessages($c_id);


}