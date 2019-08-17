<?php
/**
 * Created by IntelliJ IDEA.
 * User: Damith Thiwanka
 * Date: 7/6/2019
 * Time: 3:50 PM
 */
namespace App\Http\Controllers;
use App\Repositories\Appointment\AppointmentRepositoryInterface;
class DashBoardController extends Controller
{
    /**
     * @var AppointmentRepositoryInterface
     */
    private $appointmentRepository;

    /**
     * Create a new controller instance.
     *
     * @param AppointmentRepositoryInterface $appointmentRepository
     */
    public function __construct(AppointmentRepositoryInterface $appointmentRepository)
    {
       $this->middleware('auth');
        $this->appointmentRepository = $appointmentRepository;
    }

    /**
     * Show the application dashboard with merchant data.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard')->with('appointments',$this->appointmentRepository->getMyTodayAppointments());
    }

}
