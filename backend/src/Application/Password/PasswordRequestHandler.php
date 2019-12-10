<?php

namespace Generator\Application\Password;

use Generator\Application\Password\Extractor\PasswordExtractor;
use Generator\Application\Password\Form\PasswordForm;
use Generator\Common\Form\AbstractForm;
use Generator\Common\Http\AbstractRequestHandler;
use Generator\Entity\Application\ApplicationServiceInterface;
use Generator\Entity\Password\PasswordRequestHandlerInterface;
use Generator\Entity\Password\PasswordServiceInterface;

use Generator\Common\Http\RequestInterface;

class PasswordRequestHandler extends AbstractRequestHandler implements PasswordRequestHandlerInterface
{
    /**
     * @var PasswordServiceInterface
     */
    private $passwordService;
    /**
     * @var ApplicationServiceInterface
     */
    private $applicationService;
    /**
     * @var RequestInterface
     */
    private $request;

    /**
     * PasswordRequestHandler constructor.
     * @param PasswordServiceInterface $passwordService
     * @param ApplicationServiceInterface $applicationService
     * @param RequestInterface $request
     */
    public function __construct(
        PasswordServiceInterface $passwordService,
        ApplicationServiceInterface $applicationService,
        RequestInterface $request
    ) {
        $this->passwordService = $passwordService;
        $this->applicationService = $applicationService;
        $this->request = $request;
    }

    /**
     * @param int $applicationID
     * @return array
     */
    public function getActivePasswordList(int $applicationID): array
    {
        $application = $this->applicationService->getById($applicationID);
        $passwords = $this->passwordService->getActivePasswords($application);

        return PasswordExtractor::extractList($passwords);
    }

    /**
     * @param int $applicationID
     * @return array
     */
    public function getInactivePasswordList(int $applicationID): array
    {
        $application = $this->applicationService->getById($applicationID);
        $passwords = $this->passwordService->getInactivePasswords($application);

        return PasswordExtractor::extractList($passwords);
    }

    /**
     * @param int $passwordID
     * @return array
     */
    public function deletePassword(int $passwordID): array
    {
        $password = $this->passwordService->getById($passwordID);

        return PasswordExtractor::extract($this->passwordService->deletePassword($password));
    }

    /**
     * @param int $applicationID
     * @return array
     */
    public function createPassword(int $applicationID): array
    {
        $requestData = $this->request->getPut();
        $application = $this->applicationService->getById($applicationID);

        $form = $this->getForm();
        $form->handlerRequest($requestData);

        return PasswordExtractor::extract($this->passwordService->create($application, $form->getDto()));
    }

    /**
     * @param int $passwordID
     * @return array
     */
    public function updatePassword(int $passwordID): array
    {
        $requestData = $this->request->getPost();
        $password = $this->passwordService->getById($passwordID);

        $form = $this->getForm();
        $form->bindModel($password);
        $form->handlerRequest($requestData);

        return PasswordExtractor::extract($this->passwordService->update($password, $form->getDto()));
    }

    /**
     * @return string
     */
    public function getGeneratePassword(): array
    {
        $length = (int) $this->request->getQuery('length');
        $options = $this->request->getQuery('options');

        return ['password' => $this->passwordService->generatePassword($length, $options)];
    }

    /**
     * @return AbstractForm
     */
    protected function getForm(): AbstractForm
    {
        return new PasswordForm();
    }
}
