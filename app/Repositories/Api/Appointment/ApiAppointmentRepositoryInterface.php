<?php
namespace App\Repositories\Api\Appointment;
interface ApiAppointmentRepositoryInterface{
    /**
     * @param array $data
     * @param $cus_id
     * @param $push_id
     * @return mixed
     */
    public function addCustomerAppointmentRequest(array $data,$cus_id,$push_id);
}