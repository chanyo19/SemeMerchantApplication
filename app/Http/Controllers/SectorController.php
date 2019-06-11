<?php

namespace App\Http\Controllers;

use App\Audit;
use App\Department;
use App\Sector;
use App\SectorApproval;
use App\SectorApprovalDelete;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SectorController extends Controller
{

    public function createsector(){
        $this->set_audit('create_sector_view');

     $sectors=DB::table('sectors')->where('is_deleted','=',0)->get();




     return view('sector.create')->with('sector',$sectors);
    }
    public function store(Request $request){
        $this->set_audit('store_sector_attempt');

        $this->validate($request,[
            'name'=>'required|unique:sectors'

        ]);
       $sector=new Sector();
       $sector->name=$request->name;
       $sector->created_by=Auth::user()->email;
       $sector->save();
       Session::flash('success','Sector Saved Successfully!!');
       return redirect()->back();
    }

public function getSectorDetails($id){


        $sector=Sector::findOrFail($id)
        ;
        return response()->json($sector,200);

}

    public function set_audit($type){

        $audit=new Audit();
        $audit->user=Auth::user()->name;
        $audit->action_url=$type;
        $audit->save();




    }

public function getcompanyDetails($id){

    $sector=Department::findOrFail($id)
    ;
    return response()->json($sector,200);

}
    public function createcompany(){
        $this->set_audit('create_company_view');

        $company=Department::all();
        $users=User::all();
        $sector=DB::table('sectors')->where('is_active',"=",1)->get();
        return view('sector.companycreate')->with('company',$company)->with('sector',$sector)->with('user',$users);
    }

    public function storecompany(Request $request){
        $this->set_audit('store_company_attempt');

        $this->validate($request,[

            'name'=>'required|string|unique:departments',
            'sector'=>'required|string',
            'location'=>'required|string',
            'hod'=>'required',


        ]);

      $company=new Department();

      $company->name=$request->name;
      $company->sector_id=$request->sector;
      $company->department_location=$request->location;
      $company->hod=$request->hod;
      $company->desc=$request->description;
      $company->created_by=Auth::user()->email;
      $company->save();
      Session::flash('success','Company Saved Successfully!!');
      return redirect()->back();



    }



    //view sector approval details for manager

    public function  sectorapprovalsview(){
        $data=DB::table('sector_approvals')->where('approved_status','=','pending')->get();
        $data2=DB::table('sector_approval_deletes')->where('status','=','pending')->get();

        return view('sector.sectorapprovals')->with('sector',$data)->with('sectors',$data2);

    }


    public function companyapprovalsview(){

        return view('sector.companyapprovals');

    }
public function editsectorview($id){


        $sector=DB::table('sectors')->where('id','=',$id)->get();
        //dd($sector->all());
        return view('sector.sectoredit')->with('sectors',$sector);
}


public function sendsectoreditapproval(Request $request){

        $tmp_sec_edit=new SectorApproval();

        $tmp_sec_edit->sector_id=$request->id;
        $tmp_sec_edit->old_name=$request->old_name;
        $tmp_sec_edit->new_name=$request->name;
        $tmp_sec_edit->is_active=1;
        $tmp_sec_edit->requested_by=Auth::user()->email;
        $tmp_sec_edit->save();

        Session::flash('success','Sector Edit Send For Approvals successfully!!');
        return redirect()->back();

}


   public function getajaxeditsectorapprovaldata($id){

        $data=DB::table('sector_approvals')->where('id','=',$id)->get();
        return response()->json(['data'=>$data]);
   }
   public function getajaxdeletesectorapprovaldata($id){

        $data=DB::table('sector_approval_deletes')->where('id','=',$id)->get();
        return response()->json(['data'=>$data]);

   }

   public function storeapprovalstatesectoredit(Request $request){

        $state=$request->state;
       $data=SectorApproval::find($request->id);
        if($state=='pending'){

            return response()->json(1);

        }
       else if($state=='approved'){


           $id=$data->sector_id;
           $new_name=$data->new_name;

           $sec=Sector::find($id);

           $sec->name=$new_name;
           $sec->edit_approved=null;
           $sec->save();

           SectorApproval::find($request->id)->delete();


           return response()->json(2);

       }
       else if($state=='reject'){

           $id=$data->sector_id;


           $sec=Sector::find($id);


           $sec->edit_approved=null;
           $sec->save();

           SectorApproval::find($request->id)->delete();


           return response()->json(3);
       }





   }

   public function storeapprovalstatesectordelete(Request $request){

       $state=$request->state;
       $data=SectorApprovalDelete::find($request->id);
       if($state=='pending'){

           return response()->json(1);

       }
       else if($state=='approved'){


           $id=$data->sector_id;


           $sec=Sector::find($id);


           $sec->is_deleted=1;
           $sec->save();

           SectorApprovalDelete::find($request->id)->delete();


           return response()->json(2);

       }
       else if($state=='reject'){



           SectorApprovalDelete::find($request->id)->delete();


           return response()->json(3);
       }

     //  return response()->json($request->all());
   }

   public function deletesectorview($id){

        $sector=DB::table('sectors')->where('id','=',$id)->get();
        return view('sector.sectordelete')->with('sectors',$sector);

   }


   public function sectorsenddeleteapproval(Request $request){

       $tmp_sec_edit=new SectorApprovalDelete();

       $tmp_sec_edit->sector_id=$request->id;
       $tmp_sec_edit->sec_name=$request->name;
       $tmp_sec_edit->remark=$request->remark;
       $tmp_sec_edit->status='pending';
       $tmp_sec_edit->requested_by=Auth::user()->email;
       $tmp_sec_edit->save();

       Session::flash('success','Sector Delete Send For Approvals successfully!!');
       return redirect()->back();
   }

}
