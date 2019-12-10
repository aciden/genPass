<?php

namespace Generator\Entity\Password;

interface PasswordRequestHandlerInterface
{
    /**
     * @param int $applicationID
     * @return array
     */
    public function getActivePasswordList(int $applicationID): array;

    /**
     * @param int $applicationID
     * @return array
     */
    public function getInactivePasswordList(int $applicationID): array;

    /**
     * @param int $passwordID
     * @return array
     */
    public function deletePassword(int $passwordID): array;

    /**
     * @param int $applicationID
     * @return array
     */
    public function createPassword(int $applicationID): array;

    /**
     * @param int $passwordID
     * @return array
     */
    public function updatePassword(int $passwordID): array;

    /**
     * @return string
     */
    public function getGeneratePassword(): array;
}
