<?php

namespace App\Models\Merchant;

use App\App\Models\Message\Message;
use App\Models\Customer\Customer;
use App\Models\Services\Services;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    protected $table='merchants';
    protected $fillable=['merchant_name','city','location','address','mobile_number','email','status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function customers(){
        return $this->belongsToMany(Customer::class)->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function appointments(){
        return $this->hasMany('App\Models\Appointment\Appointment','merchant_id','id')->where('date',Carbon::now()->format('Y-m-d'));
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function allappointments(){
        return $this->hasMany('App\Models\Appointment\Appointment','merchant_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function services(){
        return $this->belongsToMany(Services::class)->withPivot('price')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages(){
        return $this->hasMany(Message::class,'merchant_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function conversation(){
        return $this->hasMany('App\Models\Conversation\Conversation','merchant_id','id');
    }
}
