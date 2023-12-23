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
            'name' => 'Muhammet Ali Fidan',
            'bio' => "Çanakkale Onsekiz Mart Üniversitesi'nde eğitim görüyorum. Web yazılımları alanında C# ve Asp.Net teknolojileri ile başladığım yolculuğunu, PHP Laravel ve Angular gibi çeşitli teknolojilerle genişlettim.",
            'email' => 'test@gmail.com',
            'password' => '$2y$10$3xJpMZ3L7pBgwHZ01D9kHujpI2GSsl/buckWq79pyveWSn483SGMG', //12345678
        ]);

        User::create([
            'name' => 'Güldeniz Fidan',
            'bio' => "Çanakkale Onsekiz Mart Üniversitesi'nde eğitim görüyorum. Web yazılımları alanında C# ve Asp.Net teknolojileri ile başladığım yolculuğunu, PHP Laravel ve Angular gibi çeşitli teknolojilerle genişlettim.",
            'email' => 'test2@gmail.com',
            'password' => '$2y$10$yABbN9CsuE6vJLYszarYyOUrWwiHHTyyNNyndpfztwHBOdzCJiVPq', //12345678
        ]);
    }
}
