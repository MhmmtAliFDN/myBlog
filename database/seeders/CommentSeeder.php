<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comment::create([
            'user_id' => 1,
            'blog_id' => 1,
            'parent_id' => null,
            'like' => 20,
            'dislike' => 3,
            'content' => 'Yazınızı çok değerli buldum başarılarınızın devamını dilerim.',
            'is_reported' => false,
        ]);

        Comment::create([
            'user_id' => 2,
            'blog_id' => 3,
            'parent_id' => null,
            'content' => 'Bok gibi yazı.',
            'is_reported' => true,
            'report_count' => 20,
            'status' => 'Pasif'
        ]);

        Comment::create([
            'user_id' => 1,
            'blog_id' => 1,
            'parent_id' => 1,
            'like' => 1,
            'dislike' => 10,
            'content' => 'Size katılmıyorum.',
            'is_reported' => false,
            'report_count' => 1,
        ]);
    }
}
