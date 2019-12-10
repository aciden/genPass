<?php

namespace app\components;


use Generator\Entity\User\User;
use Generator\Entity\User\UserServiceInterface;
use Phalcon\Di;

class Auth
{
    private $login;

    private $password;

    private $session;

    private $cookies;

    /**
     * @var UserServiceInterface
     */
    private $userService;

    private static $identity = null;

    public function __construct(string $login, string $password)
    {
        $this->login = trim($login);
        $this->password = trim($password);

        $this->session = Di::getDefault()->getShared('session');
        $this->cookies = Di::getDefault()->get('cookies');
        $this->security = Di::getDefault()->get('security');
        $this->userService = Di::getDefault()->get(UserServiceInterface::class);
    }

    public function signin(): void
    {
        /** @var User $user */
        $user = $this->userService->getUserByLogin($this->login);

        if ($user && $this->security->checkHash($this->password, $user->getPassword())) {
            $this->session->set('userAuthId', $user->getId());
            $this->cookies->set('userAuthId', $user->getId(), time() + 15 * 86400);
            self::$identity = $user;
        }
    }

    /**
     * @return User|null
     */
    public static function getIdentity(): ?User
    {
        if (self::$identity) {

            return self::$identity;

        } else {
            /** @var User $user */
            $user = null;
            /** @var UserServiceInterface $userService */
            $userService = Di::getDefault()->get(UserServiceInterface::class);

            $session = Di::getDefault()->get('session');
            $cookies = Di::getDefault()->get('cookies');

            if ($session->has('userAuthId')) {
                $user = $userService->getUser($session->get('userAuthId'));
            } elseif ($cookies->has('userAuthId')) {
                $user = $userService->getUser($cookies->get('userAuthId')->getValue());
            }

            if ($user) {

                return self::$identity = $user;
            }

            return null;

        }
    }
}
