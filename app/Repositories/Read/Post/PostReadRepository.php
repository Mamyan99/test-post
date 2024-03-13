<?php

namespace App\Repositories\Read\Post;

use App\Exceptions\Post\PostNotFountException;
use App\Models\Post\Post;
use App\Services\Post\Dto\IndexPostsDto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class PostReadRepository implements PostReadRepositoryInterface
{
    private function query(): Builder
    {
        return Post::query();
    }

    public function index(IndexPostsDto $dto): LengthAwarePaginator
    {
        return $this->query()
            ->paginate(
            $dto->pagination->perPage,
            ['*'],
            'page',
            $dto->pagination->page
        );
    }

    public function getById(int $id): Post
    {
        $post = $this->query()->where('id', $id)->first();

        if (is_null($post)) {
            throw new PostNotFountException();
        }

        return $post;
    }
}