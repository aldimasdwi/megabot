<?php

namespace App\Helpers;

use App\Models\Setting;

class Helpers
{
    public static function settings()
    {
        return Setting::first();
    }

}
