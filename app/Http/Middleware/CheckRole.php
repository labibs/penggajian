<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * harus di regidtrasikan di kernel.php
     * 'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
     * 'checkRole'=> \App\Http\Middleware\CheckRole::class,
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function handle($request, Closure $next,...$roles)
     {
         if(in_array($request->user()->role,$roles)){
         return $next($request);
       }
         return redirect('/');
     }
}
