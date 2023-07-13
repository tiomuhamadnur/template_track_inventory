<?php

namespace App\Http\Controllers;

use App\Models\PM;
use App\Models\Section;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PMController extends Controller
{
    public function index()
    {
        $pm = PM::orderBy('section', 'ASC')->get();

        return view('masterdata.masterdata_pm.index', compact(['pm']));
    }

    public function create()
    {
        $section = Section::all();
        return view('masterdata.masterdata_pm.create', compact(['section']));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'logo' => ['file', 'image'],
        ], [
            'logo.image' => 'File harus dalam format gambar/photo!',
        ]);

        if ($request->hasFile('logo') && $request->logo != '') {
            $logo = $request->file('logo')->store('pm/logo');

            PM::create([
                'name' => $request->name,
                'section' => $request->section,
                'item' => $request->item,
                'detail' => $request->detail,
                'frekuensi' => $request->frekuensi,
                'logo' => $logo,
            ]);

            return redirect()->route('pm.index')->withNotify('Data berhasil ditambahkan!');
        } else {
            PM::create([
                'name' => $request->name,
                'section' => $request->section,
                'item' => $request->item,
                'detail' => $request->detail,
                'frekuensi' => $request->frekuensi,
            ]);

            return redirect()->route('pm.index')->withNotify('Data berhasil ditambahkan!');
        }
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
            $section = Section::all();
            if ($pm) {
                return view('masterdata.masterdata_pm.update', compact(['pm', 'section']));
            } else {
                return redirect()->back();
            }
        } catch (DecryptException $e) {
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        // dd($request);

        $this->validate($request, [
            'logo' => ['file', 'image'],
        ], [
            'logo.image' => 'File harus dalam format gambar/photo!',
        ]);

        $id = $request->id;
        $pm = PM::findOrFail($id);
        if ($pm) {
            if ($request->hasFile('logo') && $request->logo != '') {
                $logo = $request->file('logo')->store('pm/logo');

                $pm->update([
                    'name' => $request->name,
                    'section' => $request->section,
                    'item' => $request->item,
                    'detail' => $request->detail,
                    'frekuensi' => $request->frekuensi,
                    'logo' => $logo,
                ]);

                return redirect()->route('pm.index')->withNotify('Data berhasil diubah!');
            } else {
                $pm->update([
                    'name' => $request->name,
                    'section' => $request->section,
                    'item' => $request->item,
                    'detail' => $request->detail,
                    'frekuensi' => $request->frekuensi,
                ]);

                return redirect()->route('pm.index')->withNotify('Data berhasil diubah!');
            }
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
