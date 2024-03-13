<?php

namespace App\Services\Post\Action;

use App\Http\Resources\Post\PostResource;
use App\Repositories\Read\Post\PostReadRepositoryInterface;

class GetPostAction
{
    public function __construct(
        public PostReadRepositoryInterface $postReadRepository
    ) {}

    public function run(int $id): PostResource
    {
        $post = $this->postReadRepository->getById($id);

        return new PostResource($post);
    }
}