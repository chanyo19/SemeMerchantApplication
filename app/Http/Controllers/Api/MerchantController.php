<?php

namespace App\Http\Controllers\Api;

use App\Models\Facility\Facility;
use App\Models\Staff\Staff;
use App\Repositories\Api\Merchant\ApiMerchantRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;

class MerchantController extends Controller
{
    /**
     * @var ApiMerchantRepositoryInterface
     */
    private $merchantRepository;


    /**
     * MerchantController constructor.
     * @param ApiMerchantRepositoryInterface $merchantRepository
     */
    public function __construct(ApiMerchantRepositoryInterface $merchantRepository)
    {
        $this->merchantRepository = $merchantRepository;
        $this->middleware('auth');
    }

    /**
     *
     */
    public function getMerchants(){
        return response()->json(['merchants'=>$this->merchantRepository->getallMerchants()],200);
    }

    /**
     *Get merchants by query
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMerchantByQuery(Request $request){

        return response()->json(['merchants'=>$this->merchantRepository->getMerchantsByQuery($request->search_string)],200);

    }

    /**
     * @param $id
     * @param $date
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMerchantData($id,$date){
        try{
            return response()->json(['merchant'=>$this->merchantRepository->getMerchantData($id),
                'available_time'=>$this->merchantRepository->getAvailableTimeSlots($date,$id),
                'staff'=>Staff::where('merchant_id',$id)->where('is_active',1)->get(),
                'facilities'=>Facility::where('merchant_id',$id)->where('is_active',1)->get()
              ],200);
        }catch (Exception $exception){
               return response()->json(['error'=>$exception],404);
        }

    }

    /**
     * @param $mid
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMerchantServices($mid){

         return response()->json(['services'=>$this->merchantRepository->getServicesBelongsToMerchant($mid),

         ],200);

    }

}
