<?php

namespace Generator\ValueObject\Status;

/**
 * Interface StatusInterface
 * @package Generator\ValueObject\Status
 */
interface StatusInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getTitle(): string;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function __toString();
}