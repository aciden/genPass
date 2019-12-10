<?php

namespace Generator\Entity\Notepad;

class NotepadItemPost
{
    /**
     * @var integer
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $text;
    /**
     * @var bool
     */
    private $active;
    /**
     * @var \DateTimeImmutable
     */
    private $date;
    /**
     * @var \DateTimeImmutable
     */
    private $dateUpdated;
    /**
     * @var NotepadItem
     */
    private $notepadItem;

    /**
     * NotepadItemPost constructor.
     * @param string $text
     * @param NotepadItem $notepadItem
     */
    public function __construct(string $text, NotepadItem $notepadItem)
    {
        $this->text = $text;
        $this->notepadItem = $notepadItem;
    }

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
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDate(): \DateTimeImmutable
    {
        return $this->date;
    }

    /**
     * @param \DateTimeImmutable $date
     */
    public function setDate(\DateTimeImmutable $date): void
    {
        $this->date = $date;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDateUpdated(): \DateTimeImmutable
    {
        return $this->dateUpdated;
    }

    /**
     * @param \DateTimeImmutable $dateUpdated
     */
    public function setDateUpdated(\DateTimeImmutable $dateUpdated): void
    {
        $this->dateUpdated = $dateUpdated;
    }

    /**
     * @return NotepadItem
     */
    public function getNotepadItem(): NotepadItem
    {
        return $this->notepadItem;
    }

    /**
     * @param NotepadItem $notepadItem
     */
    public function setNotepadItem(NotepadItem $notepadItem): void
    {
        $this->notepadItem = $notepadItem;
    }
}
