<?php

namespace Generator\Entity\User;


interface UserServiceInterface
{
    /**
     * @param int $id
     * @return User
     */
    public function getUser(int $id): User;

    /**
     * @param string $login
     * @return User|null
     */
    public function getUserByLogin(string $login): ?User;
}
