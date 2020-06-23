<?php

namespace App;

use App\Models\Ddad\Shop;

class Package
{
    protected $string;
    public function __construct($string)
    {
        $this->string = $string;
        $values = explode(',', $this->string);
        $this->name = $values[0] ?? 'Unnamed';
        $this->duration = (int) $values[1] ?? 0;
        $this->rate = (int) $values[2] ?? 0;
    }

    public static function all()
    {
        $values = array_filter(explode("\n", setting_get('packages')));

        return collect($values)->map(function($str) {
            return new static($str);
        });
    }

    public function calculatePrice($numberOfTv, $durationMonth)
    {
        return $numberOfTv * $durationMonth * $this->rate;
    }

    public function __toString()
    {
        return $this->string;
    }

    public static function countNumberOfTv($ids)
    {
        return Shop::whereIn('location_id', $ids)
            ->whereNotNull('device_id')
            ->count();
    }

}
