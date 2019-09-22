<?php
/**
 * Created by PhpStorm.
 * User: shashilaheshan
 * Date: 2019-09-22
 * Time: 21:54
 */

namespace App\Repositories\Facility;


interface FacilityRepositoryInterface
{

    /**
     * add staff to db
     * @param array $data
     * @return mixed
     */
    public function addFacility(array  $data);
}