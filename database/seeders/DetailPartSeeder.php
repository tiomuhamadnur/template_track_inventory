<?php

namespace Database\Seeders;

use App\Models\DetailPart;
use Illuminate\Database\Seeder;

class DetailPartSeeder extends Seeder
{
    public function run()
    {
        DetailPart::insert([
            [
                'name' => 'Accessories',
            ],
            [
                'name' => 'Bantalan Kayu',
            ],
            [
                'name' => 'Besi U',
            ],
            [
                'name' => 'Bolt (M-20 atau 32mm)',
            ],
            [
                'name' => 'Bolts',
            ],
            [
                'name' => 'Bolts 41mm',
            ],
            [
                'name' => 'Bushing',
            ],
            [
                'name' => 'Crossing',
            ],
            [
                'name' => 'Clip',
            ],
            [
                'name' => 'Fiber Plates',
            ],
            [
                'name' => 'Fishplates',
            ],
            [
                'name' => 'Gap',
            ],
            [
                'name' => 'Guard Rail',
            ],
            [
                'name' => 'Hook',
            ],
            [
                'name' => 'Insulator',
            ],
            [
                'name' => 'Key Crossing/Knuckle Rail',
            ],
            [
                'name' => 'Rail',
            ],
            [
                'name' => 'Rail Bonding',
            ],
            [
                'name' => 'Rail Pad',
            ],
            [
                'name' => 'Resin Clip/Insulator',
            ],
            [
                'name' => 'Rubber/AVS',
            ],
            [
                'name' => 'Running Rail',
            ],
            [
                'name' => 'Shoulder',
            ],
            [
                'name' => 'Sleeper (FFU)',
            ],
            [
                'name' => 'Sleeper PC-A',
            ],
            [
                'name' => 'Sleeper PC-B',
            ],
            [
                'name' => 'Sleeper TNA',
            ],
            [
                'name' => 'Sleeper TNB',
            ],
            [
                'name' => 'Stock Rail',
            ],
            [
                'name' => 'Tongue Rail',
            ],
            [
                'name' => 'Track Bed',
            ],
            [
                'name' => 'Welding',
            ],
        ]);
    }
}
