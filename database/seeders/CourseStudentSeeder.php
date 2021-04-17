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

        DB::table('courser')->insert([
            [
                'id_student' => 45, // you can change this data
                'course_id' => 1,
                'score' => 'A',
            ],
            [
                'id_student' => 1234,
                'course_id' => 2,
                'score' => 'A',
            ],

        ]);
    }
}
