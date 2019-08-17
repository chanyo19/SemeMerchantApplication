<?php
namespace App\Repositories\Api\Appointment;
use App\Models\Appointment\Appointment;

class ApiAppointmentRepository implements ApiAppointmentRepositoryInterface {
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
    public function addCustomerAppointmentRequest(array $data)
    {
        // TODO: Implement addCustomerAppointmentRequest() method.
        if($data){
            try{
                return $this->appointment->updateOrCreate([
                    'merchant_id'=>$data['merchant_id'],
                    'customer_id'=>$data['customer_id'],
                    'slot_id'=>$data['time'],
                    'date'=>$data['date'],
                    'status'=>1,
                    'special_note'=>$data['note'],
                    'amount'=>$data['amount']
                ]);

            }catch (\Exception $exception){

                return $exception;
            }

        }
    }
}