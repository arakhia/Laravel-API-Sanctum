<?php


namespace App\Http\Middleware;

use Illuminate\Auth\AuthenticationException;
use Laravel\Sanctum\Exceptions\MissingAbilityException;

/**
 * This is a modified version from Sanctum ChackAbilities
 * [ use Laravel\Sanctum\Http\Middleware\CheckAbilities ]
 * 
 */

class CheckAbilities {

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  ...$abilities
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Auth\AuthenticationException|\Laravel\Sanctum\Exceptions\MissingAbilityException
     */
    public function handle($request, $next, ...$abilities)
    {
        if (! $request->user() || ! $request->user()->currentAccessToken()) {
            throw new AuthenticationException;
        }

        foreach ($abilities as $ability) {
            if (! $request->user()->tokenCan($ability)) { 
                return response()->json([
                    "message" => "Unauthorized",
                    "code" => 401
                ]);
            }
        }

        return $next($request);
    }

}