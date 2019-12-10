<?php

namespace Generator\Common\Http;

use Generator\Common\Form\AbstractForm;

abstract class AbstractRequestHandler
{
    protected abstract function getForm(): AbstractForm;
}
