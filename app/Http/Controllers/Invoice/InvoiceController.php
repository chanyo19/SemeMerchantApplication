<?php

namespace App\Http\Controllers\Invoice;

use App\Jobs\sendMail;
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
            return view('invoice.create-invoice')->with('appointment',$appointment)->with('services',$services);
        }catch (\Exception $exception){
            return redirect()->back();
        }

    }
    public function send(Request $request){
        if($request){
            dispatch(new sendMail($request->body,$request->mail));
        }
    }
}
