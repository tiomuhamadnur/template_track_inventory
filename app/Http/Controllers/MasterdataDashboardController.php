<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterdataDashboardController extends Controller
{

    public function index()
    {
        return view('masterdata.masterdata_dashboard.index');
    }

    public function create()
    {
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