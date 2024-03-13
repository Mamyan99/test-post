<?php

namespace App\Services\Post\Action;

use App\Repositories\Write\Post\PostWriteRepositoryInterface;

class DeletePostAction
{
    public function __construct(
        public PostWriteRepositoryInterface $postWriteRepository
    ) {}

    public function run(int $id): void
    {
        $this->postWriteRepository->delete($id);
    }
}