<?php

namespace App\Http\Requests\Post;

class UpdatePostRequest extends PostRequest
{
    const ID = 'id';

    public function getId(): int
    {
        return $this->route(self::ID);
    }
}
