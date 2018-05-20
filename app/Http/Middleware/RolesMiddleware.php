<?php

namespace App\Http\Middleware;

use Closure;

class RolesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $permission = null)
    {
        if (!$request->user()->hasRole($role)) {
            return redirect()->back()->withError('You dont have right permission to access this pages');
        }

        if ($permission !== null && !$request->user()->can($permission)) {
            return redirect()->back()->withError('You dont have right permission to access this pages');
        }

        return $next($request);
    }
}
