<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Symfony\Component\Dotenv\Dotenv;

(new Dotenv())->load(__DIR__.'/../.env');
defined('APP_ENV_DEV') or define('APP_ENV_DEV', getenv('APP_ENV') === 'dev');

return ConsoleRunner::createHelperSet(\app\components\DoctrineEntityManager::getEm());