<?php

function formatCurrency($amount = 0)
{
    return '$' . $amount;
}

function formateDate(\Carbon\Carbon $carbon, $withTime  = false)
{
    return $carbon->format($withTime ? 'd/m/y h:i:s a' : 'd/m/y');
}
