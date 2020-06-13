<?php

namespace App;

use App\Models\Ddad\Shop;

class Placement
{
    protected $string;
    public function __construct($string)
    {
        $this->string = $string;
        $values = explode(',', $this->string);
        $this->name = $values[0] ?? 'Unnamed';
        $this->duration = $values[1] ?? 0;
    }

    public static function all()
    {
        $values = array_filter(explode("\n", setting_get('packages')));

        return collect($values)->map(function($str) {
            return new static($str);
        });
    }

    public function __toString()
    {
        return $this->string;
    }
}
