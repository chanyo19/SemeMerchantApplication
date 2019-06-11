<?php

namespace App\Http\Controllers;

use App\Audit;
use App\Department;
use App\Files;
use App\User;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function set_audit($type){

        $audit=new Audit();
        $audit->user=Auth::user()->name;
        $audit->action_url=$type;
        $audit->save();



    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()

    {

        $data=null;
        ;

        $data_array=null;

       $date=date('Y-m-d');

       $total_docs=Files::all()->count();
       //dd($total_docs);

        $total_users=User::all()->where('is_active','=','1')->count();

        $total_departments=Department::all()->where('is_active','=','1')->count();



        //dd($total_departments);


        $day_doc_count=Files::Where('created_at', 'like', '%' . $date . '_%')->count();

        $week_doc_count=collect(DB::select(DB::raw("SELECT count(*) as count_week FROM files WHERE yearweek(DATE(files.created_at), 1) = yearweek(curdate(), 1)")))[0]->count_week;
        $month_doc_count=collect(DB::select(DB::raw("SELECT count(*) as count_month FROM files WHERE MONTH(files.created_at) = MONTH(CURRENT_DATE()) AND YEAR(files.created_at) = YEAR(CURRENT_DATE())")))[0]->count_month;

         $data_array=array([$day_doc_count,$week_doc_count,$month_doc_count]);

        if (Auth::user()->user_type == 2||Auth::user()->user_type==3) {

            $data=collect(DB::select(DB::raw("select count(id) as count,files.department from files GROUP BY files.department")));


            // return response()->json(['departments'=>DB::select(DB::table("SELECT count(files.id),files.department from files WHERE files.department='Dtech'"))]);
            //}

        }else if(Auth::user()->user_type==1){
            $data=collect(DB::select(DB::raw("select count(id) as count,files.department from files  where uploaded_by='".Auth::user()->email."' GROUP BY files.department")));



        }

        $this->set_audit('view_home');
        $auth_user_email=Auth::user()->email;
        if(Auth::user()->user_type==2){
            $docs=Files::all()->where('deleted_status','!=','deleted');
        }else {
            $docs = DB::table('files')->where('uploaded_by', '=', $auth_user_email)->get();
        }
        return view('homenew')->with('document',$docs)->with('dep_docs',$data)->with('doc_data',$data_array)->with('total_docs',$total_docs)->
            with('total_users',$total_users)->
        with('total_departments',$total_departments);
    }
    public function getallusers(){


        $users=User::all();
        return view('layouts.viewusers')->with('user',$users);
    }
    public function getUserInfo($email){

        $user=DB::table('users')->where('email',$email)->get();
        return response()->json(['data'=>$user]);
    }
}
