<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLopHocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lop_hocs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('mon_hoc_id')->unsigned();
            $table->bigInteger('chuong_trinh_hoc_id')->unsigned();
            $table->string('ten_lop_hoc', 250)->nullable();
            $table->integer('so_luong_sv')->nullable();
            $table->integer('so_tin_chi')->nullable();  
            $table->dateTime('ngay_bat_dau');
            $table->dateTime('ngay_ket_thuc');
            $table->timestamps();

            $table->foreign('mon_hoc_id')->references('id')->on('mon_hocs');
            $table->foreign('chuong_trinh_hoc_id')->references('id')->on('chuong_trinh_hocs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lop_hocs');
    }
}