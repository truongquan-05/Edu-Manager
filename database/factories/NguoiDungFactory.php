<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NguoiDung>
 */
class NguoiDungFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ho_ten' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'so_dien_thoai' => fake()->phoneNumber(),
            'gioi_tinh' => fake()->randomElement(['Nam', 'Nữ']),
            'ngay_sinh' => fake()->date(),
            'dia_chi' => fake()->address(),
            'trang_thai' => 0,
            'vai_tro_id' => rand(1, 4)
        ];
    }
    
}
