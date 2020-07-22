<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHobiMahasiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hobi_mahasiswa', function (Blueprint $table) {
            $table->increments('id')->unsigned()->index();
            $table->integer('id_hobi')->unsigned()->index();
            $table->integer('id_mahasiswa')->unsigned()->index();
            $table->timestamps();

            $table->primary(['id_hobi', 'id_mahasiswa']);  								// Set Primary Key

            $table->foreign('id_mahasiswa')                								// Set Primary Key hobi_mahasiswa
                    ->references('id')
                    ->on('mahasiswa')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('id_hobi')																		// Set Primary Key hobi_mahasiswa
                            ->references('id')
                            ->on('hobi')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hobi_mahasiswa');
    }
}
