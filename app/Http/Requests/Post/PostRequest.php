<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    const TITLE = 'title';
    const CONTENT = 'content';

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            self::TITLE  => [
                'required',
                'string',
            ],
            self::CONTENT  => [
                'required',
                'string',
            ],
        ];
    }

    public function getTitle(): string
    {
        return $this->get(self::TITLE);
    }

    public function getPostContent(): string
    {
        return $this->get(self::CONTENT);
    }
}
