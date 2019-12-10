<?php

namespace Generator\Application\User\Extractor;

use Generator\Entity\User\User;

class UserExtractor
{
    /**
     * @param User $user
     * @return array
     */
    public static function extract(User $user): array
    {
        return [
            'id' => $user->getId(),
            'name' => $user->getName(),
        ];
    }
}
