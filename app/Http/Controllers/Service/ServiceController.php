<?php

namespace App\Http\Controllers\Service;

use App\Models\Services\Services;
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
        $this->serviceRepository = $serviceRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        return view('services.add-service')->with('services',Services::all());
    }

    /**
     *Store service for a single merchant
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request){

         if($this->serviceRepository->addService($request->only(['service','price'])))
         {
             return redirect()->back();
         }
    }

}
