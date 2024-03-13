<?php

namespace App\Http\Requests\Base;

use Illuminate\Foundation\Http\FormRequest;

class BaseListRequest extends FormRequest
{
    const PER_PAGE_DEFAULT = 10;
    const PAGE_DEFAULT = 1;
    const MAX_PER_PAGE = 100;

    const PER_PAGE = 'perPage';
    const PAGE = 'page';

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            self::PER_PAGE => [
                'integer',
                'max:' . self::MAX_PER_PAGE,
            ],
            self::PAGE => [
                'integer',
                'nullable',
            ],
        ];
    }

    public function getPage(): int
    {
        return $this->get(self::PAGE) ?? self::PAGE_DEFAULT;
    }

    public function getPerPage(): int
    {
        return $this->get(self::PER_PAGE) ?? self::PER_PAGE_DEFAULT;
    }
}
