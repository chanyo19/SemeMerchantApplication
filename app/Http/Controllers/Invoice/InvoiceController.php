<?php

namespace App\Http\Controllers\Invoice;

use App\Models\Appointment\Appointment;
use App\Models\Merchant\Merchant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    public function index($app_id){
        try{

            $appointment=Appointment::where('appointment_id',$app_id)->with('merchant','customer','timeslot')->get()->toArray();
            $services=explode(',',$appointment[0]["services"]);
            $servicesOfMerchant=Merchant::findOrFail($appointment[0]["merchant_id"]);
            $merServices=array();
             foreach ($services as $service){
                // array_push($merServices,[$servicesOfMerchant->services->where('service',$service)->toArray(),'price'=>100]);
             }
           // dd($merServices);
            return view('invoice.create-invoice')->with('appointment',$appointment)->with('services',collect($merServices));
        }catch (\Exception $exception){
            dd($exception);
        }

    }
}
