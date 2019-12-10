<?php

namespace Generator\Entity\Password;

use Doctrine\Common\Collections\Collection;
use Generator\Application\Password\Dto\PasswordDto;
use Generator\Entity\Application\Application;

interface PasswordServiceInterface
{
    /**
     * @param int $id
     * @return Password
     */
    public function getById(int $id): Password;

    /**
     * @param Application $application
     * @return array
     */
    public function getActivePasswords(Application $application): array;

    /**
     * @param Application $application
     * @return array
     */
    public function getInactivePasswords(Application $application): array;

    /**
     * @param Password $password
     * @return Password
     */
    public function deletePassword(Password $password): Password;

    /**
     * @param Password $password
     * @param PasswordDto $passwordDto
     * @return Password
     */
    public function update(Password $password, PasswordDto $passwordDto): Password;

    /**
     * @param Application $application
     * @param PasswordDto $passwordDto
     * @return Password
     */
    public function create(Application $application, PasswordDto $passwordDto): Password;

    /**
     * @param int $length
     * @param array $options
     * @return string
     */
    public function generatePassword(int $length, array $options): string;
}
