<?php

namespace App\Exceptions;

# ログインページ以外にリダイレクト用
use Illuminate\Auth\AuthenticationException;

use Illuminate\Session\TokenMismatchException;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        //ログインタイムアウト後のPOSTでログインページに遷移 (page expired を防ぐ)
        if ($exception instanceof TokenMismatchException) {
            return redirect('/login');
        }

        return parent::render($request, $exception);
    }

    # URLのみを打ち込んだ際のリダイレクト先を設定
    public function unauthenticated($request, AuthenticationException $exception)
    {
        return redirect()->guest(route('weithts.first'));
    }
}
