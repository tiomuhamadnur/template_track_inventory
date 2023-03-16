<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PegawaiController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
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

    public function dummy_user()
    {
        Pegawai::insert([
            [
                'name' => 'Dede Irfan',
                'email' => 'idede@jakartamrt.co.id',
                'email_verified_at' => now(),
                'password' => Hash::make('user123'),
                'gender' => 'male',
                'active' => 1,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Muhammad Dani Taufiq',
                'email' => 'tdani@jakartamrt.co.id',
                'email_verified_at' => now(),
                'password' => Hash::make('user123'),
                'gender' => 'male',
                'active' => 1,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        return back();
    }
}
