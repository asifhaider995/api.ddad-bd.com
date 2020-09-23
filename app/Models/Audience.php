<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Audience extends Model
{
    protected $fillable = ['number_of_audience', 'shop_id', 'detector_serial'];
}
