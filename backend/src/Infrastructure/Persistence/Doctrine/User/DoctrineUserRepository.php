<?php

namespace Generator\Infrastructure\Persistence\Doctrine\User;

use Doctrine\ORM\EntityRepository;

use Generator\Entity\User\User;
use Generator\Entity\User\UserRepositoryInterface;

class DoctrineUserRepository extends EntityRepository implements UserRepositoryInterface
{
    /**
     * @param int $id
     * @return User
     */
    public function getUser(int $id): User
    {
        /** @var User $user */
        $user = $this->find($id);

        return $user;
    }

    /**
     * @param string $login
     * @return User|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findUserByLogin(string $login): ?User
    {
        $qbd = $this->createQueryBuilder('user')
            ->where('user.name = :login')
            ->setParameters([
                'login' => $login,
            ])
            ->setMaxResults(1)
            ->getQuery();

        return $qbd->getOneOrNullResult();
    }
}
