<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ColorSchemeController extends Controller
{
    /**
     * Show specified view.
     *
     * @return \Illuminate\Http\Response
     */
    public function switch(Request $request)
    {
        session([
            'color_scheme' => $request->color_scheme,
        ]);

        return back();
    }
}
