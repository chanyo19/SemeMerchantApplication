<?php

namespace App\Http\Controllers\Invoice;

use App\Jobs\sendMail;
use App\Models\Appointment\Appointment;
use App\Models\Invoice\Invoice;
use App\Models\Merchant\Merchant;
use App\Traits\MerchantTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class InvoiceController extends Controller
{
    use MerchantTrait;
    /**
     *Get my invoices list
     */
    public function indexMyInvoices(){
        return view('invoice.my-invoices')->with('invoices',Merchant::findOrFail($this->getMerchant())->getMerchantInvoices);
    }

    /**
     * @param $inv_id
     * @param $app_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index($inv_id,$app_id){
        try{

            $appointment=Appointment::where('appointment_id',$app_id)->with('merchant','customer','timeslot')->get()->toArray();
            $services=explode(',',$appointment[0]["services"]);
            return view('invoice.create-invoice')->with('appointment',$appointment)->with('services',$services)->with('invoice',$inv_id);
        }catch (\Exception $exception){
            return redirect()->back();
        }

    }

    /**
     * @param Request $request
     */
    public function send(Request $request){
        if($request){
            dispatch(new sendMail($request->body,$request->mail));
        }
    }

    /**
     * @param $inv_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function markInvoiceAsPaid($inv_id){
        $invoice=Invoice::findOrFail($inv_id)->update([
            'type'=>1
        ]);
        if($invoice){
            Session::flash('success','Invoice Paid Successfully..');
            return redirect()->back();
        }else{
            Session::flash('error','Something went wrong..');
            return redirect()->back();
        }
    }
}
