<?php

namespace Generator\Infrastructure\Persistence\Doctrine\Notepad;

use Doctrine\ORM\EntityRepository;
use Generator\Entity\Notepad\NotepadRepositoryInterface;

class DoctrineNotepadRepository extends EntityRepository implements NotepadRepositoryInterface
{

}
