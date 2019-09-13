<?php

namespace App\Http\Controllers\Appointment;

use App\Repositories\Appointment\AppointmentRepositoryInterface;
use App\Traits\MerchantTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class AppointmentController extends Controller
{
    use MerchantTrait;
    /**
     * @var AppointmentRepositoryInterface
     */
    private $appointmentRepository;

    /**
     * AppointmentController constructor.
     * @param AppointmentRepositoryInterface $appointmentRepository
     */
    public function __construct(AppointmentRepositoryInterface $appointmentRepository)
    {
        $this->middleware('auth');
        $this->appointmentRepository = $appointmentRepository;
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){

        $appointments=$this->appointmentRepository->getMyAppointmentHistory();
      return view('appointment.appointment-history')->with('appointments',$appointments);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function todaymyappointments(){
        //dd($this->appointmentRepository->getMyTodayAppointments());
        return view('appointment.appointment-today')->with('appointments',$this->appointmentRepository->getMyTodayAppointments());
    }

    /**View single appointment
     * @param $appointment_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewAppointment($appointment_id){

        return view('appointment.appointment')->with('appointment',$this->appointmentRepository->getSingleAppointment($appointment_id));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateAppointment(Request $request){

        if($this->appointmentRepository->updateAppointment($request->appointment_id,$request->all())){

            Session::flash('success','Appointment Updated Successfully');
           return redirect()->back();
        }
        else{
            Session::flash('error','Something went wrong');
            return redirect()->back();
        }
    }
    public function notifyCustomer($email,$appointment){
         if($this->appointmentRepository->notifyCustomer($email,$appointment)){
             Session::flash('success','Appointment Reminded Successfully');
             return redirect()->back();
         }else{
             Session::flash('error','Something went wrong');
             return redirect()->back();
         }
    }
}
