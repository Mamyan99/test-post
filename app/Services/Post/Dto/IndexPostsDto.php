<?php

namespace App\Services\Post\Dto;

use App\Http\Requests\Post\IndexPostsRequest;
use App\Services\Base\Dto\PaginationParamsDto;
use Spatie\DataTransferObject\DataTransferObject;

class IndexPostsDto extends DataTransferObject
{
    public PaginationParamsDto $pagination;

    public static function fromRequest(IndexPostsRequest $request)
    {
        return new self(
            pagination: new PaginationParamsDto(
                page: $request->getPage(),
                perPage: $request->getPerPage(),
            ),
        );
    }
}