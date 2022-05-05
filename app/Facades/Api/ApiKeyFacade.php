<?php

namespace App\Facades\Api;

use Illuminate\Support\Facades\Facade;

class ApiKeyFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "ApiKey";
    }
}
