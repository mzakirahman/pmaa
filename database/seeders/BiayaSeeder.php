<?php

namespace Database\Seeders;

use App\Models\MasterData\Biaya;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BiayaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $biaya = [
            [
                'nama'      => 'Biaya 1',
                'jumlah'      => '100000',
                'jenis_biaya'      => 'Jenis Biaya 1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama'      => 'Biaya 2',
                'jumlah'      => '200000',
                'jenis_biaya'      => 'Jenis Biaya 2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama'      => 'Biaya 3',
                'jumlah'      => '300000',
                'jenis_biaya'      => 'Jenis Biaya 3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        Biaya::insert($biaya);
    }
}
