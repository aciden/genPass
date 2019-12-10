<?php

namespace Generator\Entity\Application;

use Generator\Application\Application\Dto\ApplicationDto;
use Generator\Entity\User\User;

interface ApplicationServiceInterface
{
    /**
     * @param int $id
     * @return Application
     */
    public function getById(int $id): Application;

    /**
     * @param User $user
     * @return mixed
     */
    public function getList(User $user);

    /**
     * @param ApplicationDto $applicationDto
     * @param User $user
     * @return Application
     */
    public function create(ApplicationDto $applicationDto, User $user): Application;
}

