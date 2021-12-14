<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSVDangKyLopHocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_v_dang_ky_lop_hocs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('sinh_vien_id')->unsigned();
            $table->bigInteger('lop_hoc_id')->unsigned();
            $table->dateTime('ngay_dang_ky');
            $table->timestamps();

            $table->foreign('sinh_vien_id')->references('id')->on('sinh_viens');
            $table->foreign('lop_hoc_id')->references('id')->on('lop_hocs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_v_dang_ky_lop_hocs');
    }
}