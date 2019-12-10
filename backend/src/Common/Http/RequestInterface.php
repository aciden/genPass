<?php

namespace Generator\Common\Http;

interface RequestInterface
{

    /**
     * @param null $name
     * @param null $filters
     * @param null $defaultValue
     * @param bool $notAllowEmpty
     * @param bool $noRecursive
     * @return mixed
     */
    public function getPost($name = null, $filters = null, $defaultValue = null, $notAllowEmpty = false, $noRecursive = false);

    /**
     * @param null $name
     * @param null $filters
     * @param null $defaultValue
     * @param bool $notAllowEmpty
     * @param bool $noRecursive
     * @return mixed
     */
    public function getPut($name = null, $filters = null, $defaultValue = null, $notAllowEmpty = false, $noRecursive = false);

    /**
     * @param null $name
     * @param null $filters
     * @param null $defaultValue
     * @param bool $notAllowEmpty
     * @param bool $noRecursive
     * @return mixed
     */
    public function getQuery($name = null, $filters = null, $defaultValue = null, $notAllowEmpty = false, $noRecursive = false);

    /**
     * @return mixed
     */
    public function getRawBody();

    /**
     * @return array
     */
    public function getRequestData(): array;
}
