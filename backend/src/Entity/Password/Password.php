<?php

namespace Generator\Entity\Password;

use Generator\Entity\Application\Application;
use Generator\Entity\User\User;

class Password
{
    /** @var integer */
    private $id;
    /** @var string */
    private $login;
    /** @var string */
    private $password;
    /** @var bool */
    private $active = true;
    /** @var \DateTimeImmutable */
    private $date;
    /** @var \DateTimeImmutable */
    private $dateDelete;
    /** @var Application */
    private $application;
    /** @var User  */
    private $user;

    /**
     * Password constructor.
     * @param string $login
     * @param string $password
     * @param Application $application
     * @param User $user
     */
    public function __construct(string $login, string $password, Application $application, User $user)
    {
        $this->login = $login;
        $this->password = $password;
        $this->application = $application;
        $this->user = $user;
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
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin(string $login): void
    {
        $this->login = $login;
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

    /**
     * @return Application
     */
    public function getApplication(): Application
    {
        return $this->application;
    }

    /**
     * @param Application $application
     */
    public function setApplication(Application $application): void
    {
        $this->application = $application;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDate(): \DateTimeImmutable
    {
        return $this->date;
    }

    /**
     * @param \DateTimeImmutable $date
     */
    public function setDate(\DateTimeImmutable $date): void
    {
        $this->date = $date;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getDateDelete(): ?\DateTimeImmutable
    {
        return $this->dateDelete;
    }

    /**
     * @param \DateTimeImmutable $dateDelete
     */
    public function setDateDelete(\DateTimeImmutable $dateDelete): void
    {
        $this->dateDelete = $dateDelete;
    }
}
