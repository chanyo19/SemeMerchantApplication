<?php

namespace App\Http\Controllers\Api;

use App\Models\Appointment\Appointment;
use App\Repositories\Api\Appointment\ApiAppointmentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    /**
     * @var ApiAppointmentRepository
     */
    private $appointmentRepository;

    /**
     * AppointmentController constructor.
     * @param ApiAppointmentRepository $appointmentRepository
     */
    public function __construct(ApiAppointmentRepository $appointmentRepository)
    {
        $this->appointmentRepository = $appointmentRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addAppointmentFromCustomer(Request $request){
        try{
            return response()->json(['response'=>$this->appointmentRepository->addCustomerAppointmentRequest($request->all())],200);
        }catch (\Exception $exception){
            return response()->json(['response'=>0],404);
        }

    }

    /**
     * @param Request $request
     * @return
     */
    public function getMyAppointments(Request $request){
        return Appointment::where([
            'customer_id' => 4,
            'status' => 1,
        ])->get();
    }
}
