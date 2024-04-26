<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class TextFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'TextService';
    }
}
