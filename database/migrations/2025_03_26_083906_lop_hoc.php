<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("lop_hocs", function (Blueprint $table) {
            $table->id();
            $table->string("ma_lop_hoc",50);
            $table->integer("so_luong");
            $table->string("phong_hoc",10);
            $table->string("chuyen_nganh",50);
            $table->foreignId("giang_vien_id")->constrained();
            $table->foreignId("mon_hoc_id")->constrained();
            $table->enum('ca_hoc',[1,2,3,4]);
            $table->integer('thoi_gian_hoc');
            $table->date('ngay_bat_dau');
            $table->date('ngay_ket_thuc');
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
