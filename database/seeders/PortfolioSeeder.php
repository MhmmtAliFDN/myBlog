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
            'summary' => 'Bu projede PHP Laravel dilini kullanarak MVC altyapısı ile blog projesi oluşturdum. Sitenin hem kullanıcıların göreceği ön yüzü hem de adminlerin kullanabileceği paneli var.',
            'content' => 'Değerli bilgiler öğrenip yorum yapabileceğiniz bir site',
        ]);

        Portfolio::create([
            'user_id' => 2,
            'category_id' => 2,
            'name' => 'Eticaret Sitesi',
            'slug' => Str::slug('Eticaret Sitesi'),
            'summary' => 'Bu projede Asp.Net altyapısı ile temiz kod yazma prensiplerine ve katmanlı mimari yapısına uyarak oluşturduğum eticaret backend yazılımı var.',
            'content' => 'Kaliteli ürünler bulabileceğiniz bir site',
            'status' => 'Pasif',
        ]);
    }
}
