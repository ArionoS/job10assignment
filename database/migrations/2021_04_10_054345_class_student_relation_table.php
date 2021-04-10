<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\ClassModel;
class ClassStudentRelationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::table('student',function(Blueprint $table){ 
                $table->dropColumn('class');//delete
                $table->unsignedBigInteger('class_id')->nullable();
                $table->foreign('class_id')->references ('id')->on('class');
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
            $table->string('class');
            $table->dropForeign(['class_id']);
        });
    }
}
