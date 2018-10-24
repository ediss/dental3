<?php
namespace App\Exceptions;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Session;
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
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
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
       /* $route      =   '';
        $message    =   '';

        if ($exception instanceof \PDOException) {
            $error_message  =   $exception->getMessage();

            if (strpos($error_message, 'appoitments_date_appoitment_doctor_id_term_id_unique') !== false) {
                $route      =   'doktor.pregledi';
                $message    =   Session::flash('error', 'Termin je vec zauzet');
            }
        } else {
            //$route      =   'greska';
            //$message    =   'nepoznata greska';
            return redirect()->route($route, [$message]);

        }*/

       // return redirect()->route($route, [$message]);

         return parent::render($request, $exception);
    }


    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        $guard = array_get($exception->guards(), 0);
        switch ($guard) {
          case 'admin':
            $login = 'admin.login';
            break;
          default:
            $login = 'login';
            break;
        }
        return redirect()->guest(route($login));
    }
}