<?php

namespace Database\Seeders;

use App\Models\Part;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartSeeder extends Seeder
{
    public function run()
    {
        Part::insert([
            [
                'name' => 'Expansion Rail Joint (EJ)',
            ],
            [
                'name' => 'Fastening (Penambat)',
            ],
            [
                'name' => 'Glued Insulated Joint (GIJ)',
            ],
            [
                'name' => 'Guard Rail/Gongsol',
            ],
            [
                'name' => 'Insulated Rail Joint (IRJ)',
            ],
            [
                'name' => 'Normal Joint (NJ)',
            ],
            [
                'name' => 'Rail',
            ],
            [
                'name' => 'Scissor Crossing',
            ],
            [
                'name' => 'Sleeper',
            ],
            [
                'name' => 'Track Bed',
            ],
            [
                'name' => 'Turn Out',
            ],
            [
                'name' => 'Welding Joint',
            ],
            [
                'name' => 'Wheel Stop/Buffer Stop',
            ],
        ]);
    }
}