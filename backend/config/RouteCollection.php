<?php

namespace app\config;

use Generator\Entity\Application\ApplicationRequestHandlerInterface;
use Generator\Entity\Notepad\NotepadItemPostRequestHandlerInterface;
use Generator\Entity\Notepad\NotepadItemRequestHandlerInterface;
use Generator\Entity\Notepad\NotepadRequestHandlerInterface;
use Generator\Entity\Password\PasswordRequestHandlerInterface;
use Generator\Application;
use Generator\Entity\User\UserRequestHandlerInterface;
use Phalcon\Di;
use Phalcon\Mvc\Micro\Collection;

class RouteCollection
{
    public function defaultRoute()
    {
        $route = new Collection();
        $route->setHandler('app\controllers\IndexController', true);
        $route->setPrefix('/api-internal');
        $route->get('/', 'index');

        return $route;
    }

    public function applicationRoute()
    {
        $route = new Collection();
        $route->setHandler(
            Di::getDefault()->get(ApplicationRequestHandlerInterface::class)
        );
        $route->setPrefix('/api-internal');
        $route->get('/applications', 'getList');
        $route->put('/create-application', 'createApplication');

        return $route;
    }

    public function passwordRoute()
    {
        $route = new Collection();
        $route->setHandler(
            Di::getDefault()->get(PasswordRequestHandlerInterface::class)
        );
        $route->setPrefix('/api-internal');
        $route->get('/active-passwords/{applicationID}', 'getActivePasswordList');
        $route->get('/inactive-passwords/{applicationID}', 'getInactivePasswordList');
        $route->delete('/delete-password/{applicationID}', 'deletePassword');
        $route->put('/create-password/{applicationID}', 'createPassword');
        $route->post('/update-password/{passwordID}', 'updatePassword');
        $route->get('/gen-password', 'getGeneratePassword');

        return $route;
    }

    public function userRoute()
    {
        $route = new Collection();
        $route->setHandler(
            Di::getDefault()->get(UserRequestHandlerInterface::class)
        );
        $route->setPrefix('/api-internal');
        $route->post('/signin', 'userAuth');
        $route->post('/signout', 'signOut');
        $route->post('/check-auth', 'checkAuth');

        return $route;
    }

    public function notepadRoute()
    {
        $route = new Collection();
        $route->setHandler(
            Di::getDefault()->get(NotepadRequestHandlerInterface::class)
        );
        $route->setPrefix('/api-internal');

        return $route;
    }

    public function notepadItemRoute()
    {
        $route = new Collection();
        $route->setHandler(
            Di::getDefault()->get(NotepadItemRequestHandlerInterface::class)
        );
        $route->setPrefix('/api-internal');

        return $route;
    }

    public function notepadItemPostRoute()
    {
        $route = new Collection();
        $route->setHandler(
            Di::getDefault()->get(NotepadItemPostRequestHandlerInterface::class)
        );
        $route->setPrefix('/api-internal');

        return $route;
    }
}
