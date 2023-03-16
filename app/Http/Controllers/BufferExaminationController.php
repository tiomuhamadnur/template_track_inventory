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
        $this->validate($request, [
            'photo' => ['image', 'required'],
        ], [
            'photo.image' => 'File harus dalam format gambar/photo!',
        ]);

        if ($request->hasFile('photo') && $request->photo != '') {
            $photo_kegiatan = $request->file('photo')->store('photo_kegiatan/buffer_stop_examination');
            BufferStopExamination::create([
                'buffer_stop_id' => $request->buffer_stop_id,
                'pic' => $request->pic,
                'tanggal' => $request->tanggal,
                'visual' => $request->visual,
                'visual_remark' => $request->visual_remark,
                'quantity' => $request->quantity,
                'quantity_remark' => $request->quantity_remark,
                'position' => $request->position,
                'position_remark' => $request->position_remark,
                'torque' => $request->torque,
                'torque_remark' => $request->torque_remark,
                'remark' => $request->remark,
                'photo' => $photo_kegiatan,
            ]);

            return redirect()->route('buffer.examination.index')->withNotify('Data Buffer/Wheel Stop Examination berhasil ditambahkan!');
        } else {
            return redirect()->back();
        }
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

    public function destroy(Request $request)
    {
        $id = $request->id;
        $buffer_stop_examination = BufferStopExamination::findOrFail($id);
        if ($buffer_stop_examination) {
            $buffer_stop_examination->delete();

            return redirect()->route('buffer.examination.index')->withNotify('Data Buffer/Wheel Stop Examination berhasil dihapus!');
        } else {
            return redirect()->back();
        }
    }
}
