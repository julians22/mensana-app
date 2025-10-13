<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class RemoveTrailingSlashMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the request URI has a trailing slash and is not just "/"
        if (preg_match('/.+\/$/', $request->getRequestUri())) {
            $url = rtrim($request->getRequestUri(), '/');

            return redirect($url, 301);
        }

        return $next($request);
    }
}
