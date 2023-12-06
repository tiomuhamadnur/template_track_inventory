<?php

namespace App\Http\Middleware;

use App\Models\Section;
use Closure;
use Illuminate\Http\Request;

class isTrack
{
    public function handle(Request $request, Closure $next)
    {
        $section = auth()->user()->section_id;
        if (($section == 1) or ($section == 2)){
            return $next($request);
        }

        return redirect()->route('transisi');
    }
}