<?php

namespace App\Services\Post\Dto;

use App\Http\Requests\Post\PostRequest;
use Spatie\DataTransferObject\DataTransferObject;

class PostDto extends DataTransferObject
{
    public string $title;
    public string $content;

    public static function fromRequest(PostRequest $request): self
    {
        return new self(
            title: $request->getTitle(),
            content: $request->getPostContent()
        );
    }
}