<?php

namespace App\Http\Controllers\planning;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlanningDashboardController extends Controller
{
    public function activity()
    {
        return view('planning.content.content_dashboard.index');
    }

    public function masterdata()
    {
        return view('planning.masterdata.masterdata_dashboard.index');
    }
}
