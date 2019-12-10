<?php

namespace Generator\Entity\Application;

use Generator\Entity\User\User;

interface ApplicationRepositoryInterface
{
    /**
     * @param int $id
     * @return Application
     */
    public function findById(int $id): Application;

    /**
     * @param User $user
     * @return mixed
     */
    public function findAllByUser(User $user);

    /**
     * @param Application $application
     * @return mixed
     */
    public function save(Application $application): void;
}
