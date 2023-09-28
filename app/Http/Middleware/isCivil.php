<?php

namespace App\Http\Middleware;

use App\Models\Section;
use Closure;
use Illuminate\Http\Request;

class isCivil
{
    public function handle(Request $request, Closure $next)
    {
        $section = Section::where('name', auth()->user()->section)->first()->id;
        if (($section == 3) or ($section == 4)){
            return $next($request);
        }

        return redirect()->route('transisi');
    }
}
