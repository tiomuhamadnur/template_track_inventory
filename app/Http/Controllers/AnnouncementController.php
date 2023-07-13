<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        // $now = Carbon::now();
        // $tahun = $now->format('Y');
        // $bulan = $now->format('m');
        // $announcement = Announcement::whereYear('start', $tahun)->whereMonth('start', $bulan)->get();
        $announcement = Announcement::all();
        return view('jadwal_pekerjaan.announcement.index', compact(['announcement']));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'photo' => ['file', 'image'],
        ], [
            'photo.image' => 'File harus dalam format gambar/photo!',
        ]);

        if ($request->hasFile('photo') && $request->photo != '') {
            $photo = $request->file('photo')->store('announcement/photo');

            Announcement::create([
                'user_id' => $request->user_id,
                'title' => $request->title,
                'content' => $request->content,
                'start' => $request->start,
                'end' => $request->end ?? $request->start,
                'photo' => $photo,
            ]);

            return redirect()->route('announcement.index')->withNotify('Data berhasil ditambahkan!');
        } else {
            Announcement::create([
                'user_id' => $request->user_id,
                'title' => $request->title,
                'content' => $request->content,
                'start' => $request->start,
                'end' => $request->end ?? $request->start,
            ]);

            return redirect()->route('announcement.index')->withNotify('Data berhasil ditambahkan!');
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
        $announcement = Announcement::findOrFail($id);
        if (!$announcement) {
            return redirect()->back();
        }
        $announcement->delete();

        return redirect()->route('announcement.index')->withNotify('Data berhasil dihapus!');
    }
}