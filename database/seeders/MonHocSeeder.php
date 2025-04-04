<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MonHocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $table = DB::table("mon_hocs")->insert([
            [
                "ten_mon_hoc" => "PHP 1",
                "tong_buoi_hoc" => 17,
            ],
            [
                "ten_mon_hoc" => "PHP 2",
                "tong_buoi_hoc" => 17,
            ],
            [
                "ten_mon_hoc" => "PHP 3",
                "tong_buoi_hoc" => 17,
            ],
        ]);
    }
}
