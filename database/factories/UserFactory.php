<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'role' => 'user',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'), // Anda mungkin ingin mengubah kata sandi secara dinamis di sini
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}