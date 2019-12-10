<?php

namespace Generator\Infrastructure\Persistence\Doctrine\Notepad;

use Doctrine\ORM\EntityRepository;
use Generator\Entity\Notepad\NotepadItemPostRepositoryInterface;

class DoctrineNotepadItemPostRepository extends EntityRepository implements NotepadItemPostRepositoryInterface
{

}
