<?php

namespace Generator\Common\Http;

class Request extends \Phalcon\Http\Request implements RequestInterface
{
    /**
     * @param null $name
     * @param null $filters
     * @param null $defaultValue
     * @param bool $notAllowEmpty
     * @param bool $noRecursive
     * @return mixed|void
     */
    public function getPost($name = null, $filters = null, $defaultValue = null, $notAllowEmpty = false, $noRecursive = false)
    {
        return parent::getPost($name, $filters, $defaultValue, $notAllowEmpty, $noRecursive);
    }

    /**
     * @param null $name
     * @param null $filters
     * @param null $defaultValue
     * @param bool $notAllowEmpty
     * @param bool $noRecursive
     * @return mixed
     */
    public function getPut($name = null, $filters = null, $defaultValue = null, $notAllowEmpty = false, $noRecursive = false)
    {
        return parent::getPut($name, $filters, $defaultValue, $notAllowEmpty, $noRecursive);
    }

    /**
     * @param null $name
     * @param null $filters
     * @param null $defaultValue
     * @param bool $notAllowEmpty
     * @param bool $noRecursive
     * @return mixed
     */
    public function getQuery($name = null, $filters = null, $defaultValue = null, $notAllowEmpty = false, $noRecursive = false)
    {
        return parent::getQuery($name, $filters, $defaultValue, $notAllowEmpty, $noRecursive);
    }

    /**
     * @return mixed|string
     */
    public function getRawBody()
    {
        return parent::getRawBody();
    }

    /**
     * @return array
     */
    public function getRequestData(): array
    {
        if ($this->isPost()) {

            return $this->getPost();

        } elseif ($this->isPut()) {

            return $this->getPut();

        }
    }
}
