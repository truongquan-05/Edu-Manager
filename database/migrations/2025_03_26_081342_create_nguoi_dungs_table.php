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
        Schema::create("vai_tros", function (Blueprint $table) {
            $table->id();
            $table->string("name");
        });


        Schema::create('nguoi_dungs', function (Blueprint $table) {
            $table->id();
            $table->string('ho_ten', 50);
            $table->string('mat_khau', 50);
            $table->string('email', 50);
            $table->string('so_dien_thoai', 10);
            $table->enum('gioi_tinh', ['Nam', 'Nữ']);
            $table->date('ngay_sinh');
            $table->string('dia_chi', 155);
            $table->integer('trang_thai')->default(0);
            $table->foreignId('vai_tro_id')->constrained('vai_tros');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nguoi_dungs');
    }
};
