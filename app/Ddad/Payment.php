<?php

namespace App\Ddad;

use App\Models\Ddad\Campaign;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paymentable()
    {
        return $this->morphTo('paymentable');
    }

    public function receivedAmount()
    {
        if(!$this->paymentable instanceof Campaign) {
            return 0;
        }

        return $this->paymentable->payments->where('id', '<=', $this->id)->sum('amount');
    }

    public function dueAmount()
    {
        return $this->paymentable->actual_price - $this->receivedAmount();
    }
}
