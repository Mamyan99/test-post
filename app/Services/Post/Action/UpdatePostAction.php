<?php

namespace App\Services\Post\Action;

use App\Http\Resources\Post\PostResource;
use App\Repositories\Read\Post\PostReadRepositoryInterface;
use App\Repositories\Write\Post\PostWriteRepositoryInterface;
use App\Services\Post\Dto\UpdatePostDto;

class UpdatePostAction
{
    public function __construct(
        public PostReadRepositoryInterface $postReadRepository,
        public PostWriteRepositoryInterface $postWriteRepository
    ) {}

    public function run(UpdatePostDto $dto): PostResource
    {
        $post = $this->postReadRepository->getById($dto->id);
        $post->updateByUser($dto);
        $this->postWriteRepository->save($post);

        return new PostResource($post);
    }
}