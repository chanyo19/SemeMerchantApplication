<?php
/**
 * Created by PhpStorm.
 * User: shashilaheshan
 * Date: 2019-08-17
 * Time: 12:12
 */

namespace App\Repositories\Appointment;


interface AppointmentRepositoryInterface
{
    /**Return my all appointment history
     * @return mixed
     */
    public function getMyAppointmentHistory();

    /**Return my all appointment belongs to today
     * @return mixed
     */
    public function getMyTodayAppointments();

    /**Return my all appointment upcomming
     * @return mixed
     */
    public function getMyUpcomingAppointments();

    /**Get single appointment using appointment id
     * @param $appointment_id
     * @return mixed
     */
    public function getSingleAppointment($appointment_id);

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function updateAppointment($id, array $data);

    /**
     * @param $email
     * @param $appointment
     * @param $push_id
     * @return mixed
     */
    public function notifyCustomer($email, $appointment,$push_id);

}