<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    public function run()
    {
        Area::insert([
        [
            'name' => 'Depo',
            'code' => 'Depo',
            'area' => 'Depo',
            'stasiun' => 'false',
        ],
        [
            'name' => 'Depo Access Line-Lebak Bulus',
            'code' => 'DAL-LBB',
            'area' => 'DAL',
            'stasiun' => 'false',
        ],
        [
            'name' => 'Stasiun Lebak Bulus',
            'code' => 'LBBS',
            'area' => 'Mainline',
            'stasiun' => 'true',
        ],
        [
            'name' => 'Lebak Bulus-Fatmawati',
            'code' => 'LBB-FTM',
            'area' => 'Mainline',
            'stasiun' => 'false',
        ],
        [
            'name' => 'Stasiun Fatmawati',
            'code' => 'FTMS',
            'area' => 'Mainline',
            'stasiun' => 'true',
        ],
        [
            'name' => 'Fatmawati-Cipete Raya',
            'code' => 'FTM-CPR',
            'area' => 'Mainline',
            'stasiun' => 'false',
        ],
        [
            'name' => 'Stasiun Cipete Raya',
            'code' => 'CPRS',
            'area' => 'Mainline',
            'stasiun' => 'true',
        ],
        [
            'name' => 'Cipete Raya-Haji Nawi',
            'code' => 'CPR-HJN',
            'area' => 'Mainline',
            'stasiun' => 'false',
        ],
        [
            'name' => 'Stasiun Haji Nawi',
            'code' => 'HJNS',
            'area' => 'Mainline',
            'stasiun' => 'true',
        ],
        [
            'name' => 'Haji Nawi-Blok A',
            'code' => 'HJN-BLA',
            'area' => 'Mainline',
            'stasiun' => 'false',
        ],
        [
            'name' => 'Stasiun Blok A',
            'code' => 'BLAS',
            'area' => 'Mainline',
            'stasiun' => 'true',
        ],
        [
            'name' => 'Blok A-Blok M',
            'code' => 'BLA-BLM',
            'area' => 'Mainline',
            'stasiun' => 'false',
        ],
        [
            'name' => 'Stasiun Blok M',
            'code' => 'BLMS',
            'area' => 'Mainline',
            'stasiun' => 'true',
        ],
        [
            'name' => 'Blok M-Asean',
            'code' => 'BLM-ASN',
            'area' => 'Mainline',
            'stasiun' => 'false',
        ],
        [
            'name' => 'Stasiun Asean',
            'code' => 'ASNS',
            'area' => 'Mainline',
            'stasiun' => 'true',
        ],
        [
            'name' => 'Asean-Senayan',
            'code' => 'ASN-SNY',
            'area' => 'Mainline',
            'stasiun' => 'false',
        ],
        [
            'name' => 'Stasiun Senayan',
            'code' => 'SNYS',
            'area' => 'Mainline',
            'stasiun' => 'true',
        ],
        [
            'name' => 'Senayan-Istora',
            'code' => 'SNY-IST',
            'area' => 'Mainline',
            'stasiun' => 'false',
        ],
        [
            'name' => 'Stasiun Istora',
            'code' => 'ISTS',
            'area' => 'Mainline',
            'stasiun' => 'true',
        ],
        [
            'name' => 'Istora-Bendungan Hilir',
            'code' => 'IST-BNH',
            'area' => 'Mainline',
            'stasiun' => 'false',
        ],
        [
            'name' => 'Stasiun Bendungan Hilir',
            'code' => 'BNHS',
            'area' => 'Mainline',
            'stasiun' => 'true',
        ],
        [
            'name' => 'Bendungan Hilir-Setiabudi',
            'code' => 'BNH-STB',
            'area' => 'Mainline',
            'stasiun' => 'false',
        ],
        [
            'name' => 'Stasiun Setiabudi',
            'code' => 'STBS',
            'area' => 'Mainline',
            'stasiun' => 'true',
        ],
        [
            'name' => 'Setiabudi-Dukuh Atas',
            'code' => 'STB-DKA',
            'area' => 'Mainline',
            'stasiun' => 'false',
        ],
        [
            'name' => 'Stasiun Dukuh Atas',
            'code' => 'DKAS',
            'area' => 'Mainline',
            'stasiun' => 'true',
        ],
        [
            'name' => 'Dukuh Atas-Bundaran HI',
            'code' => 'DKA-BHI',
            'area' => 'Mainline',
            'stasiun' => 'false',
        ],
        [
            'name' => 'Stasiun Bundaran HI',
            'code' => 'BHIS',
            'area' => 'Mainline',
            'stasiun' => 'true',
        ],
    ]);
    }
}