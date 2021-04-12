<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseRTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_r', function (Blueprint $table) {
           
              $table->id();
                $table->unsignedBigInteger('student_id')->nullable();
                $table->foreign('id_student')->references ('nim')->on('student');
                $table->unsignedBigInteger('course_id')->nullable();
                $table->foreign('id_course')->references ('id')->on('course');
                $table->char('score');
               
            });
   
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_r');
    }
}
