<?php

namespace Generator\Entity\Application;

interface ApplicationRequestHandlerInterface
{
    /**
     * @return array
     */
    public function getList(): array;

    /**
     * @return array
     */
    public function createApplication(): array;
}
