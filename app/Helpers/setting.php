<?php

function setting_get($key)
{
    return \App\Models\Setting::pull($key);
}

function setting_set($key, $value)
{
    return \App\Models\Setting::set($key, $value);
}

function setting($key)
{
    return $key = \App\Models\Setting::find($key);
}
