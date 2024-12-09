<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyApiKey
{
    public function handle(Request $request, Closure $next)
    {
        $apiKey = $request->header('X-API-KEY');

        if ($apiKey !== config('app.api_key')) {
            return response()->json(['error' => 'Unauthorized: Invalid API Key'], 401);
        }

        return $next($request);
    }
}
