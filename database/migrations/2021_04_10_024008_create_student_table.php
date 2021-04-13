<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      
            Schema::create('student',function(Blueprint $table){
                $table->id('id_student');
                $table->int("nim", 10)->nullable(false);
                $table->string("name", 25)->nullable(false);
                $table->string("class",5)->nullable(false);
                $table->string("major",35)->nullable(false);
                $table->string("address",35)->nullable(false);
                $table->string("email",35)->nullable(false);
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
        Schema::dropIfExists('student');
    }
}
