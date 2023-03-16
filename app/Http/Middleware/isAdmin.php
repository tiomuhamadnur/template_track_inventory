<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdmin
{
    public function handle(Request $request, Closure $next)
    {
        $user_role = auth()->user()->role;
        if ($user_role != 'Admin') {
            return redirect()->route('transisi');
        }

        return $next($request);
    }
}
