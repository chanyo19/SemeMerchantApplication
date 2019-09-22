<?php

namespace App\Http\Controllers\Staff;

use App\Models\Staff\Staff;
use App\Repositories\Staff\StaffRepositoryInterface;
use App\Traits\MerchantTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class StaffController extends Controller
{
    use MerchantTrait;
    /**
     * @var StaffRepositoryInterface
     */
    private $staffRepository;

    /**
     * StaffController constructor.
     * @param StaffRepositoryInterface $staffRepository
     */
    public function __construct(StaffRepositoryInterface $staffRepository)
    {
        $this->staffRepository = $staffRepository;
    }
    public function index(){
        return view('staff.add-staff')->with('staffs',Staff::where('merchant_id',$this->getMerchant())->where('is_active',1)->get());
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
      $this->staffRepository->addMember([
          'merchant_id'=>$this->getMerchant(),
          'name'=>$request->name,
          'rating'=>'5',
          'age'=>25,
          'profile_image'=>'http://www.abbieterpening.com/wp-content/uploads/2013/10/profile-pic-round-200px.png',

      ]);
      Session::flash('success','staff saved successfully');
      return redirect()->back();

    }
}
