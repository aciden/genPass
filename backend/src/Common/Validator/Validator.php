<?php

namespace Generator\Common\Validator;

/**
 * Class Validator
 * @package Generator\Common\Validator
 */
class Validator implements ValidatorInterface
{
    /**
     * @var array
     */
    private $postData;

    public function __construct(array $postData)
    {
        $this->postData = $postData;
    }
}
