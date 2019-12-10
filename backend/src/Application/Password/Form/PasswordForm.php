<?php

namespace Generator\Application\Password\Form;

use Generator\Application\Password\Dto\PasswordDto;
use Generator\Application\Password\Extractor\PasswordExtractor;
use Generator\Common\Form\AbstractForm;
use Generator\Common\Http\RequestInterface;
use Generator\Entity\Password\Password;

/**
 * Class PasswordForm
 * @package Generator\Application\Password\Form
 */
class PasswordForm extends AbstractForm
{

    protected $id;
    protected $user_id;
    protected $application_id;
    protected $login;
    protected $password;
    protected $active;

    public function __construct()
    {
    }

    protected function validateRules(): array
    {
        return [];
    }

    public function getDto()
    {
        $passwordDto = new PasswordDto();
        $passwordDto->id = $this->id;
        $passwordDto->login = $this->login;
        $passwordDto->password = $this->password;

        return $passwordDto;
    }

    public function bindModel($passwordModel)
    {
        $password = PasswordExtractor::extract($passwordModel);

        $this->bind($password);
    }
}
