<?php

use Phalcon\Mvc\Micro;
use Symfony\Component\Dotenv\Dotenv;

use app\config\AppConfig;
use app\config\AppFactory;

try {
    include_once __DIR__ . '/../vendor/autoload.php';

    (new Dotenv())->load(__DIR__.'/../../.env');
    defined('APP_ENV_DEV') or define('APP_ENV_DEV', getenv('APP_ENV') === 'dev');

    $di = new \Phalcon\Di();
    $di->loadFromPhp(__DIR__ . '/../config/services.php');

    $app = new Micro((new AppFactory()));
    $appConfig = new AppConfig($app);
    $appConfig->addEvents();
    $appConfig->beforeResponse();
    $appConfig->addRoutes();

    $app->handle();

} catch(\Exception $e) {

    echo "PhalconException: ", $e->getMessage() . ', ' . $e->getLine() . ', ' . $e->getFile();

} catch(\Error $e) {

    echo "PhalconException: ", $e->getMessage() . ', ' . $e->getLine() . ', ' . $e->getFile();

}
