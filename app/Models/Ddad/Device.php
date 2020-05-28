<?php

namespace App\Models\Ddad;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    //

    public function tvAlerts()
    {
        return rand(0,2);
    }

    public function androidAlerts()
    {
        return rand(0,2);
    }

    public function detectorAlerts()
    {
        return rand(0,2);
    }
}
