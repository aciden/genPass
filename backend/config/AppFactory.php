<?php

namespace app\config;

use app\components\DoctrineEntityManager;
use Doctrine\ORM\EntityManager;
use Generator\Application\Application\Service\ApplicationService;
use Generator\Entity\Application\Application;
use Generator\Entity\Application\ApplicationRepositoryInterface;
use Generator\Entity\Application\ApplicationServiceInterface;
use Generator\Entity\Password\Password;
use Generator\Entity\Password\PasswordRepositoryInterface;
use Generator\Entity\Password\PasswordServiceInterface;
use Generator\Application\Password\Service\PasswordService;
use Phalcon\Di;
use Phalcon\DI\FactoryDefault;
use Phalcon\Security;
use Phalcon\Http\Response\Cookies;
use Phalcon\Session\Adapter\Files;
use Phalcon\Crypt;
use Phalcon\Http\Response;

class AppFactory extends FactoryDefault
{
    public function __construct()
    {
        parent::__construct();
        $this->setSecur();
        $this->setCrypt();
        $this->setCoockie();
        $this->setSession();
        $this->handleResponse();
    }

    private function handleResponse()
    {
        Di::getDefault()->setShared(
            'response',
            function () {
                $response = new Response();
                $response->setContentType('application/json', 'utf-8');

                return $response;
            }
        );
    }

    private function setSecur()
    {
        Di::getDefault()->setShared('security', function(){
            $security = new Security();
            //Устанавливаем фактор хеширования в 12 раундов
            $security->setWorkFactor(12);

            return $security;
        });
    }

    private function setCoockie()
    {
        Di::getDefault()->setShared('cookies', function() {
            $cookies = new Cookies();
            $cookies->useEncryption(true);

            return $cookies;
        });
    }

    private function setCrypt()
    {
        Di::getDefault()->setShared('crypt', function() {
            $crypt = new Crypt();
            $crypt->setCipher('aes-256-ctr');
            $crypt->setKey('vJ4RIGAGg6vJ9lAD'); // Используйте свой собственный ключ!

            return $crypt;
        });
    }

    private function setSession()
    {
        Di::getDefault()->setShared('session', function() {
            $session = new Files();
            $session->start();

            return $session;
        });
    }
}