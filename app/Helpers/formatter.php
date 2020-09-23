<?php

function formatCurrency($amount = 0)
{
    return $amount . 'TK';
}

function formateDate(\Carbon\Carbon $carbon, $withTime  = false)
{
    return $carbon->format($withTime ? 'd/m/y h:i:s a' : 'd/m/y');
}

function rgb2hex($r,$g = null, $b = null) {
    if(is_array($r)) {
        return rgb2hex($r[0], $r[1], $r[2]);
    }

   return sprintf("#%02x%02x%02x", $r, $g, $b);
}

function redYellowGreen($i, $max)
{
    $outputs = [];

    if(!$outputs) {
        $red = 255; //i.e. FF
        $green = 0;
        $stepSize = 15;//how many colors do you want?
        while ($green < 255) {
            $green += $stepSize;
            if ($green > 255) {
                $green = 255;
            }
            $outputs[] = [$red, $green, 0]; //assume output is function that takes RGB
        }
        while ($red > 0) {
            $red -= $stepSize;
            if ($red < 0) {
                $red = 0;
            }
            $outputs[] = [$red, $green, 0]; //assume output is function that takes RGB
        }
    }

    $totalColour = count($outputs);

    if($i <= 0) {

        return rgb2hex($outputs[0]);
    } else if($i >= $max) {

        return rgb2hex($outputs[$totalColour -  1]);
    }

    $t = $max / $totalColour;
    $c = (int)($i / $t);

    return rgb2hex($outputs[$c]);
}
