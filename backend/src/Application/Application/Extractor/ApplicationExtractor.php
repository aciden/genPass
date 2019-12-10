<?php

namespace Generator\Application\Application\Extractor;


use Doctrine\Common\Collections\Collection;
use Generator\Entity\Application\Application;
use Generator\Entity\Password\Password;

class ApplicationExtractor
{

    /**
     * @param array $applications
     * @return array
     */
    public static function extractList(array $applications)
    {
        return array_map(function (Application $application) {
            return [
                'id' => $application->getId(),
                'name' => $application->getName()
            ];
        }, $applications);
    }

    /**
     * @param Application $application
     * @return array
     */
    public static function extract(Application $application)
    {
        return [
            'id' => $application->getId(),
            'name' => $application->getName()
        ];
    }
}
