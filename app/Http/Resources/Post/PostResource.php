<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
          'id' => $this->resource->getId(),
          'title' => $this->resource->getTitle(),
          'content' => $this->resource->getContent(),
          'created_at' => $this->resource->getCreatedAt(),
            'updated_at' => $this->resource->getUpdatedAt(),
        ];
    }
}
