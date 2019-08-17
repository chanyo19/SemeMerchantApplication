<?php
namespace App\Repositories\Service;
interface ServiceRepositoryInterface{

    /**
     * @param array $data
     * @return mixed
     */
    public function addService(array $data);
    public function getMyServices();
}