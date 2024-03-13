<?php

namespace App\Repositories\Read\Post;

use App\Models\Post\Post;
use App\Services\Post\Dto\IndexPostsDto;
use Illuminate\Pagination\LengthAwarePaginator;

interface PostReadRepositoryInterface
{
    public function index(IndexPostsDto $dto): LengthAwarePaginator;
    public function getById(int $id): Post;
}