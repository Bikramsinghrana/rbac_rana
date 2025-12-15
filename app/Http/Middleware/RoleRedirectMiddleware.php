<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleRedirectMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (! $user) {
            return redirect()->route('login');
        }

        // Redirect only when accessing dashboard
        if ($request->routeIs('dashboard')) {

            if ($user->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            }

            if ($user->hasRole('project-manager')) {
                return redirect()->route('projects.dashboard');
            }

            return redirect()->route('users.index');
        }

        return $next($request);
    }
}
