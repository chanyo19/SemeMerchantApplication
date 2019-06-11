<?php

namespace App\Http\Controllers;

use App\Audit;
use App\Document;
use App\Events\DocumentUploaded;
use App\Files;
use App\Notification;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use SplFileInfo;

class DocumentController extends Controller
{
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
    //
//View return upload
    public function index(){
  $this->set_audit('view_upload');
   $company=DB::table('departments')->where('is_active','=',1)->get();
        return view('document.upload')->with('company',$company);

    }
    //Saving files with proper details
    public function store(Request $request){
        $user=User::find(Auth::user()->id);

        $count=0;
        $doc_count=$user->doc_count;
        $new_count=0;

        $this->set_audit('store_file_attempt');
        $this->validate($request,[
            'filename' => 'required',
            'filename.*' => 'mimes:doc,pdf,docx,zip,xlsx',
            'title'=>'required',
            'description'=>'required',
             'department'=>'required'


        ]);

        $ip=$request->ip();

        if($request->hasFile('filename')){
      foreach ($request->file('filename') as $file){
                  $filess[]=$file->getClientOriginalName();
                  $files=new Files();

                  $current=Carbon::now()->format('YmdHs');
                  $files->title=$request->title;
                  $files->description=$request->description;
                  $files->department=$request->department;
                  $files->doc_status='pending';
                  $files->tag=$request->tag;

                  $files->uploaded_by=Auth::user()->email;

                   $files->doc_type=$file->extension();


                    $files->new_filename=$current.$file->getClientOriginalName();
                    $files->old_file_name=$file->getClientOriginalName();
                    $files->user_ip=$ip;
                    $files->file_url='http://localhost:8000/Documents/'.$request->department.'/'.$request->title.'/'.$current.$file->getClientOriginalName();

                    $files->save();
                    $count=$count+1;


           $file->move(public_path().'/Documents/'.$request->department.'/'.$request->title.'/', $current.$file->getClientOriginalName());


      }
      $new_count=$doc_count+$count;
      $user->doc_count=$new_count;
      $user->save();
            $data=[
                'title'=>$request->title
            ];
//setting new document uploaded notification type 1
            $noti=new Notification();
            $noti->from_user=Auth::user()->name;
            $noti->type=1;
            $noti->title=$request->title;
            $noti->desc='';
            $noti->is_readed=0;
            $noti->save();
            //sending new broadcast
            event(new DocumentUploaded(Auth::user(),$data,Carbon::now()));


        }
        //sending email
 $this->sendMailMessage('User'.Auth::user()->name.'uploaded '.$request->title);

       return back()->with('success', 'Your files has been successfully added');
    }



    //view particular users docs
    public function viewdocs(){
        $this->set_audit('view_user_doc');

          $auth_user_email=Auth::user()->email;
        $array = ['deleted'];
         // $docs=DB::table('files')->where('uploaded_by','=',$auth_user_email)->whereNotIn('deleted_status',$array)->get();

        $docs=DB::select(DB::raw("SELECT * FROM files WHERE files.uploaded_by='".Auth::user()->email."' AND (files.deleted_status='pending' OR files.deleted_status is null)"));
         //dd($docs);
          return view('document.view')->with('document',$docs);


    }
    public function  viewfilebrowser(){
        $this->set_audit('view_file_browser');

        return view('files.fileviewer');

    }


    //view all docs
    public function viewall(){

        $docs=Files::all();

        return view('document.viewall')->with('document',$docs);

    }
    //send doc delete approval

    public function senddocdeleteapproval($id){

        try{

            $doc=Files::find($id);
            $doc->deleted_status='pending';
            $doc->save();
            return response()->json(['response'=>'success'],200);
        }catch(Exception $ex){

            return response()->json(['response'=>$ex],200);

        }

    }

    //delete doc approval view manager


