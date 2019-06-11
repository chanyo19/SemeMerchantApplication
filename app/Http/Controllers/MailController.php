<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class MailController extends Controller
{
    public function sendMailMessage(Request $request){
//dd($request->all());
        $to_name = 'shashila';
        $to_email = $request->email;
        $subjects = $request->subject;
        $body=$request->mailbody;
        $data = array('name'=>"DMS D-Tech", "body" => $body);

        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email,$subjects) {
            $message->to($to_email, $to_name)
                ->subject($subjects);
            $message->from('dmsheshan@noreply.com','DMS-System');
        });
        Session::flash('success','Email Sent Successfully!!');
        return redirect()->back();
    }
}
