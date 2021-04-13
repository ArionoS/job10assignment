<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;
use App\Models\Coursemodel;

class CourseStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('course_student')->insert([
            [
                'id_student' => 1941720092, // you can change this data
                'course_id' => 1,
                'score' => 'A',
            ],
            [
                'id_student' => 1941720091,
                'course_id' => 2,
                'score' => 'A',
            ],
            [
                'id_student' => 1941720092,
                'course_id' => 3,
                'score' => 'B',
            ],
            [
                'id_student' => 1941720093,
                'course_id' => 4,
                'score' => 'C+',
            ],

        ]);
    }
}
