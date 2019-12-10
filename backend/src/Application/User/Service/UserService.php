<?php

namespace Generator\Application\User\Service;


use Generator\Entity\User\User;
use Generator\Entity\User\UserRepositoryInterface;
use Generator\Entity\User\UserServiceInterface;

class UserService implements UserServiceInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * UserService constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param int $id
     * @return User
     */
    public function getUser(int $id): User
    {
        return $this->userRepository->getUser($id);
    }

    /**
     * @param string $login
     * @return User|null
     */
    public function getUserByLogin(string $login): ?User
    {
        return $this->userRepository->findUserByLogin($login);
    }
}
