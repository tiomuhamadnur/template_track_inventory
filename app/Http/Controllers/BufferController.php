<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\BufferStop;
use App\Models\Line;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class BufferController extends Controller
{
    public function index()
    {
        $buffer_stop = BufferStop::all();

        return view('masterdata.masterdata_buffer.index', compact(['buffer_stop']));
    }

    public function create()
    {
        $area = Area::all();
        $line = Line::all();

        return view('masterdata.masterdata_buffer.create', compact(['area', 'line']));
    }

    public function store(Request $request)
    {
        BufferStop::create([
            'name' => $request->name,
            'area_id' => $request->area_id,
            'line_id' => $request->line_id,
            'tipe' => $request->tipe,
        ]);

        return redirect()->route('buffer.index')->withNotify('Data berhasil ditambahkan!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        try {
            $secret = Crypt::decryptString($id);
            $buffer_stop = BufferStop::findOrFail($secret);
            if ($buffer_stop) {
                $area = Area::all();
                $line = Line::all();

                return view('masterdata.masterdata_buffer.update', compact(['area', 'line', 'buffer_stop']));
            } else {
                return redirect()->back();
            }
        } catch (DecryptException $e) {
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $buffer_stop = BufferStop::findOrFail($id);
        if ($buffer_stop) {
            $buffer_stop->update([
                'name' => $request->name,
                'area_id' => $request->area_id,
                'line_id' => $request->line_id,
                'tipe' => $request->tipe,
            ]);

            return redirect()->route('buffer.index')->withNotify('Data berhasil diubah!');
        } else {
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $buffer_stop = BufferStop::findOrFail($id);
        if ($buffer_stop) {
            $buffer_stop->delete();

            return redirect()->route('buffer.index')->withNotify('Data berhasil dihapus!');
        } else {
            return redirect()->back();
        }
    }
}
