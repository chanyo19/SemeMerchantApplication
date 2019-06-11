<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function getdatadonut()
    {

        if (Auth::user()->user_type == 2||Auth::user()->user_type==3) {

            $data=collect(DB::select(DB::raw("select count(id) as count,files.department from files GROUP BY files.department")));

            return response()->json(['data' => $data->toArray()]);
            // return response()->json(['departments'=>DB::select(DB::table("SELECT count(files.id),files.department from files WHERE files.department='Dtech'"))]);
            //}

        }else if(Auth::user()->user_type==1){
            $data=collect(DB::select(DB::raw("select count(id) as count,files.department from files  where uploaded_by='".Auth::user()->email."' GROUP BY files.department")));
            return response()->json(['data' => $data->toArray()]);


        }
    }
}