    public function getStatus(Request $request){



 //$week_doc_count=collect(DB::select(DB::raw("SELECT count(*) as count_week FROM files WHERE yearweek(DATE(files.created_at), 1) = yearweek(curdate(), 1)")))[0]->count_week;
      $month_doc_count=collect(DB::select(DB::raw("SELECT count(*) as count_month FROM files WHERE MONTH(files.created_at) = MONTH(CURRENT_DATE()) AND YEAR(files.created_at) = YEAR(CURRENT_DATE())")))[0]->count_month;

        $date=date('Y-m-d');

     $data="";



        try{

             if($request->id==1){
                 $day_doc_count=Files::Where('created_at', 'like', '%' . $date . '_%')->get();


                  foreach ($day_doc_count as $item){

                      $data.="<tr><td>".$item->department."</td><td>".$item->tag."</td><td>".$item->title."</td><td>".$item->uploaded_by."</td></tr>";

                  }


                 return response()->json(['res'=>$data,'type'=>'Day Documents']);

             }else if($request->id==2){
                 $week_doc_count=collect(DB::select(DB::raw("SELECT *  FROM files WHERE yearweek(DATE(files.created_at), 1) = yearweek(curdate(), 1)")));


                 foreach ($week_doc_count as $item){

                     $data.="<tr><td>".$item->department."</td><td>".$item->tag."</td><td>".$item->title."</td><td>".$item->uploaded_by."</td></tr>";

                 }


                 return response()->json(['res'=>$data,'type'=>'Week Documents']);

             }else{
                 $month_doc_count=collect(DB::select(DB::raw("SELECT * FROM files WHERE MONTH(files.created_at) = MONTH(CURRENT_DATE()) AND YEAR(files.created_at) = YEAR(CURRENT_DATE())")));




                 foreach ($month_doc_count as $item){

                     $data.="<tr><td>".$item->department."</td><td>".$item->tag."</td><td>".$item->title."</td><td>".$item->uploaded_by."</td></tr>";

                 }


                 return response()->json(['res'=>$data,'type'=>'Month Documents']);


             }



         }catch (\Exception $exception){
            return response()->json(['res'=>$exception,'type'=>'Error Occurred']);



         }



    }
public function deletedocapproval(){

        $docs=DB::table('files')->where('deleted_status','=','pending')->get();
        return view('document.docdeleteapproval')->with('document',$docs);
}

        public function storeapprovalstatedocdelete(Request $request){
               $id=$request->id;
               $file=Files::find($id);
               $status=$request->state;
               if($status=='pending'){

                   return response()->json(1,200);

               }else if($status=='approved'){

                 //  $



                   //Store deleted doc in deleted folder

                        $new_file_name=$file->new_filename;
                        $department=$file->department;
                        $title=$file->title;
                        $path=$department."/".$title."/".$new_file_name;
                   //File::makeDirectory(public_path().'/files/Deleted/'.$department.'/'.$title);

                   if (! File::exists(public_path()."/files/Deleted/".$department."/".$title)) {
                       File::makeDirectory(public_path()."/files/Deleted/".$department."/".$title,0777,true);
                   }

                   $val=File::move(public_path().'/files/'.$path, public_path().'/files/Deleted/'.$path);


//return response()->json(['new_file_name'=>$new_file_name,'department'=>$department,'title'=>$title,'path'=>$path,'file'=>$val],200);

                   if($val) {

                       $file->deleted_status='deleted';
                       $file->deleted_url='http://localhost:8000/files/Deleted/'.$department."/".$title."/".$new_file_name;
                       $file->save();
                       return response()->json(2, 200);
                            }else{

                       return response()->json(10,200);
                   }




               }else if($status=='reject'){
                   $file->deleted_status=null;
                   $file->save();

                   return response()->json(3,200);

               }



        }

        //View all deleted docs

    public function indexdeleteddocs(){

        $docs=DB::table('files')->where('deleted_status','=','deleted')->get();
        return view('document.deleteddocs')->with('document',$docs);
    }
    //Recover Deleted docs
    public function recoverdeleteddoc($id){

        $doc=Files::find($id);
        if($doc->deleted_status=='deleted'){

            $doc->deleted_status=null;
            $doc->save();
        }else{


        }

        Session::flash('success','Files Restored Successfully!!');
        return redirect()->back();

       // echo $id;


    }


    public function sendMailMessage($data){
//dd($request->all());
        $to_name = 'DMS';
        $data = array('name'=>"DMS D-Tech", "body" => $data);

        Mail::send('emails.mail', $data, function($message)  {
            $message->to('ebayshashila@gmail.com', 'DMS-D Tech')
                ->subject('New Documents Submitted !!');
            $message->from('dmsheshan@noreply.com','DMS-System');
        });

    }
    public function sendevent(){
        $time=Carbon::now();



    }

    public function testTable(){

        $item=DB::statement('create table shashila(id int primary key,name varchar (100) not null)');
        return response()->json($item);
    }
}


