<?php

namespace App\Http\Middleware\Api;

use App\Exceptions\CustomUnAuthorizedException;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

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
//
        throw  new CustomUnAuthorizedException("Wrong key!");
        // throw new UnauthorizedException("Invalid API Secret Key");
     }

        return $next($request);
    }
}
