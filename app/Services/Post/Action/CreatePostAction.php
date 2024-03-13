<?php

namespace App\Services\Post\Action;

use App\Http\Resources\Post\PostResource;
use App\Models\Post\Post;
use App\Repositories\Write\Post\PostWriteRepositoryInterface;
use App\Services\Post\Dto\CreatePostDto;

class CreatePostAction
{
    public function __construct(
        protected PostWriteRepositoryInterface $postWriteRepository
    ) {}

    public function run(CreatePostDto $dto): PostResource
    {
        $post = Post::create($dto);

        $this->postWriteRepository->save($post);

        return new PostResource($post);
    }
}