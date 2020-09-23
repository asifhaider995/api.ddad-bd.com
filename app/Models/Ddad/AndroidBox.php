<?php

namespace App\Models\Ddad;

use Illuminate\Database\Eloquent\Model;

class AndroidBox extends Model
{
    protected $fillable = ['imei', 'label', 'status'];
}
