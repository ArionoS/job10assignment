<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasiKeMahasiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student',function(Blueprint $table){ 
            $table->dropColumn('nim');//delete
            $table->unsignedBigInteger('id_stud')->nullable();
            $table->foreign('id_stud')->references ('nim')->on('nim');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student',function(Blueprint $table){ 
            $table->string('nim');
            $table->dropForeign(['id_stud']);
        });
    }
}
