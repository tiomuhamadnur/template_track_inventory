<?php

namespace App\Http\Controllers;

use App\Models\PM;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PMController extends Controller
{
    public function index()
    {
        $pm = PM::all();

        return view('masterdata.masterdata_pm.index', compact(['pm']));
    }

    public function create()
    {
        return view('masterdata.masterdata_pm.create');
    }

    public function store(Request $request)
    {
        PM::create([
            'name' => $request->name,
            'item' => $request->item,
            'detail' => $request->detail,
            'frekuensi' => $request->frekuensi,
        ]);

        return redirect()->route('pm.index')->withNotify('Data berhasil ditambahkan!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        try {
            $secret = Crypt::decryptString($id);
            $pm = PM::findOrFail($secret);
            if ($pm) {
                return view('masterdata.masterdata_pm.update', compact(['pm']));
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
        $pm = PM::findOrFail($id);
        if ($pm) {
            $pm->update([
                'name' => $request->name,
                'item' => $request->item,
                'detail' => $request->detail,
                'frekuensi' => $request->frekuensi,
            ]);

            return redirect()->route('pm.index')->withNotify('Data berhasil diubah!');
        } else {
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $pm = PM::findOrFail($id);
        if ($pm) {
            $pm->delete();

            return redirect()->route('pm.index')->withNotify('Data berhasil dihapus!');
        } else {
            return redirect()->back();
        }
    }
}
