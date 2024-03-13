<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

abstract class BusinessLogicException extends Exception
{
    const SAVING_ERROR = 601;
    const DELETING_ERROR = 602;
    const POST_NOT_FOUND = 610;

    abstract public function getStatus(): int;
    abstract public function getStatusMessage(): string;

}
