<?php
namespace App\Repositories\Api\Appointment;
use App\Jobs\sendMail;
use App\Models\Appointment\Appointment;
use App\Traits\CustomerTrait;

class ApiAppointmentRepository implements ApiAppointmentRepositoryInterface {
    use CustomerTrait;
    /**
     * @var Appointment
     */
    private $appointment;

    /**
     * ApiAppointmentRepository constructor.
     * @param Appointment $appointment
     */
    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }


    /**
     * @param array $data
     * @return mixed
     */
    public function addCustomerAppointmentRequest(array $data,$cus_id)
    {
        // TODO: Implement addCustomerAppointmentRequest() method.
        if($data&&$cus_id){


            try{
                dispatch(new sendMail("New appointment added from ".$cus_id .'Customer to - '.$data['merchant_id'].'merchant'));
                return $this->appointment->updateOrCreate([
                    'appointment_id'=>time().'-'.$data['merchant_id'].'-'.$cus_id,
                    'merchant_id'=>$data['merchant_id'],
                    'customer_id'=>$cus_id,
                    'slot_id'=>$data['time'],
                    'date'=>$data['date'],
                    'status'=>1,
                    'special_note'=>$data['note'],
                    'amount'=>$data['amount'],
                    'services'=>$data['services']
                ]);

            }catch (\Exception $exception){

                return $exception;
            }

        }
    }
}