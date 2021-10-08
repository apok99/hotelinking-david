<?php

namespace App\Helpers;

use Datetime;

class DateHelper {

    public static function format($date = 'now', $format = 'Y-m-d H:i:s'){
        $date = new Datetime($date);
        return $date->format($format);
    }
    
}