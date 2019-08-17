<?php
namespace App\Repositories\Service;
interface ServiceRepositoryInterface{

    /**add services
     * @param array $data
     * @return mixed
     */
    public function addService(array $data);

    /**get my services
     * @return mixed
     */
    public function getMyServices();

    /**
     * @return mixed
     */
    public function getAllServices();
}