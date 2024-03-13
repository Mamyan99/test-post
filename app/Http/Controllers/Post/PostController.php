<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\DeletePostRequest;
use App\Http\Requests\Post\GetPostRequest;
use App\Http\Requests\Post\IndexPostsRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Services\Post\Action\CreatePostAction;
use App\Services\Post\Action\DeletePostAction;
use App\Services\Post\Action\GetPostAction;
use App\Services\Post\Action\IndexPostsAction;
use App\Services\Post\Action\UpdatePostAction;
use App\Services\Post\Dto\CreatePostDto;
use App\Services\Post\Dto\IndexPostsDto;
use App\Services\Post\Dto\UpdatePostDto;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class PostController extends Controller
{
    public function store(
        CreatePostRequest $request,
        CreatePostAction $action
    ): JsonResponse {
        $dto = CreatePostDto::fromRequest($request);
        $post = $action->run($dto);

        return $this->response($post->toArray($request), Response::HTTP_CREATED);
    }

    public function index(
        IndexPostsRequest $request,
        IndexPostsAction $action
    ): AnonymousResourceCollection {
        $dto = IndexPostsDto::fromRequest($request);

        return $action->run($dto);
    }

    public function update(
        UpdatePostRequest $request,
        UpdatePostAction $action
    ): JsonResponse {
      $dto = UpdatePostDto::fromRequest($request);
      $post = $action->run($dto);

      return $this->response($post->toArray($request));
    }

    public function get(
        GetPostRequest $request,
        GetPostAction $action
    ): JsonResponse {
        $post = $action->run($request->getId());

        return $this->response($post->toArray($request));
    }

    public function delete(
        DeletePostRequest $request,
        DeletePostAction $action
    ): JsonResponse {
        $action->run($request->getId());
        return $this->response([], Response::HTTP_NO_CONTENT);
    }
}