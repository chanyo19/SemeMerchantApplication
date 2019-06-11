<?php

namespace App\Http\Controllers;

use App\Audit;
use Illuminate\Http\Request;

class AuditController extends Controller
{
public function index(){

    $data=Audit::all();
    return view('auth.audit')->with('data',$data);

}
}
