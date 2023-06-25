<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        Comment::factory(10)
//            ->create([
//                'commentable_type' => Blog::class,
//                'commentable_id' => Blog::inRandomOrder()->first()->id,
//            ]);
//
//        Comment::factory(10)
//            ->create([
//                'commentable_type' => Product::class,
//                'commentable_id' => Product::inRandomOrder()->first()->id,
//            ]);
    }
}
