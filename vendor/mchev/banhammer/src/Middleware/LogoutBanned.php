<?php

namespace Mchev\Banhammer\Middleware;

use Closure;
use Mchev\Banhammer\IP;
use Symfony\Component\HttpFoundation\Response;

class LogoutBanned
{
    public function handle($request, Closure $next): Response
    {
        if ($request->user() && $request->user()->isBanned()
            || $request->ip() && in_array($request->ip(), IP::getBannedIPsFromCache())) {
            if ($request->user()) {
                auth()->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
            }

            return (config('ban.fallback_url'))
                ? redirect(config('ban.fallback_url'))
                : abort(403, config('ban.message'));
        }

        return $next($request);
    }
}
