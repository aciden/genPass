<?php

namespace Generator\Application\Application;

use app\components\Auth;
use Generator\Application\Application\Extractor\ApplicationExtractor;
use Generator\Application\Application\Form\ApplicationForm;
use Generator\Common\Form\AbstractForm;
use Generator\Common\Http\AbstractRequestHandler;
use Generator\Common\Http\RequestInterface;
use Generator\Entity\Application\Application;
use Generator\Entity\Application\ApplicationRequestHandlerInterface;
use Generator\Entity\Application\ApplicationServiceInterface;

class ApplicationRequestHandler extends AbstractRequestHandler implements ApplicationRequestHandlerInterface
{
    /**
     * @var ApplicationServiceInterface
     */
    private $applicationService;

    /**
     * @var RequestInterface
     */
    private $request;

    /**
     * ApplicationRequestHandler constructor.
     * @param ApplicationServiceInterface $applicationService
     * @param RequestInterface $request
     */
    public function __construct(
        ApplicationServiceInterface $applicationService,
        RequestInterface $request
    )
    {
        $this->applicationService = $applicationService;
        $this->request = $request;
    }

    /**
     * @return array
     */
    public function getList(): array
    {
        $user = Auth::getIdentity();

        return ApplicationExtractor::extractList($this->applicationService->getList($user));
    }

    /**
     * @return array
     */
    public function createApplication(): array
    {
        $requestData = $this->request->getPut();
        $user = Auth::getIdentity();
        $form = $this->getForm();
        $form->handlerRequest($requestData);

        return ApplicationExtractor::extract($this->applicationService->create($form->getDto(), $user));
    }


    /**
     * @return AbstractForm
     */
    protected function getForm(): AbstractForm
    {
        return new ApplicationForm();
    }
}
