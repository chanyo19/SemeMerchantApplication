<?php
namespace App\Repositories\Api\Appointment;
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
                return $this->appointment->updateOrCreate([
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