<?php

namespace Generator\Infrastructure\Persistence\Doctrine\Notepad;

use Doctrine\ORM\EntityRepository;
use Generator\Entity\Notepad\NotepadItemRepositoryInterface;

class DoctrineNotepadItemRepository extends EntityRepository implements NotepadItemRepositoryInterface
{

}
