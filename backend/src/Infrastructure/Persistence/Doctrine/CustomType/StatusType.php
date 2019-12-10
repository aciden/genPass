<?php

namespace Generator\Infrastructure\Persistence\Doctrine\CustomType;


use Alpha\Bom\Common\Service\StatusService;
use Alpha\Bom\ValueObject\Status\StatusInterface;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

/**
 * Class StatusType
 * @package Alpha\Bom\Infrastructure\Persistence\Doctrine\CustomTypes
 */
class StatusType extends Type
{
    const STATUS = 'status';

    /**
     * @param array $fieldDeclaration
     * @param AbstractPlatform $platform
     * @return string|void
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
    }

    /**
     * @param mixed $value
     * @param AbstractPlatform $platform
     * @return mixed
     * @throws \Exception
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return $value ? StatusService::getStatusById($value) : null;
    }

    /**
     * @param StatusInterface $value
     * @param AbstractPlatform $platform
     * @return mixed
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value ? (int) $value->getId() : null;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return self::STATUS;
    }
}