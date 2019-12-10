<?php

namespace app\components;

use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\EntityManager;
use Generator\Infrastructure\Persistence\Doctrine\CustomType\StatusType;

class DoctrineEntityManager
{

    /**
     * @return EntityManager
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\ORM\ORMException
     */
    public static function getEm(): EntityManager
    {
        $config = \Doctrine\ORM\Tools\Setup::createXMLMetadataConfiguration([

            __DIR__ . '/../config/doctrine/Application',
            __DIR__ . '/../config/doctrine/Password',
            __DIR__ . '/../config/doctrine/User',
            __DIR__ . '/../config/doctrine/Notepad'

        ], APP_ENV_DEV, __DIR__ . '/../runtime/doctrine/proxy');

        $config->setAutoGenerateProxyClasses(APP_ENV_DEV);

        /** @var EntityManager $em */
        $em = EntityManager::create(
            [
                'driver' => 'pdo_sqlite',
                'user' => '',
                'password' => '',
                'path' => __DIR__ . '/../../db/db.sqlite',
                'autoCommit' => false,
            ], $config);

        Type::addType('status', StatusType::class);

        return $em;
    }
}
