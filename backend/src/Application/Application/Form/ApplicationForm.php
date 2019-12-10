<?php

namespace Generator\Application\Application\Form;

use Generator\Application\Application\Dto\ApplicationDto;
use Generator\Application\Password\Extractor\PasswordExtractor;
use Generator\Common\Form\AbstractForm;

/**
 * Class ApplicationForm
 * @package Generator\Application\Application\Form
 */
class ApplicationForm extends AbstractForm
{

    protected $id;
    protected $name;

    public function __construct()
    {
    }

    protected function validateRules(): array
    {
        return [];
    }

    public function getDto()
    {
        $applicationDto = new ApplicationDto();
        $applicationDto->id = $this->id;
        $applicationDto->name = $this->name;

        return $applicationDto;
    }

    public function bindModel($object)
    {
        // TODO: Implement bindModel() method.
    }
}
