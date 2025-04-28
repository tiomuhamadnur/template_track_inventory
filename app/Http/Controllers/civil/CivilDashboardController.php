<?php

namespace App\Http\Controllers\civil;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CivilDashboardController extends Controller
{
    public function masterdata()
    {
        return view('civil.masterdata.masterdata_dashboard.index');
    }

    public function activity()
    {
        return view('civil.examination.examination_dashboard.index');
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
