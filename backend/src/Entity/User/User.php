<?php

namespace Generator\Entity\User;

use Generator\Entity\Application\Application;
use Generator\Entity\Notepad\Notepad;
use Generator\Entity\Password\Password;

class User
{
    /** @var integer */
    private $id;
    /** @var string */
    private $name;
    /** @var string */
    private $password;
    /** @var bool */
    private $active;
    /** @var Application[] */
    private $applications;
    /** @var Password[] */
    private $passwords;
    /**
     * @var Notepad[]
     */
    private $notepads;

    /**
     * User constructor.
     * @param string $name
     * @param string $password
     */
    public function __construct(string $name, string $password)
    {
        $this->name = $name;
        $this->password = $password;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return Application[]
     */
    public function getApplications(): array
    {
        return $this->applications;
    }

    /**
     * @param Application[] $applications
     */
    public function setApplications(array $applications): void
    {
        $this->applications = $applications;
    }

    /**
     * @return Password[]
     */
    public function getPasswords(): array
    {
        return $this->passwords;
    }

    /**
     * @param Password[] $passwords
     */
    public function setPasswords(array $passwords): void
    {
        $this->passwords = $passwords;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }
}
