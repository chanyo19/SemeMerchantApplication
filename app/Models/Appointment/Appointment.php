<?php

namespace App\Models\Appointment;

use App\Models\Customer\Customer;
use App\Models\Merchant\Merchant;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table='appointments';
    protected $fillable=['appointment_id','merchant_id','customer_id','slot_id','date','status','special_note','amount','services'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function merchant(){
        return $this->belongsTo(Merchant::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer(){
        return $this->belongsTo('App\Models\Customer\Customer','customer_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function timeslot(){
        return $this->hasOne('App\Models\TimeSlot\Timeslot','id','slot_id');

    }
}
