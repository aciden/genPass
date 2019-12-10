<?php

namespace Generator\Common\Form;

use Generator\Common\Validator\Validator;

/**
 * Class AbstractForm
 * @package Generator\Common\Form
 */
abstract class AbstractForm
{
    /**
     * @var array
     */
    public $postData;

    /**
     * @var Validator
     */
    private $validator;

    /**
     * AbstractForm constructor.
     */
    public function __construct()
    {
    }

    abstract public function getDto();
    abstract public function bindModel($object);
    abstract protected function validateRules(): array;

    public function validate()
    {
        $this->validator = new Validator($this->postData);

        foreach ($this->validateRules() as $validateAttr => $validateRule) {

            $this->validator->{$validateRule['name']}();
        }
    }

    /**
     * @param array $requestData
     */
    public function handlerRequest(array $requestData)
    {
        $this->postData = $requestData;

        $this->load();
    }

    /**
     * @param array $modelData
     */
    protected function bind(array $modelData)
    {
        foreach ($modelData as $attr => $data) {
            $this->{$attr} = $data;
        }
    }

    /**
     *
     */
    protected function load()
    {
        foreach ($this->postData as $attr => $data) {
            $this->{$attr} = $data;
        }
    }
}
