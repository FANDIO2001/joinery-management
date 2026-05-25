<?php
// -*- coding: utf-8 -*-

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUtf8Encoding
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Ensure UTF-8 encoding for text responses
        if ($response->headers->get('content-type')) {
            if (strpos($response->headers->get('content-type'), 'text/') === 0 || 
                strpos($response->headers->get('content-type'), 'application/json') === 0) {
                $response->headers->set('content-type', $response->headers->get('content-type') . '; charset=utf-8');
            }
        }

        return $response;
    }
}
