<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // RoleMiddleware.php
    // RoleMiddleware.php
    public function handle($request, Closure $next)
    {
            if (auth()->user()->employee) {
                return $next($request);
            } 

            abort(401);

        
    }


    }
