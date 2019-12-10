<?php

namespace Generator\Infrastructure\Persistence\Doctrine\Application;

use Doctrine\ORM\EntityRepository;
use Generator\Entity\Application\Application;
use Generator\Entity\Application\ApplicationRepositoryInterface;
use Generator\Entity\User\User;

class DoctrineApplicationRepository extends EntityRepository implements ApplicationRepositoryInterface
{

    /**
     * @param int $id
     * @return Application
     */
    public function findById(int $id): Application
    {
        /** @var Application $application */
        $application = $this->find($id);

        return $application;
    }

    /**
     * @param User $user
     * @return array|mixed
     */
    public function findAllByUser(User $user)
    {
        $qb = $this->createQueryBuilder('application')
            ->where('application.active = :active')
            ->andWhere('application.user = :user')
            ->orderBy('UPPER(application.name)', 'ASC')
            ->setParameters([
                'active' => true,
                'user' => $user
            ])
            ->getQuery();

        return $qb->getResult();
    }

    /**
     * @param Application $application
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(Application $application): void
    {
        $this->_em->persist($application);
        $this->_em->flush();
    }
}