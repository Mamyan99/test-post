<?php

namespace App\Services\Post\Dto;

use App\Http\Requests\Post\CreatePostRequest;
use Spatie\DataTransferObject\DataTransferObject;

class CreatePostDto extends DataTransferObject
{
    public PostDto $postDto;

    public static function fromRequest(CreatePostRequest $request): self
    {
        return new self(
            postDto: PostDto::fromRequest($request),
        );
    }
}