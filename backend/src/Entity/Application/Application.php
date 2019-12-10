<?php

namespace Generator\Entity\Application;

use Doctrine\Common\Collections\Collection;
use Generator\Entity\Password\Password;
use Generator\Entity\User\User;

class Application
{
    /** @var integer */
    private $id;
    /** @var string */
    private $name;
    /** @var bool */
    private $active = true;
    /** @var User */
    private $user;
    /** @var Collection */
    private $passwords;

    /**
     * Application constructor.
     * @param string $name
     * @param User $user
     */
    public function __construct(string $name, User $user)
    {
        $this->name = $name;
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
     * @return Collection
     */
    public function getPasswords(): Collection
    {
        return $this->passwords;
    }
}
