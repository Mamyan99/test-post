<?php

namespace App\Repositories\Write\Post;

use App\Exceptions\DeletingErrorException;
use App\Exceptions\SavingErrorException;
use App\Models\Post\Post;
use Illuminate\Database\Eloquent\Builder;

class PostWriteRepository implements PostWriteRepositoryInterface
{
    private function query(): Builder
    {
        return Post::query();
    }

    public function save(Post $post): bool
    {
        if (!$post->save()) {
            throw new SavingErrorException();
        }

        return true;
    }

    public function delete(int $id): bool
    {
        $query = $this->query()
            ->where('id', $id);

        if (!$query->delete()) {
            throw new DeletingErrorException();
        }

        return true;
    }
}