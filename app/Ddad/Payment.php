<?php

namespace App\Ddad;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
