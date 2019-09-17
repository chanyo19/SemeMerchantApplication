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


}