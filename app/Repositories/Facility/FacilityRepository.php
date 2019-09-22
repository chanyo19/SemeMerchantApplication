<?php
/**
 * Created by PhpStorm.
 * User: shashilaheshan
 * Date: 2019-09-22
 * Time: 21:54
 */

namespace App\Repositories\Facility;


use App\Models\Facility\Facility;

class FacilityRepository implements FacilityRepositoryInterface
{

    /**
     * @var Staff
     */
    private $model;

    /**
     * StaffRepository constructor.
     * @param Facility $model
     */
    public function __construct(Facility $model)
    {
        $this->model = $model;
    }


    /**
     * add staff to db
     * @param array $data
     * @return mixed
     */
    public function addFacility(array $data)
    {
        // TODO: Implement addMember() method.
     return $this->model->updateOrCreate($data);

    }
}