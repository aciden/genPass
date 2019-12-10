<?php

namespace Generator\Entity\User;


interface UserRepositoryInterface
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
    public function findUserByLogin(string $login): ?User;
}
