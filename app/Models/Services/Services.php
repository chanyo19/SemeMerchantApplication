<?php

namespace App\Models\Services;

use App\Models\Merchant\Merchant;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    public function merchants(){
        return $this->belongsToMany(Merchant::class)->withTimestamps();
    }
}
