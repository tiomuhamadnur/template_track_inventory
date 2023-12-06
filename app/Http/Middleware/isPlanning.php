<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Section;
use Illuminate\Http\Request;

class isPlanning
{

    public function handle(Request $request, Closure $next)
    {
        $section = auth()->user()->section_id;
        if (($section == 5)){
            return $next($request);
        }
        return redirect()->route('transisi');
    }
}