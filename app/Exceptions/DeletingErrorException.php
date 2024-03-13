<?php

namespace App\Exceptions;

class DeletingErrorException extends BusinessLogicException
{
    public function getStatus(): int
    {
        return BusinessLogicException::DELETING_ERROR;
    }

    public function getStatusMessage(): string
    {
        return __('errors.deleting_error');
    }
}
