<?php

namespace Database\Seeders;

use App\Models\Rekening;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RekeningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rekenings = [
            [
                'nama_rekening' => 'PT Nomads ID',
                'nomor_rekening' => '0881 8829 8800',
                'nama_bank' => 'Bank Central Asia'
            ],
            [
                'nama_rekening' => 'PT Nomads ID',
                'nomor_rekening' => '0899 8501 7888',
                'nama_bank' => 'Bank HSBC'
            ]
        ];

        foreach ($rekenings as $rekening) {
            Rekening::create($rekening);
        }
    }
}
