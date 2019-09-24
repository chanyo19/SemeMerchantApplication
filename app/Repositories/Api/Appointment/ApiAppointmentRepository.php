<?php
namespace App\Repositories\Api\Appointment;
use App\Jobs\sendMail;
use App\Jobs\SendPushNotification;
use App\Models\Appointment\Appointment;
use App\Models\Invoice\Invoice;
use App\Traits\CustomerTrait;

class ApiAppointmentRepository implements ApiAppointmentRepositoryInterface {
    use CustomerTrait;
    /**
     * @var Appointment
     */
    private $appointment;
    /**
     * @var Invoice
     */
    private $invoice;

    /**
     * ApiAppointmentRepository constructor.
     * @param Appointment $appointment
     * @param Invoice $invoice
     */
    public function __construct(Appointment $appointment,Invoice $invoice)
    {
        $this->appointment = $appointment;
        $this->invoice = $invoice;
    }


    /**
     * @param array $data
     * @param $cus_id
     * @param $push_id
     * @return mixed
     */
    public function addCustomerAppointmentRequest(array $data,$cus_id,$push_id)
    {

        // TODO: Implement addCustomerAppointmentRequest() method.
        if($data&&$cus_id){
            try{
                dispatch(new sendMail("New appointment added from ".$cus_id .'Customer to - '.$data['merchant_id'].'merchant','New User Registered!!'));
                if($push_id){
                    dispatch(new SendPushNotification([$push_id],"Appointment Added Successfully. - MERCHANT -".$data['merchant_id'],"Confirmed"));
                }
                $appointment= $this->appointment->updateOrCreate([
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
                $invoice=$this->invoice->create([
                    'appointment_id'=>$appointment->appointment_id,
                    'merchant_id'=>$appointment->merchant_id,
                    'customer_id'=>$appointment->customer_id,
                    'services'=>$appointment->services,
                    'amount'=>$appointment->amount,
                    'invoiced_person'=>$appointment->merchant_id,
                ]);
                if($invoice){
                    return $appointment;
                }

            }catch (\Exception $exception){

                return $exception;
            }

        }
    }
}