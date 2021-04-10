<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matkul = [
            ['nama_matkul'=>'Pemrograman Basis Data Lanjut',
            'sks'=>3,
            'jam'=>6,
            'semester'=>4,
        ],

        ['nama_matkul'=>'Pemrograman Objek',
        'sks'=>3,
        'jam'=>6,
        'semester'=>4,
    ],
    ['nama_matkul'=>'Pemrograman Web',
    'sks'=>3,
    'jam'=>6,
    'semester'=>4,
],
['nama_matkul'=>'Basis Data',
'sks'=>3,
'jam'=>6,
'semester'=>4,
],


        ];
    }
}
