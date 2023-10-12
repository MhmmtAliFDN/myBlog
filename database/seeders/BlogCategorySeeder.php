<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BlogCategory::create([
            'name' => 'Yazılım',
            'slug' => Str::slug('Yazılım'),
            'status' => 'active',
        ]);

        BlogCategory::create([
            'name' => 'Teknolojik Gelişmeler',
            'slug' => Str::slug('Teknolojik Gelişmeler'),
            'status' => 'active',
        ]);

        BlogCategory::create([
            'name' => 'Tasarım',
            'slug' => Str::slug('Tasarım'),
            'status' => 'inactive',
        ]);
    }
}