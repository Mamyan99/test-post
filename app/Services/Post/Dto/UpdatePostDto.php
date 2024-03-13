<?php

namespace App\Services\Post\Dto;

use App\Http\Requests\Post\UpdatePostRequest;
use Spatie\DataTransferObject\DataTransferObject;

class UpdatePostDto extends DataTransferObject
{
    public PostDto $postDto;
    public int $id;

    public static function fromRequest(UpdatePostRequest $request): self
    {
        return new self(
            id: $request->getId(),
            postDto: PostDto::fromRequest($request)
        );
    }
}