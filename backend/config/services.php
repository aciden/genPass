<?php

use Doctrine\ORM\EntityManager;

use app\components\DoctrineEntityManager;
use Generator\Common\Http\RequestInterface;
use Generator\Common\Http\Request;

/**
 * Application
 */
use Generator\Entity\Application\Application;
use Generator\Entity\Application\ApplicationServiceInterface;
use Generator\Application\Application\Service\ApplicationService;
use Generator\Entity\Application\ApplicationRequestHandlerInterface;
use Generator\Application\Application\ApplicationRequestHandler;

/**
 * Password
 */
use Generator\Entity\Password\Password;
use Generator\Entity\Password\PasswordServiceInterface;
use Generator\Application\Password\Service\PasswordService;
use Generator\Entity\Password\PasswordRequestHandlerInterface;
use Generator\Application\Password\PasswordRequestHandler;

/**
 *  User
 */
use Generator\Entity\User\User;
use Generator\Entity\User\UserServiceInterface;
use Generator\Application\User\Service\UserService;
use Generator\Entity\User\UserRequestHandlerInterface;
use Generator\Application\User\UserRequestHandler;

/** @var EntityManager $em */
$em = DoctrineEntityManager::getEm();

return [
    RequestInterface::class => [
        'className' => Request::class,
        'shared' => true,
    ],
    'em' => $em,
    ApplicationServiceInterface::class => [
        'className' => ApplicationService::class,
        'arguments' => [
            [
                'type' => 'parameter',
                'value' => $em->getRepository(Application::class),
            ]
        ],
    ],
    ApplicationRequestHandlerInterface::class => [
        'className' => ApplicationRequestHandler::class,
        'arguments' => [
            [
                'type' => 'service',
                'name' => ApplicationServiceInterface::class,
            ],
            [
                'type' => 'service',
                'name' => RequestInterface::class,
            ]
        ],
    ],
    PasswordServiceInterface::class => [
        'className' => PasswordService::class,
        'arguments' => [
            [
                'type' => 'parameter',
                'value' => $em->getRepository(Password::class),
            ]
        ],
    ],
    PasswordRequestHandlerInterface::class => [
        'className' => PasswordRequestHandler::class,
        'arguments' => [
            [
                'type' => 'service',
                'name' => PasswordServiceInterface::class,
            ],
            [
                'type' => 'service',
                'name' => ApplicationServiceInterface::class,
            ],
            [
                'type' => 'service',
                'name' => RequestInterface::class,
            ]
        ],
    ],
    UserServiceInterface::class => [
        'className' => UserService::class,
        'arguments' => [
            [
                'type' => 'parameter',
                'value' => $em->getRepository(User::class),
            ]
        ],
    ],
    UserRequestHandlerInterface::class => [
        'className' => UserRequestHandler::class,
        'arguments' => [
            [
                'type' => 'service',
                'name' => UserServiceInterface::class,
            ],
            [
                'type' => 'service',
                'name' => RequestInterface::class,
            ]
        ],
    ],
];