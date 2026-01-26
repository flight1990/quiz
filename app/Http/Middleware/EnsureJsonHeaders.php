<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureJsonHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        /**
         * Accept: должен уметь принимать JSON
         */
        if (
            !$request->acceptsJson()
        ) {
            return response()->json([
                'message' => 'Invalid Accept header. Expected application/json.',
            ], 406);
        }

        /**
         * Content-Type: проверяем ТОЛЬКО если есть body
         */
        if (
            in_array($request->method(), ['POST', 'PUT', 'PATCH'], true)
        ) {
            $hasBody = trim($request->getContent()) !== '';

            if ($hasBody && !$request->isJson()) {
                return response()->json([
                    'message' => 'Invalid Content-Type header. Expected application/json.',
                ], 415);
            }
        }

        return $next($request);
    }
}
