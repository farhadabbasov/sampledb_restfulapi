<?php

namespace App\Http\Middleware\Api;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

class TimeLine
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $currentTime = Carbon::now();


        $startHour = config('timeline.working_hours.start');
        $endHour = config('timeline.working_hours.end');

        if(!($startHour<$currentTime->hour && $currentTime->hour < $endHour)){
            return response()->json([
                'error' => 'Service is only available from ' . $startHour . ':00 AM to ' . $endHour . ':00 PM.'
            ], 500);
        }

        return $next($request);
    }
}
