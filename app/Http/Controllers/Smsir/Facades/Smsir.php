<?php

namespace App\Http\Controllers\Smsir\Facades;

use Illuminate\Support\Facades\Facade;

class Smsir extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'smsir';
    }
}