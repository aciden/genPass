<?php

namespace Generator\Application\Notepad;

use Generator\Common\Form\AbstractForm;
use Generator\Common\Http\AbstractRequestHandler;
use Generator\Entity\Notepad\NotepadItemRequestHandlerInterface;

class NotepadItemRequestHandler extends AbstractRequestHandler implements NotepadItemRequestHandlerInterface
{

    protected function getForm(): AbstractForm
    {
        // TODO: Implement getForm() method.
    }
}
