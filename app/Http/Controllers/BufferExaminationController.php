<?php

namespace App\Http\Controllers;

use App\Models\BufferStop;
use App\Models\BufferStopExamination;
use Illuminate\Http\Request;

class BufferExaminationController extends Controller
{
    public function index()
    {
        $buffer_stop = BufferStop::all();
        $buffer_stop_examination = BufferStopExamination::all();
        return view('mainline.mainline_buffer_stop_examination.index', compact(['buffer_stop', 'buffer_stop_examination']));
    }

    public function create()
    {
        $buffer_stop = BufferStop::all();
        return view('mainline.mainline_buffer_stop_examination.create', compact(['buffer_stop']));
    }

    public function store(Request $request)
    {
        dd($request);
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