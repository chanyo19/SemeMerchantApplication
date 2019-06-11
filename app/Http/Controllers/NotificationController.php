<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function getallnotifications(){

        $datas=DB::table('notifications')->where('is_readed','=',0)->get();

        $count = DB::select( DB::raw("select count(id) as count from notifications where is_readed=0") );
        $data=['name'=>$datas,'count'=>$count];
        return response()->json($data,200);


    }
    public function getuser(){
   $auth=Auth::user()->user_type;
        return response()->json($auth);

    }
    public function setRead($id,$type){

        $notification=Notification::find($id);
        $notification->is_readed=1;
        $notification->save();
        if($type==1){

            return redirect('/view-all-docs');

        }else{

            return redirect()->back();
        }




    }
}
