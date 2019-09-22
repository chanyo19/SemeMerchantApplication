<?php
/**
 * Created by PhpStorm.
 * User: shashilaheshan
 * Date: 2019-09-22
 * Time: 21:54
 */

namespace App\Repositories\Staff;


interface StaffRepositoryInterface
{

    /**
     * add staff to db
     * @param array $data
     * @return mixed
     */
    public function addMember(array  $data);
}