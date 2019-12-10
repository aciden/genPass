<?php

namespace Generator\Infrastructure\Persistence\Doctrine\Password;

use Doctrine\ORM\EntityRepository;
use Generator\Entity\Application\Application;
use Generator\Entity\Password\Password;
use Generator\Entity\Password\PasswordRepositoryInterface;

class DoctrinePasswordRepository extends EntityRepository implements PasswordRepositoryInterface
{

    /**
     * @param int $id
     * @return Password
     */
    public function getPassword(int $id): Password
    {
        /** @var Password $password */
        $password = $this->find($id);

        return $password;
    }

    /**
     * @param Application $application
     * @return array|mixed
     */
    public function findActivePasswords(Application $application)
    {
        $qb = $this->createQueryBuilder('passwords')
            ->where('passwords.active = :active')
            ->andWhere('passwords.application = :application')
            ->orderBy('UPPER(passwords.login)', 'ASC')
            ->setParameters([
                'active' => true,
                'application' => $application
            ])
            ->getQuery();

        return $qb->getResult();
    }

    /**
     * @param Application $application
     * @return array|mixed
     */
    public function findInactivePasswords(Application $application)
    {
        $qb = $this->createQueryBuilder('passwords')
            ->where('passwords.active = :active')
            ->andWhere('passwords.application = :application')
            ->orderBy('UPPER(passwords.login)', 'ASC')
            ->setParameters([
                'active' => false,
                'application' => $application
            ])
            ->getQuery();

        return $qb->getResult();
    }

    /**
     * @param Password $password
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(Password $password): void
    {
        $this->_em->persist($password);
        $this->_em->flush();
    }
}
