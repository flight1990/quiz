<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureJsonHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        if (
            $request->header('Accept') !== 'application/json'
        ) {
            return response()->json([
                'message' => 'Invalid Accept header. Expected application/json.',
            ], 406);
        }

        if (
            $request->isMethod('POST') || $request->isMethod('PUT') || $request->isMethod('PATCH')
        ) {
            if ($request->header('Content-Type') !== 'application/json') {
                return response()->json([
                    'message' => 'Invalid Content-Type header. Expected application/json.',
                ], 415);
            }
        }

        return $next($request);
    }
}
