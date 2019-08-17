<?php

namespace App\Http\Controllers\Appointment;

use App\Repositories\Appointment\AppointmentRepositoryInterface;
use App\Traits\MerchantTrait;
use App\Http\Controllers\Controller;

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

      return view('appointment.appointment-history')->with('appointments',$this->appointmentRepository->getMyAppointmentHistory());
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function todaymyappointments(){
        return view('appointment.appointment-today')->with('appointments',$this->appointmentRepository->getMyTodayAppointments());
    }
}
