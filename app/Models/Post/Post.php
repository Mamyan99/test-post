<?php

namespace App\Models\Post;

use App\Services\Post\Dto\CreatePostDto;
use App\Services\Post\Dto\UpdatePostDto;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @package App\Models\Post\Post
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */

class Post extends Model
{
    use HasFactory;

    public static function create(CreatePostDto $dto): self
    {
        $post = new self();

        $post->setTitle($dto->postDto->title);
        $post->setContent($dto->postDto->content);

        return $post;
    }

    public function updateByUser(UpdatePostDto $dto): void
    {
        $this->setTitle($dto->postDto->title);
        $this->setContent($dto->postDto->content);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUpdatedAt(): Carbon
    {
        return $this->updated_at;
    }

    public function getCreatedAt(): Carbon
    {
        return $this->created_at;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
