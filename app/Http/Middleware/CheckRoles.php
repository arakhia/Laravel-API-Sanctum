<?php


namespace App\Http\Middleware;

use Illuminate\Auth\AuthenticationException;
use Laravel\Sanctum\Exceptions\MissingAbilityException;



class CheckRoles {

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  ...$roles
     * @return \Illuminate\Http\Response
     */
    public function handle($request, $next, ...$roles)
    {
        if (!$request->user()) {
            // Or Redirect Login
            return response()->json([
                "message" => "Unauthorized",
                "code" => 401
            ]);
        }

        $roles = isset($roles) ? $roles : null;

        if(isset($roles)){
            if($request->user()->hasAccess('Admin') || $request->user()->hasAccess($roles)){
                return $next($request);
            }
        }
        
        return response()->json([
            "message" => "Unauthorized",
            "code" => 401
        ]);
    }

}