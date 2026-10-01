<?php
namespace Hubmais\HSmartTef\Facades;

use Illuminate\Support\Facades\Facade;

class HSmartTef extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'h-smart-tef';
    }
}