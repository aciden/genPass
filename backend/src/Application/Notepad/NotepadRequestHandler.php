<?php

namespace Generator\Application\Notepad;

use Generator\Common\Form\AbstractForm;
use Generator\Common\Http\AbstractRequestHandler;
use Generator\Entity\Notepad\NotepadRequestHandlerInterface;

class NotepadRequestHandler extends AbstractRequestHandler implements NotepadRequestHandlerInterface
{

    protected function getForm(): AbstractForm
    {
        // TODO: Implement getForm() method.
    }
}
