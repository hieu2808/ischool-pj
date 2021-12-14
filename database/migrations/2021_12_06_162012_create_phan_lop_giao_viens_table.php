<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhanLopGiaoViensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phan_lop_giao_viens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('giao_vien_id')->unsigned();
            $table->bigInteger('lop_hoc_id')->unsigned();
            $table->dateTime('ngay_phan_lop');
            $table->timestamps();

            $table->foreign('giao_vien_id')->references('id')->on('giao_viens');
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
        Schema::dropIfExists('phan_lop_giao_viens');
    }
}