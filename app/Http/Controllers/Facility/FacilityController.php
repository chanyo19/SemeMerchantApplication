<?php

namespace App\Http\Controllers\Facility;

use App\Models\Facility\Facility;
use App\Repositories\Facility\FacilityRepositoryInterface;
use App\Repositories\Staff\StaffRepositoryInterface;
use App\Traits\MerchantTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class FacilityController extends Controller
{
    use MerchantTrait;
    /**
     * @var StaffRepositoryInterface
     */
    private $facilityRepo;

    /**
     * StaffController constructor.
     * @param FacilityRepositoryInterface $facilityRepo
     */
    public function __construct(FacilityRepositoryInterface $facilityRepo)
    {
        $this->facilityRepo = $facilityRepo;
    }
    public function index(){
        return view('facility.add-facility')->with('facilities',Facility::where('merchant_id',$this->getMerchant())->where('is_active',1)->get());
    }

    /**
     * Add staff member to db
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request){
      $request->validate([
          'name'=>'required|max:30'
      ]);
      $this->facilityRepo->addFacility([
          'merchant_id'=>$this->getMerchant(),
          'facility_name'=>$request->name,
      ]);
      Session::flash('success','Facility saved successfully');
      return redirect()->back();

    }
}
