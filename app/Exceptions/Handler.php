<?php

namespace App\Exceptions;

use App\Models\Error;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
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

    public function render($request, Throwable $exception)
    {
        if ($request->wantsJson() || $request->getContentType() == "json")
        {
            $exception = $this->prepareException($exception);

            if ($exception instanceof ValidationException)
            {
                $code       = 422;
                $messages   = Error::error("Validation error", $exception->errors());
            }
            else if ($exception instanceof NotFoundHttpException)
            {
                $code       = 404;
                $messages   = Error::error( "Not found" , ['route / data not found']);
            }
            else
            {
                $code       = method_exists($exception , "getStatusCode") ? $exception->getStatusCode() : 500 ;

                if ($code == 406)
                {
                    $messages = Error::error("Invalid data", ["This data is not found"]);
                }
                else if ($code == 401)
                {
                    $messages = Error::error("UnAuthorization", [$exception->getMessage()]);
                }
                else if($code == 403)
                {
                    $messages = Error::error("Access denied", [$exception->getMessage()]);
                }
                else if ($code == 500)
                {

                    $messages = Error::error("Server error" ,[$exception->getMessage() , $exception->getTrace()]);
                }
                else
                {
                    $messages = Error::error("Error", [$exception->getMessage()]);
                }
            }

            return response_as_json( $messages, $code );

        }
        return parent::render($request, $exception);
    }

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
