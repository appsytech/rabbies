<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Ensure2faVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if (!$user->google2fa_enabled) {

            Auth::logout();

            return redirect()->route('login')
                ->withErrors('Administrator account is not available. Please contact the system owner or manager.');
        }

        if (!session()->get('2fa_passed', false)) {
            return redirect()->route('google.2fa.verify.form');
        }
        return $next($request);
    }
}
