<?php

namespace App\Models\Ddad;

use Illuminate\Database\Eloquent\Model;

class Detector extends Model
{
    protected $fillable = ['unique_id', 'label', 'status'];
}
