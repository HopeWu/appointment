<?php

namespace App\Exceptions;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Log\Logger;
use Illuminate\Routing\Router;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Support\Facades\Log;
use Throwable;

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
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        if ($e instanceof TokenMismatchException)
        {
            Log::debug("in Handler's render, first line of the function");
            if (method_exists($e, 'render') && $response = $e->render($request)) {
                return Router::toResponse($request, $response);
            } elseif ($e instanceof Responsable) {
                return $e->toResponse($request);
            }

            Log::debug("in Handler's render, before redirect.");
            return redirect()
                ->back()
                ->withInput($request->except('password'))
                ->with([
                    'message' => 'Page refreshed. Please go on.',
                    'message-type' => 'TokenMismatchException'
                ]);
        }
        return parent::render($request, $e);
    }
}
