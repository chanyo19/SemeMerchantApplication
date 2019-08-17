<?php
namespace App\Repositories\Service;
use App\Models\Merchant\Merchant;
use App\Models\Services\Services;
use App\Traits\MerchantTrait;

class ServiceRepository implements ServiceRepositoryInterface{
    use MerchantTrait;
    /**
     * @var Merchant
     */
    private $merchant;
    /**
     * @var Services
     */
    private $services;

    /**
     * ServiceRepository constructor.
     * @param Merchant $merchant
     * @param Services $services
     */
    public function __construct(Merchant $merchant,Services $services)
    {
        $this->merchant = $merchant;
        $this->services = $services;
    }

    /**add service
     * @param array $data
     * @return mixed
     */
    public function addService(array $data)
    {

        return $this->merchant->findOrFail($this->getMerchant())->services()->attach($data['service'],['price' => $data['price']]);
        // TODO: Implement addService() method.
    }

    /**get my services
     * @return mixed
     */
    public function getMyServices(){
        return $this->merchant->findOrFail($this->getMerchant())->services;
    }


    /**
     * @return mixed
     */
    public function getAllServices()
    {
        // TODO: Implement getAllServices() method.
        return $this->services->all();

    }
}