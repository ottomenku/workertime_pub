<?php

namespace App\Facades;

class CalendarHandler extends \Illuminate\Support\Facades\Facade
{
    public static function getFacadeAccessor()
    {
        return 'ModelHandler';
    }
}