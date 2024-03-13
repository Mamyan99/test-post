<?php

namespace App\Http\Requests\Base;

use Illuminate\Foundation\Http\FormRequest;

class SingleRequest extends FormRequest
{
    const ID = 'id';

    public function authorize(): bool
    {
        return true;
    }

    public function getId(): int
    {
        return $this->route(self::ID);
    }
}
