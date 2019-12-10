<?php

namespace Generator\Application\Notepad;

use Generator\Common\Form\AbstractForm;
use Generator\Common\Http\AbstractRequestHandler;
use Generator\Entity\Notepad\NotepadItemPostRequestHandlerInterface;

class NotepadItemPostRequestHandler extends AbstractRequestHandler implements NotepadItemPostRequestHandlerInterface
{

    protected function getForm(): AbstractForm
    {
        // TODO: Implement getForm() method.
    }
}
