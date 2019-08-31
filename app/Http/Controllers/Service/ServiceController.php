<?php

namespace App\Http\Controllers\Service;

use App\Repositories\Service\ServiceRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * @var ServiceRepositoryInterface
     */
    private $serviceRepository;

    /**
     * ServiceController constructor.
     * @param ServiceRepositoryInterface $serviceRepository
     */
    public function __construct(ServiceRepositoryInterface $serviceRepository)
    {
        $this->middleware('auth');
        $this->serviceRepository = $serviceRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
          $Service_data = [
              //getting differece collection of all services from my services
            'services'=>$diff=$this->serviceRepository->getAllServices()->diff($this->serviceRepository->getMyServices()),
            'myServicers'=>$this->serviceRepository->getMyServices()
        ];

        return view('services.add-service')->with('data',$Service_data);
    }

    /**
     *Store service for a single merchant
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request){

        //dd($request->all());
         if($this->serviceRepository->addService($request->only(['service','price'])))
         {
             return redirect()->back();
         }
        return redirect()->back();
    }

    /**
     *Delete service for a  merchant
     * @param Request $request
     * @return mixed
     */
    public function delete($service_i){
        if($this->serviceRepository->deleteService($service_i))
        {
            return redirect()->back();
        }
        return redirect()->back();
    }



}
