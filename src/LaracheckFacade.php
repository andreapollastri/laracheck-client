<?php

namespace Andr3a\Laracheck;

use Illuminate\Support\Facades\Facade;

class LaracheckFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laracheck';
    }
}
