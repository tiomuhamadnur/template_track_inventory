<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isUser
{
    public function handle(Request $request, Closure $next)
    {
        $user_role = auth()->user()->role;
        if ($user_role == 'User') {
            return redirect()->route('transisi.user');
        }

        return $next($request);
    }
}