<?php
namespace App\Repositories\Api\Merchant;
interface ApiMerchantRepositoryInterface{
    /**
     * @return mixed
     */
    public function getallMerchants();

    /**
     * @param $id
     * @return mixed
     */
    public function getMerchantData($id);

    /**
     * @param $date
     * @param $id
     * @return mixed
     */
    public function getAvailableTimeSlots($date, $id);

    /**
     * @param $mid
     * @return mixed
     */
    public function getServicesBelongsToMerchant($mid);
}