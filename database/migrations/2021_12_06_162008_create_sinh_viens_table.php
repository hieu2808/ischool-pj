<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinhViensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinh_viens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('lop_id')->unsigned();
            $table->string('ten_ho', 100)->nullable();
            $table->string('ten_dem', 100)->nullable();
            $table->string('ten', 100)->nullable();
            $table->dateTime('nam_sinh')->nullable();
            $table->string('dia_chi', 255);
            $table->string('tel', 120);
            $table->timestamps();

            $table->foreign('lop_id')->references('id')->on('lops');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sinh_viens');
    }
}
