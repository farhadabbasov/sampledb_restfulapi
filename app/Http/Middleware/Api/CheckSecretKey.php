<?php

namespace App\Http\Middleware\Api;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSecretKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $secretKey = $request->header('SECRET_KEY');


     if ($secretKey !== config("credentials.api_secret_key")) {
         return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
     }


        return $next($request);
    }
}
