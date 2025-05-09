<?php

namespace App\Http\Middleware;

use App\classes\AntiXssAdapter;
use Closure;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            JWTAuth::parseToken()->authenticate();

        } catch(TokenExpiredException $e) {
            Log::warning('TokenExpiredException: ' . $e->getMessage());
            return response(['erro' => 'Token expirado' ,'msg' => $e->getMessage()] , 401);

        } catch(TokenInvalidException $e) {
            Log::warning('TokenInvalidException: ' . $e->getMessage());
            return response(['erro' => 'Token inválido' ,'msg' => $e->getMessage()] , 401);
        } catch (JWTException $e) {
            Log::warning('JWTException: ' . $e->getMessage());
        //    Log::channel('telegram')->error('JWTException: ' . $e-d>getMessage());
            return response(['erro' => 'Token inválido' ,'msg' => $e->getMessage()] , 401);
        }
        return $next($request);
    }
}

