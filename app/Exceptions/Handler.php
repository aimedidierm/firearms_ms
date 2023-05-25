<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Http\Response;

class Handler extends ExceptionHandler
{
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof PostTooLargeException) {
            return response()->json(['error' => 'The file you uploaded is too large.'], Response::HTTP_REQUEST_ENTITY_TOO_LARGE);
        }

        return parent::render($request, $exception);
    }
}
