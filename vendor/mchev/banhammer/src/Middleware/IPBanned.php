<?php

namespace Mchev\Banhammer\Middleware;

use Closure;
use Mchev\Banhammer\IP;
use Symfony\Component\HttpFoundation\Response;

class IPBanned
{
    public function handle($request, Closure $next): Response
    {
        if ($request->ip() && in_array($request->ip(), IP::getBannedIPsFromCache())) {
            return (config('ban.fallback_url'))
                ? redirect(config('ban.fallback_url'))
                : abort(403, config('ban.message'));
        }

        return $next($request);
    }
}
