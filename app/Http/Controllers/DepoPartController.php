<?php

namespace App\Http\Controllers;

use App\Models\Part;
use Illuminate\Http\Request;

class DepoPartController extends Controller
{
    public function index()
    {
        $part = Part::all();
        return view('depo.depo_part.index', compact(['part']));
    }

    public function create()
    {
        return view('depo.depo_part.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}