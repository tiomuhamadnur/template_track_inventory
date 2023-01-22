<?php

namespace Database\Seeders;

use App\Models\Line;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LineSeeder extends Seeder
{
    public function run()
    {
        Line::insert([
            [
                'id' => '1',
                'name' => 'Up Track',
                'code' => 'UT',
                'area' => 'Mainline',
            ],
            [
                'id' => '2',
                'name' => 'Down Track',
                'code' => 'DT',
                'area' => 'Mainline',
            ],
            [
                'id' => '3',
                'name' => 'Middle Track',
                'code' => 'MT',
                'area' => 'Mainline',
            ],
            [
                'id' => '4',
                'name' => 'Depo Access Line',
                'code' => 'DAL',
                'area' => 'DAL',
            ],
            [
                'id' => '5',
                'name' => 'Turn Back',
                'code' => 'TB',
                'area' => 'DAL',
            ],
            [
                'id' => '6',
                'name' => 'Lead Track',
                'code' => 'LT',
                'area' => 'Depo',
            ],
        ]);
    }
}