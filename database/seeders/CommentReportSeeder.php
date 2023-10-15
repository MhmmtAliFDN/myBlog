<?php

namespace Database\Seeders;

use App\Models\CommentReport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CommentReport::create([
            'user_id' => 1,
            'comment_id'=> 2,
            'message' => 'Argo kullanımı',
        ]);
    }
}
