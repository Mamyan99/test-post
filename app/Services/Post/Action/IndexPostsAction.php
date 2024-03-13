<?php

namespace App\Services\Post\Action;

use App\Http\Resources\Post\PostResource;
use App\Repositories\Read\Post\PostReadRepositoryInterface;
use App\Services\Post\Dto\IndexPostsDto;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexPostsAction
{
    public function __construct(
        public PostReadRepositoryInterface $postReadRepository
    ) {}

    public function run(IndexPostsDto $dto): AnonymousResourceCollection
    {
        $posts = $this->postReadRepository->index($dto);

        return PostResource::collection($posts);
    }
}