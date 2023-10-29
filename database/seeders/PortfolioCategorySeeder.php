<?php

namespace Database\Seeders;

use App\Models\PortfolioCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PortfolioCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PortfolioCategory::create([
            'name' => 'Web Geliştirme',
            'slug' => Str::slug('Web Geliştirme'),
        ]);

        PortfolioCategory::create([
            'name' => 'Veri Analitiği',
            'slug' => Str::slug('Veri Analitiği'),
        ]);

        PortfolioCategory::create([
            'name' => 'Tübitak Projesi',
            'slug' => Str::slug('Tübitak Projesi'),
            'status' => 'Pasif',
        ]);
    }
}
