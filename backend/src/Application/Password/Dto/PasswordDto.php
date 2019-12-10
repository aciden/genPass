<?php

namespace Generator\Application\Password\Dto;

use Generator\Entity\Application\Application;
use Generator\Entity\User\User;

/**
 * Class PasswordDto
 * @package Generator\Application\Password\Dto
 */
class PasswordDto
{
    /**
     * @var int
     */
    public $id;
    /**
     * @var User
     */
    public $user;
    /**
     * @var Application
     */
    public $application;
    /**
     * @var string
     */
    public $login;
    /**
     * @var string
     */
    public $password;
}
