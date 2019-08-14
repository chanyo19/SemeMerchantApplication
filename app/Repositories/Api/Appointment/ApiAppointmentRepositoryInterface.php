<?php
namespace App\Repositories\Api\Appointment;
interface ApiAppointmentRepositoryInterface{
    /**
     * @param array $data
     * @return mixed
     */
    public function addCustomerAppointmentRequest(array $data);
}