<?php

namespace Generator\Entity\Notepad;

class NotepadItem
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
     * @var bool
     */
    private $active;
    /**
     * @var \DateTimeImmutable
     */
    private $date;
    /**
     * @var Notepad
     */
    private $notepad;
    /**
     * @var
     */
    private $notepadItemPosts;

    /**
     * NotepadItem constructor.
     * @param string $name
     * @param Notepad $notepad
     */
    public function __construct(string $name, Notepad $notepad)
    {
        $this->name = $name;
        $this->notepad = $notepad;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
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
     * @return Notepad
     */
    public function getNotepad(): Notepad
    {
        return $this->notepad;
    }

    /**
     * @param Notepad $notepad
     */
    public function setNotepad(Notepad $notepad): void
    {
        $this->notepad = $notepad;
    }

    /**
     * @return mixed
     */
    public function getNotepadItemPosts()
    {
        return $this->notepadItemPosts;
    }

    /**
     * @param mixed $notepadItemPosts
     */
    public function setNotepadItemPosts($notepadItemPosts): void
    {
        $this->notepadItemPosts = $notepadItemPosts;
    }
}
