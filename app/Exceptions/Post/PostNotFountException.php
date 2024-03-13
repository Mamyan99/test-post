<?php

namespace App\Exceptions\Post;

use App\Exceptions\BusinessLogicException;

class PostNotFountException extends BusinessLogicException
{
    public function getStatus(): int
    {
        return BusinessLogicException::POST_NOT_FOUND;
    }

    public function getStatusMessage(): string
    {
        return __('errors.post_not_found');
    }
}