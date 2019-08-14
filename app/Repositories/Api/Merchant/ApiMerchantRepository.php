<?php
namespace App\Repositories\Api\Merchant;
use App\Models\Appointment\Appointment;
use App\Models\Merchant\Merchant;
use App\Models\TimeSlot\Timeslot;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Mockery\Exception;

class ApiMerchantRepository implements ApiMerchantRepositoryInterface {
    /**
     * @var Merchant
     */
    private $merchant;
    /**
     * @var Appointment
     */
    private $appointment;

    /**
     * ApiMerchantRepository constructor.
     * @param Merchant $merchant
     * @param Appointment $appointment
     */
    public function __construct(Merchant $merchant,Appointment $appointment)
    {
        $this->merchant = $merchant;
        $this->appointment = $appointment;
    }

    /**
     * @return mixed
     */
    public function getallMerchants()
    {

        // TODO: Implement getallMerchants() method.
        return $this->merchant->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getMerchantData($id)
    {

        try{
            $merchant=$this->merchant->findOrFail($id);
            if($merchant){
                return $merchant;
            }else{
                return 0;
            }
        }catch (\Exception $exception){
            return 'Merchant not found';
        }

        // TODO: Implement getMerchantData() method.
    }

    /**
     * @param $date
     * @param $id
     * @return mixed
     */
    public function getAvailableTimeSlots($date, $id)
    {
        // TODO: Implement getAvailableTimeSlots() method.
        $appointments=Appointment::where('date',$date)
            ->where('merchant_id',$id)->get();


            $not_available_slots=[];
            foreach ($appointments as $slot){
                array_push($not_available_slots,$slot->slot_id);
            }

            return $available_time = Timeslot::whereNotIn('id', $not_available_slots)->get();


    }

    /**
     * @param $mid
     * @return mixed
     */
    public function getServicesBelongsToMerchant($mid)
    {
        // TODO: Implement getServicesBelongsToMerchant() method.
        try{
            $merchant=Merchant::findOrFail($mid);

                return $merchant->services;

        }catch (\Exception $x){
            return 'merchant not found';
        }

    }
}