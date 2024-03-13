<?php

namespace App\Repositories\Write\Post;

use App\Models\Post\Post;

interface PostWriteRepositoryInterface
{
    public function save(Post $post): bool;
    public function delete(int $id): bool;
}