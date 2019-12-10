<?php

namespace app\config;

use Generator\Common\Di\Di;
use Phalcon\Events\Event;
use Phalcon\Events\Manager;
use Phalcon\Exception;
use Phalcon\Flash\Session;
use Phalcon\Http\Response\Cookies;
use Phalcon\Mvc\Micro;

class AppConfig
{
    private $_app;

    public function __construct(Micro $app)
    {
        $this->_app = $app;
    }

    public function addEvents()
    {
        $eventsManager = new Manager();

        $eventsManager->attach(
            'micro:beforeExecuteRoute',
            function (Event $event, $app) {

                /** @var Session $session */
                $session = Di::get('session');
                /** @var Cookies $cookies */
                $cookies = Di::get('cookies');

                if ($session->has('userAuthId') || $cookies->has('userAuthId')) {

                    return true;

                } elseif ($this->_app->getRouter()->getMatchedRoute()->getPattern() === '/api-internal/signin') {

                    return true;
                }

                $app->response->setStatusCode('401');
                $app->response->setContent('The user isn\'t authenticated');
                $app->response->send();

                return false;
            }
        );

        $this->_app->setEventsManager($eventsManager);
    }

    public function beforeResponse()
    {
        $app = $this->_app;
        $this->_app->after(function () use ($app) {

            $responseData = $app->getReturnedValue();

            if (is_array($responseData)) {
                $app->response->setContent(json_encode($responseData));
            } elseif (!strlen($responseData)) {
                $app->response->setStatusCode(204, 'No Content');
            } else {
                $app->response->setStatusCode(500, 'Internal Server Error');
            }

            $app->response->setCookies(\Phalcon\Di::getDefault()->get('cookies'));

            $app->response->send();
        });
    }

    public function addRoutes()
    {
        $routes = new RouteCollection();

        $this->_app->notFound(function () {
            $this->_app->response->setStatusCode(404, 'Not found');
            $this->_app->response->send();
        });

        $this->_app->mount($routes->applicationRoute());
        $this->_app->mount($routes->passwordRoute());
        $this->_app->mount($routes->userRoute());
        $this->_app->mount($routes->defaultRoute());
    }
}
