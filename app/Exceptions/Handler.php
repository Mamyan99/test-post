<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Throwable;
use Illuminate\Http\Response;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */

    public function render($request, Throwable $exception)
    {
        $httpCode = Response::HTTP_INTERNAL_SERVER_ERROR;
        $statusCode =  $exception->getCode();
        $details = [
            'message' => $exception->getMessage(),
        ];

        if ($exception instanceof ValidationException) {
            $httpCode = Response::HTTP_UNPROCESSABLE_ENTITY;
            $statusCode = Response::HTTP_UNPROCESSABLE_ENTITY;
            $details['message'] = $exception->getMessage();
            foreach ($exception->errors() as $key => $error) {
                $details['errors'][$key] = $error[0] ?? 'Unknown error';
            }
        }


        if ($exception instanceof MethodNotAllowedHttpException) {
            $httpCode = Response::HTTP_METHOD_NOT_ALLOWED;
            $statusCode = Response::HTTP_METHOD_NOT_ALLOWED;
            $details['message'] = 'Method Not Allowed';
        }

        if ($exception instanceof BusinessLogicException) {
            $httpCode = Response::HTTP_INTERNAL_SERVER_ERROR;
            $statusCode = $exception->getStatus();
            $details['message'] = $exception->getStatusMessage();
        }

        $data = [
            'status'  => $statusCode,
            'errors' => $details,
        ];

        if (str_starts_with($httpCode, 5) && !config('app.debug')) {
            $data['errors'] = [
                'message' => 'Server error',
            ];
        }

        return response()->json($data, $httpCode);
    }

    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
