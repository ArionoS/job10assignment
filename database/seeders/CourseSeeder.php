<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course = [
            ['course_name'=>'Pemrograman Basis Data Lanjut',
            'sks'=>3,
            'hour'=>6,
            'semester'=>4,
        ],

        ['course_name'=>'Pemrograman Objek',
        'sks'=>3,
        'hour'=>6,
        'semester'=>4,
    ],
    ['course_name'=>'Pemrograman Web',
    'sks'=>3,
    'hour'=>6,
    'semester'=>4,
],
['course_name'=>'Basis Data',
'sks'=>3,
'hour'=>6,
'semester'=>4,
],
];
DB::table('course')->insert($course);
    }
}
