<?php

namespace App\Exceptions;

use Exception;
use PDOException;
use App\Http\Controllers\ErrorController;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response
     */
    public function render($request, Exception $exception)
    {
        if (app()->isLocal() && ! anInstanceOf(NotFoundHttpException::class)) {
            return parent::render($request, $exception);
        }

        if ($this->hasDisabledSite()) {
            return ErrorController::maintenance();
        }

        if ($exception instanceof NotFoundHttpException) {
            return ErrorController::unknown();
        }

        if ($exception instanceof PDOException) {
            return ErrorController::database();
        }

        if ($exception instanceof AuthenticationException) {
            return parent::render($request, $exception);
        }

        return parent::render($request, $exception);
    }

    /**
     * See if the site has been disabled by the tenant for maintenance errors.
     *
     * @return bool
     */
    private function hasDisabledSite()
    {
        return settings()->getValue('maintenance_mode');
    }
}
