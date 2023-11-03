<?php

namespace App\Http\Middleware;

use App\Models\tideup\License as TideupLicense;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class license
{
    public function handle(Request $request, Closure $next)
    {
        $expired_date = TideupLicense::where('status', 'active')->first()->expired_date;
        $date_now = Carbon::now()->format('Y-m-d');
        if ($date_now > $expired_date) {
            return redirect()->route('login.index')->withLicense($expired_date);
        }

        return $next($request);
    }
}