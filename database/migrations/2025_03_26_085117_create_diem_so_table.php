<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('diem_sos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mon_hoc_id')->constrained();
            $table->foreignId('sinh_vien_id')->constrained();
            $table->foreignId('giang_vien_id')->constrained();
            $table->integer('lab1')->nullable();
            $table->integer('lab2')->nullable();
            $table->integer('lab3')->nullable();
            $table->integer('lab4')->nullable();
            $table->integer('lab5')->nullable();
            $table->integer('lab6')->nullable();
            $table->integer('lab7')->nullable();
            $table->integer('lab8')->nullable();
            $table->integer('tong')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diem_so');
    }
};