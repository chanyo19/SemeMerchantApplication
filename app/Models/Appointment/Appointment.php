<?php

namespace App\Models\Appointment;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function merchant(){
        return $this->belongsTo('App\Models\Merchant\Merchant','id','merchant_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer(){
        return $this->belongsTo('App\Models\Merchant\Customer','id','customer_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function timeslot(){
        return $this->hasOne('App\Models\TimeSlot\Timeslot','id','slot_id');

    }
}
