<?php

namespace Ibrahimalanshor\Spl\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * AccessInfo
 */
class AccessInfo extends Facade 
{    
    /**
     * getFacadeAccessor
     *
     * @return void
     */
    protected static function getFacadeAccessor()
    {
        return 'access-info';
    }
}
