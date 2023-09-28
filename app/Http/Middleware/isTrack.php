<?php

namespace App\Http\Middleware;

use App\Models\Section;
use Closure;
use Illuminate\Http\Request;

class isTrack
{
    public function handle(Request $request, Closure $next)
    {
        $section = Section::where('name', auth()->user()->section)->first()->id;
        if (($section == 1) or ($section == 2)){
            return $next($request);
        }

        return redirect()->route('transisi');
    }
}
