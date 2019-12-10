<?php

namespace Generator\Application\Password\Extractor;

use Generator\Entity\Application\Application;
use Generator\Entity\Password\Password;

class PasswordExtractor
{

    /**
     * @param array $passwords
     * @return array
     */
    public static function extractList(array $passwords): array
    {
        return array_map(function (Password $password) {
            return self::extract($password);
        }, $passwords);
    }

    /**
     * @param Password $password
     * @return array
     */
    public static function extract(Password $password): array
    {
        return [
            'id' => $password->getId(),
            'login' => $password->getLogin(),
            'password' => $password->getPassword(),
            'date' => $password->getDate()->format('d.m.Y'),
            'date_delete' => $password->getDateDelete() ? $password->getDateDelete()->format('d.m.Y') : null,
        ];
    }
}
