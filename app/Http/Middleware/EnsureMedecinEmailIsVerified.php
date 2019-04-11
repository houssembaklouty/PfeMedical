<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class EnsureMedecinEmailIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string  $redirectToRoute
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $redirectToRoute = null)
    {
        if (!$request->user('medecin') ||
            ($request->user('medecin') instanceof MustVerifyEmail &&
                !$request->user('medecin')->hasVerifiedEmail())) {
            return $request->expectsJson()
                    ? abort(403, 'Your email address is not verified.')
                    : Redirect::route($redirectToRoute ?: 'medecin.verification.notice');
        }

        return $next($request);
    }
}
