<?php

namespace Generator\Application\Application\Service;


use Generator\Application\Application\Dto\ApplicationDto;
use Generator\Entity\Application\Application;
use Generator\Entity\Application\ApplicationRepositoryInterface;
use Generator\Entity\Application\ApplicationServiceInterface;
use Generator\Entity\User\User;

class ApplicationService implements ApplicationServiceInterface
{
    /** @var ApplicationRepositoryInterface */
    private $applicationRepository;

    /**
     * ApplicationService constructor.
     * @param ApplicationRepositoryInterface $applicationRepository
     */
    public function __construct(ApplicationRepositoryInterface $applicationRepository)
    {
        $this->applicationRepository = $applicationRepository;
    }

    /**
     * @param int $id
     * @return Application
     */
    public function getById(int $id): Application
    {
        return $this->applicationRepository->findById($id);
    }

    /**
     * @param User $user
     * @return mixed
     */
    public function getList(User $user)
    {
        return $this->applicationRepository->findAllByUser($user);
    }

    /**
     * @param ApplicationDto $applicationDto
     * @param User $user
     * @return Application
     */
    public function create(ApplicationDto $applicationDto, User $user): Application
    {
        $application = new Application($applicationDto->name, $user);

        $this->applicationRepository->save($application);

        return $application;
    }
}