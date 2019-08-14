<?php

namespace App\Http\Controllers\Appointment;

use App\Models\Merchant\Merchant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index(){

        $appointments=Merchant::findOrFail(Merchant::where('email',Auth::user()->email)->first()->id)->allappointments;
      return view('appointment.appointment-history')->with('appointments',$appointments);
    }
    public function todaymyappointments(){
        $appointments=Merchant::findOrFail(Merchant::where('email',Auth::user()->email)->first()->id)->appointments;
        return view('appointment.appointment-today')->with('appointments',$appointments);
    }
}
