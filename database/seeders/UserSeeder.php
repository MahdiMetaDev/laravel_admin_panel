<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(1)
//            ->setRole('admin')
//            ->setEmail('mmf1344py@gmail.com')
//            ->setPass('321')
            ->hasImage(1)
            ->create([
                'role' => 'admin',
                'email' => 'mmf1344py@gmail.com',
                'password' => Hash::make('321'),
                'name' => 'Mahdi',
                'family' => 'MalekiFard'
            ]);

        User::factory(1)
//            ->setRole('admin')
//            ->setEmail('mmf1344py@gmail.com')
//            ->setPass('321')
            ->hasImage(1)
            ->create([
                'role' => 'admin',
                'email' => 'mmf1374py@gmail.com',
                'password' => Hash::make('123'),
                'name' => 'Hamid',
                'family' => 'Alavi'
            ]);

        User::factory(20)
            ->hasImage(1)
            ->create();

    }
}
