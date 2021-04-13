<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courser', function (Blueprint $table) {
         
                $table->id();
                $table->integer('id_student')->nullable();
                $table->foreign('id_student')->references('nim')->on('student');
                $table->unsignedBigInteger('course_id')->nullable();
                $table->foreign('course_id')->references('id')->on('course');
                $table->string('score',2);
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courser');
    }
}
