<?php

namespace Generator\Common\Di;

use Phalcon\Di as PhalconDi;

class Di
{
    public static function get(string $name)
    {
        return PhalconDi::getDefault()->get($name);
    }
}