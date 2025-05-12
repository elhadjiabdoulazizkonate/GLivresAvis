<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
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
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Exception $e) {
            //
        });

        // Personnalisation de la gestion des erreurs 404
        $this->renderable(function (NotFoundHttpException $e, $request) {
            // Vérifie si la requête est une API ou une vue web
            if ($request->wantsJson()) {
                return Response::json(['message' => 'Page non trouvée'], 404);
            }

            // Retourne la vue personnalisée pour les erreurs 404
            return response()->view('errors.404', [], 404);
        });
    }
}
