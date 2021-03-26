<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa',function(Blueprint $table){
            $table->id('id_mahasiswa');
            $table->string("nim", 10)->nullable(false);
            $table->string("nama", 25)->nullable(false);
            $table->string("kelas",5)->nullable(false);
            $table->string("jurusan",35)->nullable(false);
            $table->string("alamat",35)->nullable(false);
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
        Schema::dropIfExists('mahasiswa');
    }
}
