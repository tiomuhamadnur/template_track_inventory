<?php

namespace Database\Seeders;

use App\Models\Defect;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefectSeeder extends Seeder
{
    public function run()
    {
        Defect::insert([
            [
                'name' => 'AVS Keluar',
            ],
            [
                'name' => 'Corrugation',
            ],
            [
                'name' => 'Crack',
            ],
            [
                'name' => 'Deformasi',
            ],
            [
                'name' => 'Kendur',
            ],
            [
                'name' => 'Keropos',
            ],
            [
                'name' => 'Lepas',
            ],
            [
                'name' => 'Misalignment',
            ],
            [
                'name' => 'Out of Tolerance',
            ],
            [
                'name' => 'Pecah',
            ],
            [
                'name' => 'Putus',
            ],
            [
                'name' => 'Rebar Expose',
            ],
            [
                'name' => 'Roughness',
            ],
            [
                'name' => 'Serabut',
            ],
            [
                'name' => 'Spall',
            ],
            [
                'name' => 'Tidak Lengkap',
            ],
            [
                'name' => 'Crack < 0.3mm',
            ],
            [
                'name' => 'Crack >= 0.3mm',
            ],
        ]);
    }
}