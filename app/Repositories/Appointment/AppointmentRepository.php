<?php
/**
 * Created by PhpStorm.
 * User: shashilaheshan
 * Date: 2019-08-17
 * Time: 12:11
 */

namespace App\Repositories\Appointment;


use App\Models\Merchant\Merchant;
use App\Traits\MerchantTrait;

class AppointmentRepository implements AppointmentRepositoryInterface
{
    use MerchantTrait;
    /**
     * @var Merchant
     */
    private $merchant;

    /**
     * AppointmentRepository constructor.
     * @param Merchant $merchant
     */
    public function __construct(Merchant $merchant)
    {
        $this->merchant = $merchant;
    }


    /**Return my all appointment history
     * @return mixed
     */
    public function getMyAppointmentHistory()
    {
        return $this->merchant->findOrFail($this->getMerchant())->allappointments;
        // TODO: Implement getMyAppointmentHistory() method.
    }

    /**Return my all appointment belongs to today
     * @return mixed
     */
    public function getMyTodayAppointments()
    {
        // TODO: Implement getMyTodayAppointments() method.
        return $this->merchant->findOrFail($this->getMerchant())->appointments;
    }

    /**Return my all appointment upcomming
     * @return mixed
     */
    public function getMyUpcomingAppointments()
    {
        // TODO: Implement getMyUpcomingAppointments() method.
    }
}