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
        Schema::create('lich_hocs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sinh_vien_id')->constrained();
            $table->foreignId('lop_hoc_id')->constrained();
            $table->json('ngay_hoc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lich_hocs');
    }
};
