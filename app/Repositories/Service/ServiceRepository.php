<?php
namespace App\Repositories\Service;
use App\Models\Merchant\Merchant;
use Illuminate\Support\Facades\Auth;

class ServiceRepository implements ServiceRepositoryInterface{
    /**
     * @var Merchant
     */
    private $merchant;

    /**
     * ServiceRepository constructor.
     * @param Merchant $merchant
     */
    public function __construct(Merchant $merchant)
    {
        $this->merchant = $merchant;
    }

    /**
     * @param $service_id
     * @param array $data
     * @return mixed
     */
    public function addService(array $data)
    {
        $mer_id=Merchant::where('email',Auth::user()->email)->first()->id;
        return Merchant::find($mer_id)->services()->attach($data['service'],['price' => $data['price']]);
        // TODO: Implement addService() method.
    }
}