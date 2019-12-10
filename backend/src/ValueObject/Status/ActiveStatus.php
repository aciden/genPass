<?php

namespace Generator\ValueObject\Status;

/**
 * Class ActiveStatus
 * @package Generator\ValueObject\Status
 */
class ActiveStatus implements StatusInterface
{
    /**
     * @var int Идентификатор
     */
    private $id = 1;

    /**
     * @var string Название
     */
    private $title = 'Активный';

    /**
     * @var string Системное название
     */
    private $name = 'active';

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function __toString()
    {
        return (int) $this->id;
    }
}
