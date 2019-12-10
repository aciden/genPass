<?php

namespace Generator\Application\User;

use app\components\Auth;
use Generator\Application\User\Extractor\UserExtractor;
use Generator\Common\Di\Di;
use Generator\Common\Form\AbstractForm;
use Generator\Common\Http\AbstractRequestHandler;
use Generator\Common\Http\RequestInterface;
use Generator\Entity\User\UserRequestHandlerInterface;
use Generator\Entity\User\UserServiceInterface;

class UserRequestHandler extends AbstractRequestHandler implements UserRequestHandlerInterface
{
    /**
     * @var UserServiceInterface
     */
    private $userService;

    /**
     * @var RequestInterface
     */
    private $request;

    /**
     * UserRequestHandler constructor.
     * @param UserServiceInterface $userService
     * @param RequestInterface $request
     */
    public function __construct(UserServiceInterface $userService, RequestInterface $request)
    {
        $this->userService = $userService;
        $this->request = $request;
    }

    /**
     * @return array
     */
    public function userAuth()
    {
        $login = $this->request->getPost('login');
        $password = $this->request->getPost('password');

        $auth = new Auth($login, $password);
        $auth->signin();
        
        if (($authUser = Auth::getIdentity())) {

            return UserExtractor::extract(Auth::getIdentity());
        }

        return null;
    }

    /**
     * @return array
     */
    public function signOut()
    {
        $session = Di::get('session');
        $cookies = Di::get('cookies');

        $session->destroy();
        $cookies->get('userAuthId')->delete();

        return [];
    }

    /**
     * @return array
     */
    public function checkAuth()
    {
        $user = Auth::getIdentity();

        return UserExtractor::extract($user);
    }

    protected function getForm(): AbstractForm
    {

    }
}
