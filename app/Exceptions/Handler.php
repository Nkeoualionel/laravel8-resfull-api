<?php

namespace App\Exceptions;

use App\Traits\ApiResponser;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    use ApiResponser;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
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
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (NotFoundHttpException $e) {
            //
            return response()->json(['message' => 'Not Found', 'code' => '404'], 404);
        });

    }


    protected function unauthenticated($request, AuthenticationException $exception) {
        return $this->error('User not authenticated', 401);
    }


    protected function convertValidationExceptionToResponse(ValidationException $e, $request) {
        if ($e->response) {
                return $e->response;
        }

        return $request->expectsJson() ? $this->invalidJson($request, $e) : $this->invalid($request, $e);
    }
}
