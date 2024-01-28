<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' => 1,
            'name' => 'Muhammet Ali Fidan',
            'bio' => "Çanakkale Onsekiz Mart Üniversitesi'nde eğitim görüyorum. Web yazılımları alanında C# ve Asp.Net teknolojileri ile başladığım yolculuğunu, PHP Laravel ve Angular gibi çeşitli teknolojilerle genişlettim.",
            'email' => 'mhmmtalifdn@gmail.com',
            'password' => '$2y$10$4z/ZtrD15ex973wuC33t7..OZFFcZn8wmcNbQwZ79tg8qjO54Aroy',
            'image' => 'img/images/logo/coderlog.webp',
            'status' => "Aktif",
            'created_at' => '2023-12-25 16:08:56',
            'updated_at' => '2023-12-25 16:08:56'
        ]);
    }
}
