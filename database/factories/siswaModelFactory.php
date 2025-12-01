<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\siswaModel>
 */
class siswaModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama'  => fake()->name(),
            'jenis_kelamin' => fake()->randomElement(['p', 'w']),
            'tempat_lahir' => fake()->city(),
            'tanggal_lahir' => fake()->dateTimeBetween('-10 years', '-20 month'),
            'alamat' => fake()->address(),
            'telepon' => fake()->phoneNumber(),
            'mapel' => fake()->randomElement(['ap', 'dg', 'pg', 'jk']),
            'pendidikan_terakhir' => fake()->randomElement(['sd', 'smp', 'sma', 'd3', 's1']),
            'foto' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }
}
