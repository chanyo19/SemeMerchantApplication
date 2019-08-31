<?php
namespace App\Repositories\Service;
interface ServiceRepositoryInterface{

    /**add services
     * @param array $data
     * @return mixed
     */
    public function addService(array $data);

    /**delete services
     * @param array $data
     * @return mixed
     */
    public function deleteService($data);

    /**get my services
     * @return mixed
     */
    public function getMyServices();

    /**
     * @return mixed
     */
    public function getAllServices();
}
