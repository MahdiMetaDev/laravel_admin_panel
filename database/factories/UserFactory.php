<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'family' => fake()->sentence(2),
            'phone_number' => '0915' . fake()->randomNumber(7),
            'email' => fake()->unique()->safeEmail(),
            'role' => 'user',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

//    public function setRole($value): static
//    {
//        return $this->state(fn (array $attributes) => [
//            'role' => $value,
//        ]);
//    }
//
//    public function setEmail($value): static
//    {
//        return $this->state(fn (array $attributes) => [
//            'email' => $value,
//        ]);
//    }
//
//    public function setPass($value): static
//    {
//        return $this->state(fn (array $attributes) => [
//            'password' => Hash::make($value),
//        ]);
//    }
}
