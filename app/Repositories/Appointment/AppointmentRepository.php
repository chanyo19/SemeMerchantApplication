<?php
/**
 * Created by PhpStorm.
 * User: shashilaheshan
 * Date: 2019-08-17
 * Time: 12:11
 */

namespace App\Repositories\Appointment;


use App\Jobs\sendMail;
use App\Models\Appointment\Appointment;
use App\Models\Merchant\Merchant;
use App\Traits\MerchantTrait;

class AppointmentRepository implements AppointmentRepositoryInterface
{
    use MerchantTrait;
    /**
     * @var Merchant
     */
    private $merchant;
    /**
     * @var Appointment
     */
    private $appointment;

    /**
     * AppointmentRepository constructor.
     * @param Merchant $merchant
     * @param Appointment $appointment
     */
    public function __construct(Merchant $merchant,Appointment $appointment)
    {
        $this->merchant = $merchant;
        $this->appointment = $appointment;
    }


    /**Return my all appointment history
     * @return mixed
     */
    public function getMyAppointmentHistory()
    {
        return $this->merchant->findOrFail($this->getMerchant())->allappointments;
        // TODO: Implement getMyAppointmentHistory() method.
    }

    /**Return my all appointment belongs to today
     * @return mixed
     */
    public function getMyTodayAppointments()
    {
        // TODO: Implement getMyTodayAppointments() method.

        return $this->merchant->findOrFail($this->getMerchant())->appointments;
    }

    /**Return my all appointment upcomming
     * @return mixed
     */
    public function getMyUpcomingAppointments()
    {
        // TODO: Implement getMyUpcomingAppointments() method.
    }

    /**Get single appointment using appointment id
     * @param $appointment_id
     * @return mixed
     */
    public function getSingleAppointment($appointment_id)
    {
        // TODO: Implement getSingleAppointment() method.

        return $this->appointment::where('appointment_id',$appointment_id)->first();


    }

    /**Update appointment data
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function updateAppointment($id, array $data)
    {
        // TODO: Implement updateAppointment() method.
        $status=null;
        switch ($data['app_status']){
            case 1:
                $status="Pending";
                break;
            case 2:
                $status="Approved";
                break;
            case 3:
                $status="Cancelled";
                break;
            default:
                $status=null;

        }
        dispatch(new sendMail("Appointment was ".$status.'-'.$data['cus_email'],"Appointment Updated",$data['cus_email']));
        return  $this->appointment::where('appointment_id',$id)->first()->update([
            'status'=>$data['app_status']
         ]);
    }
    public function notifyCustomer($email,$appointment){
        dispatch(new sendMail('Reminder - Appointment ID- '.$appointment,"Appointment Reminder",$email));
        return true;
    }
}