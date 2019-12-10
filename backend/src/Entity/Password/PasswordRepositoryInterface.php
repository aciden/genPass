<?php

namespace Generator\Entity\Password;

use Generator\Entity\Application\Application;

interface PasswordRepositoryInterface
{
    /**
     * @param int $id
     * @return Password
     */
    public function getPassword(int $id): Password;

    /**
     * @param Application $application
     * @return mixed
     */
    public function findActivePasswords(Application $application);

    /**
     * @param Application $application
     * @return mixed
     */
    public function findInactivePasswords(Application $application);

    /**
     * @param Password $password
     */
    public function save(Password $password): void;
}
