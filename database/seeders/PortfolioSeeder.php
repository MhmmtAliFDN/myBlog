<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Portfolio::create([
            'user_id' => 1,
            'category_id' => 1,
            'name' => 'Blog Sitesi',
            'slug' => Str::slug('Blog Sitesi'),
            'content' => 'Değerli bilgiler öğrenip yorum yapabileceğiniz bir site',
            'status' => 'active',
        ]);

        Portfolio::create([
            'user_id' => 2,
            'category_id' => 2,
            'name' => 'Eticaret Sitesi',
            'slug' => Str::slug('Eticaret Sitesi'),
            'content' => 'Kaliteli ürünler bulabileceğiniz bir site',
            'status' => 'inactive',
        ]);
    }
}
