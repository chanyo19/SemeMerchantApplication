<?php
/**
 * Created by PhpStorm.
 * User: shashilaheshan
 * Date: 2019-09-22
 * Time: 21:54
 */

namespace App\Repositories\Staff;


use App\Models\Staff\Staff;

class StaffRepository implements StaffRepositoryInterface
{

    /**
     * @var Staff
     */
    private $model;

    /**
     * StaffRepository constructor.
     * @param Staff $model
     */
    public function __construct(Staff $model)
    {
        $this->model = $model;
    }


    /**
     * add staff to db
     * @param array $data
     * @return mixed
     */
    public function addMember(array $data)
    {
        // TODO: Implement addMember() method.
     return $this->model->updateOrCreate($data);

    }
}