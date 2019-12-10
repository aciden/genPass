<?php

namespace Generator\Common\Service;

use Generator\ValueObject\Status\ActiveStatus;
use Generator\ValueObject\Status\StatusInterface;

class StatusService
{
    private static $list = [
        1 => ActiveStatus::class,
    ];

    /**
     * @param int $id
     * @return StatusInterface
     * @throws \Exception
     */
    public static function getStatusById(int $id): StatusInterface
    {
        if (isset(self::$list[$id])) {
            $className = self::$list[$id];
        } else {
            throw new \Exception('Статус с ID ' . $id . ' не определен.');
        }

        return new $className;
    }
}